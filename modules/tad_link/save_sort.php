<?php
use Xmf\Request;
require_once __DIR__ . '/header.php';
require_once __DIR__ . '/function.php';

$updateRecordsArray = Request::getArray('tr');

$sort = 1;
foreach ($updateRecordsArray as $link_sn) {
    $link_sn = (int) $link_sn;
    $sql = 'update ' . $xoopsDB->prefix('tad_link') . " set `link_sort`='{$sort}' where `link_sn`='{$link_sn}'";

    $xoopsDB->queryF($sql) or die('Save Sort Fail! (' . date('Y-m-d H:i:s') . ')');
    $sort++;
}

echo 'Save Sort OK! (' . date('Y-m-d H:i:s') . ')';
