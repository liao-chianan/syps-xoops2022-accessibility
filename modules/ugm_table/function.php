<?php
//  ------------------------------------------------------------------------ //
// 本模組由 ugm 製作
// 製作日期：2014-01-17
// $Id:$
// ------------------------------------------------------------------------- //
//引入TadTools的函式庫
if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php")){
 redirect_header("http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50",3, _TAD_NEED_TADTOOLS);
}
include_once XOOPS_ROOT_PATH."/modules/tadtools/tad_function.php";
# ---- Ugm共同的函數 ----
include_once "ugm_tools.php";
# ---- 區塊函數 ----  
include_once "block_function.php"; 
/********************* 自訂函數 *********************/  
###############################################################################
# 得到里別選項
# 
#
#
############################################################################### 
function get_li_sn_option($li_sn){
	global $xoopsDB;
  $sql = "select *
          from ".$xoopsDB->prefix("ugm_clean_li")." 
          order by sort
          ";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  while($all=$xoopsDB->fetchArray($result)){
	  foreach($all as $k=>$v){
      $$k=$v;
    }
    $main.="<option value='$sn' ".chk($li_sn,$sn,'0','selected').">{$title}</option>";
	}
	return $main;
}


###############################################################################
#  異動記錄
#
#
#
###############################################################################
function ugm_clean_update_insert($tbl="",$col_sn="",$title=""){
	global $xoopsDB,$xoopsUser;
	if(empty($tbl) or empty($col_sn) or empty($title))return;
  # ---- 處理異動記錄 -----
  $date=strtotime("now");
  # ---- 得到異動者uid ----
	$uid=$xoopsUser->getVar('uid');
	# -----------------------------------------------
  $sql = "insert into ".$xoopsDB->prefix("ugm_clean_update")."
    	  (`date`, `table`, `col_sn`, `title`, `uid`)
    	   values
        ('{$date}','{$tbl}','{$col_sn}','{$title}','{$uid}')";//die($sql);
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	return ;
}
###############################################################################
# 檢查在 ugm_clean_payment是否有資料，若則建立
#
#
#
###############################################################################
//
function check_payment($main_sn,$li_sn){
  global $xoopsDB;
  $sql = "select print,payment_no
          from ".$xoopsDB->prefix("ugm_clean_payment")."
          where main_sn='{$main_sn}' and li_sn='{$li_sn}'
          ";//die($sql);
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  $total=$xoopsDB->getRowsNum($result); #記錄筆數
  list($print,$payment_no)=$xoopsDB->fetchRow($result);   
  
  if($total)return array("print"=>$print,"payment_no"=>$payment_no);
  # ---- 寫入ugm_clean_payment
  $sql = "insert into ".$xoopsDB->prefix("ugm_clean_payment")."
	(`main_sn` , `li_sn`)
	values('{$main_sn}' , '{$li_sn}')";//die($sql);
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	return;
}

