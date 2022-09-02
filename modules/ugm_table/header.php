<?php
//  ------------------------------------------------------------------------ //
// 本模組由 ugm 製作
// 製作日期：2014-01-17
// $Id:$
// ------------------------------------------------------------------------- //
# ----  引入前台所需檔案 ----
include_once '../../mainfile.php';
//include XOOPS_ROOT_PATH."/header.php"; 
# ---- 引入前台的權限管理 ----
include_once "common.php";
include_once "function.php";


# ---- 前台選單 -------
/*
$module_menu.="
  <div class='btn-group'>
    <button type='button' class='btn btn-primary' onclick=\"javascript:location.href='index.php'\">登錄資料</button>
 </div>
  <div class='btn-group'>
    <button type='button' class='btn btn-primary' onclick=\"javascript:location.href='search.php'\">動物協尋</button>
 </div>
  ";
  */
# ----- 模組管理選單 -----------------
if($isAdmin){
  $module_menu.="
  <div class='btn-group'>
      <button type='button' class='btn btn-primary' onclick=\"javascript:location.href='admin/index.php'\">"._TO_ADMIN_PAGE."</button>
  </div>
  ";
}
//引入CSS樣式表檔案
$module_css="<link rel='stylesheet' type='text/css' media='screen' href='css/module.css' />";

?>