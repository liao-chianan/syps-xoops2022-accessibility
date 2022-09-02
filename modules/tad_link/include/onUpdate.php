<?php

use XoopsModules\Tad_link\Update;

if (!class_exists('XoopsModules\Tad_link\Update')) {
    include dirname(__DIR__) . '/preloads/autoloader.php';
}
function xoops_module_update_tad_link(&$module, $old_version)
{
    global $xoopsDB;

    Update::chk_tad_link_block();

    if (Update::chk_chk1()) {
        Update::go_update1();
    }

    return true;
}