###############################################################################
#  開征明細異動記錄
#
#
#
###############################################################################
//以流水號秀出某筆ugm_clean_user資料內容
function show_hire_move($sn="",$return=true){
	global $xoopsDB,$xoopsModule,$xoopsModuleConfig;
  # ---- 用戶編號碼數 ----
  $user_sn_length=$xoopsModuleConfig['user_sn_length'];
  # ----------------------
	if(empty($sn)){
		return;
	}
  # ----------------
	$sql = "select a.*,b.money as hire_money,c.name as user_name,c.sn as user_sn,d.name as m_name,d.uname,e.year,f.title as course_title,f.ps as course_ps,g.title as kind_title
          from ".$xoopsDB->prefix("ugm_clean_update")."         as a
          left join ".$xoopsDB->prefix("ugm_clean_hire")."      as b on a.col_sn    =b.sn
          left join ".$xoopsDB->prefix("ugm_clean_user")."      as c on b.user_sn   =c.sn
          left join ".$xoopsDB->prefix("users")."               as d on a.uid       =d.uid
          left join ".$xoopsDB->prefix("ugm_clean_hire_main")." as e on b.main_sn   =e.sn
          left join ".$xoopsDB->prefix("ugm_clean_course")."    as f on e.course_sn =f.sn
          left join ".$xoopsDB->prefix("ugm_clean_kind")."      as g on e.kind_sn   =g.sn
          where a.table='ugm_clean_hire' and a.col_sn='{$sn}'
          order by date desc";//die($sql);
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  $all_content="";
  while($all=$xoopsDB->fetchArray($result)){
	  //以下會產生這些變數： sn	date 	table	col_sn	title	uid	user_name	user_sn	m_name	uname
    foreach($all as $k=>$v){
      $$k=$v;
    }
    # ---- 處理編號碼數 ----
    $sn_id= str_pad($col_sn,$user_sn_length,'0',STR_PAD_LEFT);
    # ----------------------

    # ---- 處理時間 -> 將時間戳記 轉成 日期 -----
    $date   =$date?date("Y/m/d",xoops_getUserTimestamp($date)):"";
    $update_title=get_update_title($table);
    $uid_name=$m_name?$m_name:$uname;
    $all_content.="
      <tr>
        <td class='c'>{$date}</td>
        <td class='c'>{$update_title}</td>
        <td class='c'>{$title}</td>
        <td class='c'>{$uid_name}</td>
      </tr>
    ";

  }
  //--------------------- 引入jquery -------------------------------------
  if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/jquery.php")){
    redirect_header("index.php",3, _TAD_NEED_TADTOOLS);
  }
  include_once XOOPS_ROOT_PATH."/modules/tadtools/jquery.php";
  $jquery_path = get_jquery(); //一般只要此行即可
  # ------------------------------------------------
  if($all_content){
  	$data=$jquery_path.ugm_javascript(1)."
    用戶姓名：{$user_name} &nbsp;&nbsp; 用戶編號：{$sn_id}<br>
    征收年度：{$year} &nbsp;&nbsp; 征收期別：{$course_title}({$course_ps})<br>
    征收類別：{$kind_title} &nbsp;&nbsp; 征收金額：{$hire_money}
    <table border='0' cellspacing='3' cellpadding='3' class='ugm_tb' >
  	<tr>
      <th>"._MA_UGMCLEAN_UP_DATE."</th>
  	  <th>異動系統</th>
  	  <th>異動內容</th>
  	  <th>異動人員</th>
    </tr>
  	$all_content
  	</table>";
  }else{
   $data="<h2>無異動資料</h2>";

  }
	$main=ugm_div("",$data,"",600);

	return $main;
}
###############################################################################
#  住戶表單
#
#
#
###############################################################################
//以流水號取得某筆ugm_clean_user資料
function get_ugm_clean_user($sn=""){
	global $xoopsDB;
	if(empty($sn))return;
	$sql = "select * from ".$xoopsDB->prefix("ugm_clean_user")." where sn='$sn'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	$data=$xoopsDB->fetchArray($result);
	return $data;
}
###############################################################################
#
#
#
#
###############################################################################
function get_update_title($table=""){
  if($table=="ugm_clean_user"){
    return "用戶資料";
  }elseif($table=="ugm_clean_hire"){
    return "開征明細檔";
  }
}

###############################################################################
# 得到征收類別選項
#
#
#
###############################################################################
function get_kind_sn_option_user($kind_sn_chk=0){
	global $xoopsDB;
  # ---- 由用戶檔製作「里別下拉選單
	$sql = "select a.kind_sn,b.title as kind_title,count(b.sn) as kind_count
          from ".$xoopsDB->prefix("ugm_clean_user")."      as a
          left join ".$xoopsDB->prefix("ugm_clean_kind")."   as b on a.kind_sn = b.sn
          group by b.sn
          order by b.sort
          ";//die($sql);
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  while($all=$xoopsDB->fetchArray($result)){
	  foreach($all as $k=>$v){
      $$k=$v;
    }
    $main.="<option value='$kind_sn' ".chk($kind_sn_chk,$kind_sn,'0','selected').">{$kind_title} ($kind_count)</option>";
	}
	return $main;
}

?>