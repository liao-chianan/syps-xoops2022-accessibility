<?php
use Xmf\Request;

/*-----------引入檔案區--------------*/
require_once __DIR__ . '/header.php';
//判斷目前使用者是否有：建立相簿
chk_permission();

/*-----------功能函數區--------------*/

//更新tad_gphotos_images某一筆資料
function update_tad_gphotos_images($image_sn = '', $col, $value)
{
    global $xoopsDB, $xoopsUser;

    $myts = \MyTextSanitizer::getInstance();

    $col = $myts->addSlashes($col);
    $value = $myts->addSlashes($value);

    $sql = "update `" . $xoopsDB->prefix("tad_gphotos_images") . "` set
    `{$col}` = '{$value}'
    where `image_sn` = '$image_sn'";
    $xoopsDB->queryF($sql) or Utility::web_error($sql, __FILE__, __LINE__);

    return $value;
}

function save_sort($album_sn_arr = [])
{
    global $xoopsDB, $xoopsUser;
    $sort = 1;
    foreach ($album_sn_arr as $album_sn) {
        $sql = "update " . $xoopsDB->prefix("tad_gphotos") . " set `album_sort`='{$sort}' where `album_sn`='{$album_sn}'";
        $xoopsDB->queryF($sql) or die(_TAD_SORT_FAIL . " (" . date("Y-m-d H:i:s") . ")" . $sql);
        $sort++;
    }
    return _TAD_SORTED . "(" . date("Y-m-d H:i:s") . ")";
}
/*-----------執行動作判斷區----------*/
$op = Request::getString('op');
$value = Request::getString('value');
$image_sn = Request::getInt('image_sn');
$album_sn_arr = Request::getArray('album_sn');

switch ($op) {

    case "save_title":
        $value = update_tad_gphotos_images($image_sn, 'image_description', $value);
        die($value);

    case "save_sort":
        $value = save_sort($album_sn_arr);
        die($value);

}

/*-----------秀出結果區--------------*/
