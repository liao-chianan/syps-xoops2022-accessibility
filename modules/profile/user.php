<?php
/**
 * Extended User Profile
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       (c) 2000-2016 XOOPS Project (www.xoops.org)
 * @license             GNU GPL 2 (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package             profile
 * @since               2.3.0
 * @author              Jan Pedersen
 * @author              Taiwen Jiang <phppp@users.sourceforge.net>
 */

$xoopsOption['pagetype'] = 'user';
include __DIR__ . '/header.php';

$op = 'main';

if (isset($_POST['op'])) {
    $op = trim($_POST['op']);
} elseif (isset($_GET['op'])) {
    $op = trim($_GET['op']);
}

if ($op === 'main') {
    if (!$GLOBALS['xoopsUser']) {
        $GLOBALS['xoopsOption']['template_main'] = 'profile_userform.tpl';
        include $GLOBALS['xoops']->path('header.php');
        $GLOBALS['xoopsTpl']->assign('lang_login', _LOGIN);
        $GLOBALS['xoopsTpl']->assign('lang_username', _USERNAME);
        if (isset($_GET['xoops_redirect'])) {
            $GLOBALS['xoopsTpl']->assign('redirect_page', htmlspecialchars(trim($_GET['xoops_redirect']), ENT_QUOTES));
        }
        if ($GLOBALS['xoopsConfig']['usercookie']) {
            $GLOBALS['xoopsTpl']->assign('lang_rememberme', _US_REMEMBERME);
        }
		//edit by lcn 20220906 redirect with login err 
	   if (isset($_GET['x_login_err'])) {
           $GLOBALS['xoopsTpl']->assign('x_login_err','帳號密碼錯誤，請重新輸入或聯絡管理員處理' );
        }
		
        $GLOBALS['xoopsTpl']->assign('lang_password', _PASSWORD);
        $GLOBALS['xoopsTpl']->assign('lang_notregister', _US_NOTREGISTERED);
        $GLOBALS['xoopsTpl']->assign('lang_lostpassword', _US_LOSTPASSWORD);
        $GLOBALS['xoopsTpl']->assign('lang_noproblem', _US_NOPROBLEM);
        $GLOBALS['xoopsTpl']->assign('lang_youremail', _US_YOUREMAIL);
        $GLOBALS['xoopsTpl']->assign('lang_sendpassword', _US_SENDPASSWORD);
        $GLOBALS['xoopsTpl']->assign('mailpasswd_token', $GLOBALS['xoopsSecurity']->createToken());
        include __DIR__ . '/footer.php';
        exit();
    }
    if (!empty($_GET['xoops_redirect'])) {
        $redirect   = trim($_GET['xoops_redirect']);
        $isExternal = false;
        if ($pos = strpos($redirect, '://')) {
            $xoopsLocation = substr(XOOPS_URL, strpos(XOOPS_URL, '://') + 3);
            if (strcasecmp(substr($redirect, $pos + 3, strlen($xoopsLocation)), $xoopsLocation)) {
                $isExternal = true;
            }
        }
        if (!$isExternal) {
            header('Location: ' . $redirect);
            exit();
        }
    }
    header('Location: ./userinfo.php?uid=' . $GLOBALS['xoopsUser']->getVar('uid'));
    exit();
}

if ($op === 'login') {
    include_once $GLOBALS['xoops']->path('include/checklogin.php');
    exit();
}

if ($op === 'logout') {
    $message = '';
    // Regenerate a new session id and destroy old session
    $GLOBALS['sess_handler']->regenerate_id(true);
    $_SESSION = array();
    setcookie($GLOBALS['xoopsConfig']['usercookie'], null, time() - 3600, '/', XOOPS_COOKIE_DOMAIN, 0);
    setcookie($GLOBALS['xoopsConfig']['usercookie'], null, time() - 3600, '/');
    // clear entry from online users table
    if (is_object($GLOBALS['xoopsUser'])) {
        /* @var XoopsOnlineHandler $online_handler */
        $online_handler = xoops_getHandler('online');
        $online_handler->destroy($GLOBALS['xoopsUser']->getVar('uid'));
    }
    $xoopsPreload = XoopsPreload::getInstance();
    $xoopsPreload->triggerEvent('core.behavior.user.logout');
    $message = _US_LOGGEDOUT . '<br>' . _US_THANKYOUFORVISIT;
    redirect_header(XOOPS_URL . '/', 1, $message);
}

if ($op === 'actv') {
    $id     = (int)$_GET['id'];
    $actkey = trim($_GET['actkey']);
    redirect_header("activate.php?op=actv&amp;id={$id}&amp;actkey={$actkey}", 1, '');
}

if ($op === 'delete') {
    /* @var XoopsConfigHandler $config_handler */
    $config_handler             = xoops_getHandler('config');
    $GLOBALS['xoopsConfigUser'] = $config_handler->getConfigsByCat(XOOPS_CONF_USER);
    if (!$GLOBALS['xoopsUser'] || $GLOBALS['xoopsConfigUser']['self_delete'] != 1) {
        redirect_header(XOOPS_URL . '/', 5, _US_NOPERMISS);
    } else {
        $groups = $GLOBALS['xoopsUser']->getGroups();
        if (in_array(XOOPS_GROUP_ADMIN, $groups)) {
            // users in the webmasters group may not be deleted
            redirect_header(XOOPS_URL . '/', 5, _US_ADMINNO);
        }
        $ok = !isset($_POST['ok']) ? 0 : (int)$_POST['ok'];
        if ($ok != 1) {
            include __DIR__ . '/header.php';
            xoops_confirm(array('op' => 'delete', 'ok' => 1), 'user.php', _US_SURETODEL . '<br>' . _US_REMOVEINFO);
            include __DIR__ . '/footer.php';
        } else {
            $del_uid        = $GLOBALS['xoopsUser']->getVar('uid');
            /* @var XoopsMemberHandler $member_handler */
            $member_handler = xoops_getHandler('member');
            if (false !== $member_handler->deleteUser($GLOBALS['xoopsUser'])) {
                /* @var XoopsOnlineHandler $online_handler */
                $online_handler = xoops_getHandler('online');
                $online_handler->destroy($del_uid);
                xoops_notification_deletebyuser($del_uid);
                redirect_header(XOOPS_URL . '/', 5, _US_BEENDELED);
            }
            redirect_header(XOOPS_URL . '/', 5, _US_NOPERMISS);
        }
        exit();
    }
}
