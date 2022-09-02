<?php
use XoopsModules\Tadtools\Utility;

global $xoopsTpl;

if (!class_exists('XoopsModules\Tadtools\Utility')) {
    require XOOPS_ROOT_PATH . '/modules/tadtools/preloads/autoloader.php';
}
Utility::get_jquery(true);
if (file_exists(XOOPS_ROOT_PATH . "/class/xoopsform/renderer/XoopsFormRendererBootstrap5.php")) {
    xoops_load('XoopsFormRendererBootstrap5');
    XoopsFormRenderer::getInstance()->set(new XoopsFormRendererBootstrap5());
} elseif (file_exists(XOOPS_ROOT_PATH . "/class/xoopsform/renderer/XoopsFormRendererBootstrap4.php")) {
    xoops_load('XoopsFormRendererBootstrap4');
    XoopsFormRenderer::getInstance()->set(new XoopsFormRendererBootstrap4());
    $xoopsTpl->assign('errorMsg', '<a href="' . XOOPS_URL . '/modules/tad_adm/admin/xoops.php">請安裝 BootStrap5 補釘</a>，會面才會正常。');
} elseif (file_exists(XOOPS_ROOT_PATH . "/class/xoopsform/renderer/XoopsFormRendererBootstrap3.php")) {
    xoops_load('XoopsFormRendererBootstrap3');
    XoopsFormRenderer::getInstance()->set(new XoopsFormRendererBootstrap3());
    $xoopsTpl->assign('errorMsg', '<a href="' . XOOPS_URL . '/modules/tad_adm/admin/xoops.php">請安裝 BootStrap5 補釘</a>，會面才會正常。');
} else {
    xoops_load('XoopsFormRenderer');
    XoopsFormRenderer::getInstance()->set(new XoopsFormRenderer());
    $xoopsTpl->assign('errorMsg', '<a href="' . XOOPS_URL . '/modules/tad_adm/admin/xoops.php">請安裝 BootStrap5 補釘</a>，會面才會正常。');
}
