<?php
use Xmf\Request;
use XoopsModules\Tadtools\Utility;

/*-----------引入檔案區--------------*/
$xoopsOption['template_main'] = 'tad_adm_adm_clean.tpl';
require_once __DIR__ . '/header.php';
require_once dirname(__DIR__) . '/function.php';
$isWin = 'WIN' === mb_strtoupper(mb_substr(PHP_OS, 0, 3)) ? true : false;
/*-----------function區--------------*/

function view_file()
{
    global $xoopsTpl, $isWin, $xoopsConfig;

    $theme_name = $xoopsConfig['theme_set'];
    $all_dir = $all_files = [];
    $dir = XOOPS_ROOT_PATH . "/themes/{$theme_name}/modules/";
    $i = $total_size = 0;
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (false !== ($file = readdir($dh))) {
                if ('.' === mb_substr($file, 0, 1) or 'system' === $file or 'pm' === $file or 'profile' === $file) {
                    continue;
                } elseif (is_dir($dir . $file)) {
                    $all_dir[$i]['dir_path'] = $isWin ? iconv('Big5', 'UTF-8', $dir . $file) : $dir . $file;
                    $all_dir[$i]['dir_name'] = $isWin ? iconv('Big5', 'UTF-8', $file) : $file;
                    $dir_size = GetDirectorySize($dir . $file);
                    $total_size += $dir_size;
                    $all_dir[$i]['dir_size'] = format_size($dir_size);
                    $all_dir[$i]['size'] = $dir_size;
                    $i++;
                } elseif (!empty($file)) {
                    $all_files[$i]['file_path'] = $isWin ? iconv('Big5', 'UTF-8', $dir . $file) : $dir . $file;
                    $all_files[$i]['file_name'] = $isWin ? iconv('Big5', 'UTF-8', $file) : $file;
                    $all_files[$i]['file_size'] = filesize($dir . $file);
                    $i++;
                }
            }
            closedir($dh);
        }
    }

    $xoopsTpl->assign('theme_name', $theme_name);
    $xoopsTpl->assign('dir', $dir);
    $xoopsTpl->assign('total_size', format_size($total_size));
    $xoopsTpl->assign('all_dir', $all_dir);
    $xoopsTpl->assign('all_files', $all_files);
    // $xoopsTpl->assign('free_space', format_size($free_space));
}

function del_templates($dirs = [], $files = [])
{
    if (is_array($dirs)) {
        foreach ($dirs as $dir) {
            Utility::delete_directory($dir);
        }
    }
    if (is_array($files)) {
        foreach ($files as $file) {
            unlink($file);
        }
    }
}

/*-----------執行動作判斷區----------*/
$op = Request::getString('op');
$g2p = Request::getInt('g2p');
$dirs = Request::getArray('dirs');
$files = Request::getArray('files');

switch ($op) {
    case 'del_templates':
        del_templates($dirs, $files);
        header('location:clean.php');
        exit;

    default:
        view_file();
        $op = 'view_file';
        break;
}

/*-----------秀出結果區--------------*/
$xoopsTpl->assign('op', $op);
$xoTheme->addStylesheet(XOOPS_URL . '/modules/tad_adm/css/module.css');
require_once __DIR__ . '/footer.php';
