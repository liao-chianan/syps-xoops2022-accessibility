<?php
/*  ----------------------------------------------------------------------------
 ugm專用的工具函數
 全部都用絕對位址及避免重覆函數
------------------------------------------------------------------------------*/  
/*  ----------------------------------------------------------------------------

xoops_version.php
# ---- 每頁顯示筆數 ----
$i++;
$modversion['config'][$i]['name']	= 'ugm_clean_count';
$modversion['config'][$i]['title']	= '_MI_UGMCLEAN_COUNT';
$modversion['config'][$i]['description']	= '_MI_UGMCLEAN_COUNT_DESC';
$modversion['config'][$i]['formtype']	= 'textbox';
$modversion['config'][$i]['valuetype']	= 'text';
$modversion['config'][$i]['default']	= '10,20,30,50,100';

modinfo.php                                        
# ---- 每頁顯示筆數 ----
define("_MI_UGMCLEAN_COUNT","每頁顯示筆數");
define("_MI_UGMCLEAN_COUNT_DESC","預設「10,20,30,50,100」，請用「,」分隔");

main.php 
define("_BP_PAGE_COUNT","每頁筆數："); 
define("_BP_SEARCH","查詢：");  

*.php
# ---- 筆數選擇 ----  

$count = empty($_GET['count'])?20:intval($_GET['count']);  
$op_select="
  <form action='{$_SERVER['PHP_SELF']}' method='get' id='myForm' class='form-inline'> 
  "._BP_PAGE_COUNT."<select name='count' size=1 style='width:60px;'>".ugm_count_select($count)."</select>&nbsp;&nbsp;
  <button type='submit'  class='btn btn-warning' >"._BP_SEARCH."</button>
  </form>
  ";
------------------------------------------------------------------------------*/ 
############################################################################### 
# 1
# 顯示資料數下拉選單->選項
#
#
###############################################################################
if(!function_exists("ugm_count_select")){
function ugm_count_select($count=20){
  global $xoopsModule,$xoopsModuleConfig;
  $DIR=$xoopsModule->getVar('dirname');
  if($xoopsModuleConfig["{$DIR}_count"]){
    # ---- 偏好設定 ---
    $counts = explode(",", $xoopsModuleConfig["{$DIR}_count"]);  
  }else{
    # ---- 預設值 ----
    $counts = array(10,20,30,50,100,200);
  }     
  foreach($counts as $v){
    $main.="<option value='{$v}' ".chk($count,$v,'0','selected').">{$v}</option>";
  }
  return $main; 
}
}

############################################################################### 
#  2
# return and_key
# $_SESSION['op_list_hire']=$_GET
# 返回GET參數
###############################################################################
if(!function_exists("return_and_key")){
function return_and_key($return_and_key=array()){
  $i=0;
  foreach($return_and_key as $k=>$v){
    if($i==0){
      $and_key.="?{$k}={$v}";
    }else{
      $and_key.="&{$k}={$v}";    
    }
    $i++;     
  }
  return $and_key;
}
}


############################################################################### 
#  3
# 自動取得$tbl $col 的最新排序
# 
# 
############################################################################### 
if(!function_exists("max_sort")){
function max_sort($tbl,$col="sort"){
	global $xoopsDB;
  if(!$tbl)return;
	$sql = "select max({$col}) from ".$xoopsDB->prefix($tbl);
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($sort)=$xoopsDB->fetchRow($result);
	return ++$sort;
}
}
############################################################################### 
#  4
# 數字轉字母
# 
# 
############################################################################### 
if(!function_exists("num2Letter")){
function num2Letter($num) {
    $num = intval($num);
    if ($num <= 0)
        return false;
    $letterArr = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $letter = '';
    do {
        $key = ($num - 1) % 26;
        $letter = $letterArr[$key] . $letter;
        $num = floor(($num - $key) / 26);
    } while ($num > 0);
    return $letter;
}
}
############################################################################### 
#  5
# excel 欄位編號轉數字
# 
# 
############################################################################### 
if(!function_exists("ExcelCol2num")){
function ExcelCol2num($s) {
 if(!$s)return;
 $arr=str_split($s,1);
 $total=$i=0;
 foreach ($arr as $letter){
   $letter_ascii=ord($letter);
   if($letter_ascii<65 and $letter_ascii >90)return;    
   $total+=($i*26)+$letter_ascii-65;
   $i++; 
 } 
 return $total; 
}
}
############################################################################### 
#  6
#  以流水號取得某筆 db_table 資料
# 
###############################################################################
if(!function_exists("get_db_table")){
function get_db_table($sn="",$db_table=""){
  global $xoopsDB;
	if(empty($sn) or empty($db_table))return;
	$sql = "select * from ".$xoopsDB->prefix($db_table)." where sn='$sn'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());//die($sql);
	$data=$xoopsDB->fetchArray($result);
	return $data;
}
}
############################################################################### 
#  7
#  取得目前網址
# 
###############################################################################
if(!function_exists("getCurrentUrl")){
function getCurrentUrl(){
  global $_SERVER; 
  /**
   * Filter php_self to avoid a security vulnerability.
   */
  $php_request_uri = htmlentities(substr($_SERVER['REQUEST_URI'], 0, strcspn($_SERVER['REQUEST_URI'], "\n\r")), ENT_QUOTES); 
  if(isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on'){
    $protocol = 'https://';
  }else{
    $protocol = 'http://';
  }
  $host = $_SERVER['HTTP_HOST'];
  if($_SERVER['SERVER_PORT'] != '' &&
    (($protocol == 'http://' && $_SERVER['SERVER_PORT'] != '80') ||
    ($protocol == 'https://' && $_SERVER['SERVER_PORT'] != '443'))){
     $port = ':' . $_SERVER['SERVER_PORT'];
  }else{
    $port = '';
  }
  return $protocol . $host . $port . $php_request_uri;
}
}
?>