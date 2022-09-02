<?php
//  ------------------------------------------------------------------------ //
// 本模組由 ugm 製作
// 製作日期：2013-11-06
// $Id:$
// ------------------------------------------------------------------------- //

/*-----------引入檔案區--------------*/
include_once "header.php"; 
$xoopsOption['template_main'] = "ugm_table_adm_main_tpl.html";
$moduele_admin = new ModuleAdmin();
$xoopsTpl->assign('Navigation',$moduele_admin->addNavigation('main.php'));

/*-----------執行動作判斷區----------*/
$op   = empty($_REQUEST['op'])    ? "" : $_REQUEST['op'];
$sn   = empty($_REQUEST['sn'])    ? "" : intval($_REQUEST['sn']);

switch($op){
  # ---- 報表欄位標題自動排序 --------
	case "save_column_sort":
    save_column_sort();
  exit;
   
  # ---- 報表記錄自動排序 --------
	case "save_record_sort":
    save_record_sort();
  exit;
  
  # ---- 更新標題欄位啟用狀態 --------
	case "op_update_enable":
  op_update_enable();
	redirect_header($_SERVER['PHP_SELF'],3, _BP_SUCCESS);
  break;
  
  # ---- 更新記錄啟用狀態 --------
	case "op_update_record_enable":
  op_update_record_enable();
	redirect_header($_SESSION['return_url'],3, _BP_SUCCESS);
  break;

  //顯示單筆報表
  case "show_one":
    # ---- 目前網址 ----
    $_SESSION['return_url']=getCurrentUrl();
    show_one($sn);
    include_once "footer.php"; 
  exit;  

  //輸入表格
  case "op_form":
    op_form($sn);
    include_once "footer.php"; 
  exit;   

  //編輯報表標題
  case "op_column_form":
    op_column_form($sn);
    include_once "footer.php"; 
  exit; 

  //單筆記錄->表單(新增及編輯)
  case "op_record_form":
    op_record_form($sn);
    include_once "footer.php"; 
  exit;

  //刪除整張報表
  case "op_delete":     
    op_delete($sn);
  	redirect_header($_SESSION['return_url'],3, _BP_DEL_SUCCESS);
  break;  

  //刪除單筆記錄
  case "op_record_delete":
    op_record_delete($sn);
  	redirect_header($_SESSION['return_url'],3, _BP_DEL_SUCCESS);
  break; 
  
  //匯入報表，做資料選擇
  case "import_excel":
  //print_r($_POST);die();
  include_once "import_excel.php";
  $main=import_excel();
  break;  
  
  //匯入報表資料寫入資料庫
  case "op_insert":
    $sn=op_insert();    
    header("location: {$_SERVER['PHP_SELF']}?op=show_one&sn={$sn}");
  break; 
  
  //更新報表主檔
  case "op_update":
    op_update();    
  	redirect_header($_SESSION['return_url'],3, _BP_SUCCESS);
  break; 
  
  //表單->報表標題資料寫入資料庫
  case "op_column_update":
    op_column_update();    
    header("location: {$_SERVER['PHP_SELF']}?op=show_one&sn={$sn}");
  break;
   
  //更新單筆記錄
  case "op_record_update":
    op_record_update();
  	redirect_header($_SESSION['return_url'],3, _BP_SUCCESS); 
  break;
  
  //預設動作
  default:
  if(empty($sn)){    
    # ---- 目前網址 ----
    $_SESSION['return_url']=getCurrentUrl();
  	$main=op_list();
  }else{
    show_one($sn);
    include_once "footer.php"; 
    exit;
  }
  break;
}
/*-----------秀出結果區--------------*/
echo $main;
include_once "footer.php";
/*-----------function區--------------*/
################################################################################
#  取得main_sn 的 ugm_table_record 最大排序值
#
#
################################################################################
function get_record_max_sort($main_sn=""){
	global $xoopsDB;
	if(!$main_sn)return;
	$sql = "select max(sort) from ".$xoopsDB->prefix("ugm_table_record")."
          where main_sn='{$main_sn}'";
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($sort)=$xoopsDB->fetchRow($result);
	return ++$sort;
}
################################################################################
#  更新單筆記錄
# 
#
################################################################################  
function op_record_update(){
	global $xoopsDB,$xoopsUser;
	$myts =& MyTextSanitizer::getInstance();  
  $op="";
  foreach($_POST['form'] as $main_sn => $mian){
    foreach($mian as $record_sn => $record){      
      if(!$record_sn){
        # ---- 取得 ugm_table_record  where 'main_sn'='{$main_sn}'  的最大sort
        $sort=get_record_max_sort($main_sn);
        
        $main_sn=intval($main_sn);
        # ---- 新增一筆記錄 ----
        $sql = "insert into ".$xoopsDB->prefix("ugm_table_record")."
      	        (`main_sn`,`enable`,`sort` )
      	        values
                ('{$main_sn}' , '1' , '{$sort}' )"; //die($sql);
        $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); 
        # ----取得最後新增資料的流水編號
        $record_sn=$xoopsDB->getInsertId();
        $op="insert";
      }   
      foreach($record as $column_sn => $value){  
        $value=$myts->addSlashes($value);
        if($op=="insert"){
          # ---- 新增一筆儲存格----  
          $sql = "insert into ".$xoopsDB->prefix("ugm_table_value")."
        	        (`column_sn`,`record_sn`,`value` )
        	        values
                  ('{$column_sn}' , '{$record_sn}' , '{$value}' )"; //die($sql);
          $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());         
        }else{
          $sql = "update ".$xoopsDB->prefix("ugm_table_value")." set 
        	 `value` = '{$value}'  
        	where record_sn='{$record_sn}' and column_sn='{$column_sn}'";
        	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); 
        }             
      }
    }
  }
	return;
}
################################################################################
#  更新ugm_table_main報表標題
# 
#
################################################################################  
function op_column_update(){
	global $xoopsDB,$xoopsUser;
	$myts =& MyTextSanitizer::getInstance();
  foreach($_POST['form'] as $sn => $datas){
    $datas['title']=$myts->addSlashes($datas['title']);
    $datas['enable']=intval($datas['enable']);
    $sql = "update ".$xoopsDB->prefix("ugm_table_column")." set 
  	 `title` = '{$datas['title']}' , 
  	 `enable` = '{$datas['enable']}' 
  	where sn='$sn'";
  	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  }
	return;
}
################################################################################
#  編輯記錄
# 
#
################################################################################ 
function op_record_form($sn=""){
	global $xoopsDB,$xoopsUser,$xoopsTpl;  
  if($sn){
    # ---- 取得記錄檔資料 
    $record_sn=$sn;
    $DBV=get_db_table($sn,"ugm_table_record");
    $main_sn=$DBV['main_sn'];
		$form_title="編輯記錄";
  }else{
    $main_sn=intval($_GET['main_sn']);
    if($main_sn){
      $record_sn=0;
  		$form_title="新增記錄";
    }else{
      redirect_header($_SESSION['return_url'],3, "資料錯誤！！");    
    } 
  }
  
    //print_r($form_title);die();
  $id="myForm";
  
  # ---- 取得欄位資料 -----
  $sql="select sn,title
        from ".$xoopsDB->prefix("ugm_table_column")." 
        where `main_sn`='{$main_sn}'
        order by `sort`";//die($sql);
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); 
  while(list($column_sn,$column_title)=$xoopsDB->fetchRow($result)){
    
    if($sn){
      $sql_v="select sn,value
            from ".$xoopsDB->prefix("ugm_table_value")." 
            where record_sn='{$record_sn}' and column_sn='{$column_sn}'    
      ";
      $result_v = $xoopsDB->query($sql_v) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
      list($value_sn,$value)=$xoopsDB->fetchRow($result_v);
      
      $record_form[$sn][]=
          array(
            'title'     =>"$column_title",
            'name'      =>"form[$main_sn][$record_sn][$column_sn]",
            'type'      =>'text',
            'value'     =>$value,
            'validator' =>''      
          );    
    }else{      
      $record_form[$sn][]=
          array(
            'title'     =>"$column_title",
            'name'      =>"form[$main_sn][$record_sn][$column_sn]",
            'type'      =>'text',
            'value'     =>'',
            'validator' =>''      
          );
    }
  } 
 //print_r($record_form);die();
   
  $record_form_head=array(
    'action'  => $_SERVER['PHP_SELF']."?op=op_record_update",
    'method'  => 'post', 
    'id'      => $id, 
    'class'   => 'form-inline', 
    'enctype' => '',
    'title'   => $form_title
  );   
  $jquery=get_jquery();
  # ---- 驗證 ----
  if(!file_exists(TADTOOLS_PATH."/formValidator.php")){
     redirect_header("index.php",3, _MA_NEED_TADTOOLS);
  }
  include_once TADTOOLS_PATH."/formValidator.php";
  $formValidator= new formValidator("#{$id}",false);
  $formValidator_code=$jquery.$formValidator->render();

  # 將資料傳給樣板
  $xoopsTpl->assign('record_form_head',$record_form_head);
  $xoopsTpl->assign('record_form',$record_form);
  $xoopsTpl->assign('formValidator_code',$formValidator_code);
  return;
}

  
################################################################################
#  編輯報表標題
# 
#
################################################################################ 
function op_column_form($sn=""){
	global $xoopsDB,$xoopsUser,$xoopsTpl;
	# ---- 如無sn，顯示錯誤 ----
  if(!$sn)return;
  # ---- 取得主檔資料
  $DBV=get_db_table($sn,"ugm_table_main");
  $id="myForm";
  
  # ---- 取得欄位資料
  $sql="select sn,title,enable 
        from ".$xoopsDB->prefix("ugm_table_column")." 
        where `main_sn`='{$sn}'
        order by `sort`";//die($sql);
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql);
  $i=1;
  while($all=$xoopsDB->fetchArray($result)){
   //以下會產生這些變數： sn	title	enable	sort 
    foreach($all as $k=>$v){
      $$k=$v;
      if($k =="sn"){
        $type="title_num";
        $v=$i;# ----標題編號
      }elseif($k=="title"){
        $type="text";
      }elseif($k=="enable"){
        $type="yesno";
      }
      $table_form[$sn][]=
        array(
          'name'      =>"form[$sn][$k]",
          'type'      =>$type,
          'value'     =>$v,
          'validator' =>''      
        );     
    }
    $i++;
  }  
  $table_form_head=array(
    'action'  => $_SERVER['PHP_SELF']."?op=op_column_update&sn={$DBV['sn']}",
    'method'  => 'post', 
    'id'      => $id, 
    'class'   => 'form-inline', 
    'enctype' => 'multipart/form-data',
    'title'   => $DBV['title'],
    'sort_id' => 'sort',
    'sort_msg' => 'save_msg',
    'sort_url' => $_SERVER['PHP_SELF']."?op=save_column_sort" // 自動排序ajax檔
  );   
  $jquery=get_jquery(true);
  # ---- 驗證 ----
  if(!file_exists(TADTOOLS_PATH."/formValidator.php")){
     redirect_header("index.php",3, _MA_NEED_TADTOOLS);
  }
  include_once TADTOOLS_PATH."/formValidator.php";
  $formValidator= new formValidator("#{$id}",false);
  $formValidator_code=$jquery.$formValidator->render();

  # 將資料傳給樣板
  $xoopsTpl->assign('table_form_head',$table_form_head);
  $xoopsTpl->assign('table_form',$table_form);
  $xoopsTpl->assign('formValidator_code',$formValidator_code);
  return;
}

################################################################################
# //ugm_table_main編輯表單
# ugm_table_main
#
################################################################################

function op_form($sn=""){
	global $xoopsDB,$xoopsUser,$xoopsTpl;
	//抓取預設值
	if(!empty($sn)){
    # ---- 取得主檔資料 ----
    $DBV=get_db_table($sn,"ugm_table_main");
		$form_title="編輯報表";
	}else{
		$DBV=array();
		$form_title="新增報表";
	}

	//預設值設定
	//設定「sn」欄位預設值
	$sn=(!isset($DBV['sn']))?"":$DBV['sn'];

	//設定「title」欄位預設值
	$title=(!isset($DBV['title']))?"":$DBV['title'];

	//設定「enable」欄位預設值
	$enable=(!isset($DBV['enable']))?"1":$DBV['enable'];

	//設定「sort」欄位預設值
	$sort=(!isset($DBV['sort']))?max_sort('ugm_table_main','sort'):$DBV['sort'];

	//設定「order」欄位預設值
	$order=(!isset($DBV['order']))?"0":$DBV['order'];

	//設定「page_count」欄位預設值
	$page_count=(!isset($DBV['page_count']))?20:$DBV['page_count'];

	//設定「date」欄位預設值
	$date=(!isset($DBV['date']))?"":$DBV['date'];

	//設定「counter」欄位預設值
	$counter=(!isset($DBV['counter']))?null:$DBV['counter'];

	//$op=(empty($sn))?"import_excel":"op_update";
	$op="import_excel";



  # 引入表單檔 ($auto_form_head、$auto_form)
  include_once "auto_form.php";

  # ---- 驗證 ----
  if(!file_exists(TADTOOLS_PATH."/formValidator.php")){
     redirect_header("index.php",3, _MA_NEED_TADTOOLS);
  }
  include_once TADTOOLS_PATH."/formValidator.php";
  $formValidator= new formValidator("#myForm",true);
  $formValidator_code=$formValidator->render();

  # 將資料傳給樣板

  $xoopsTpl->assign('auto_form_head',$auto_form_head);
  $xoopsTpl->assign('auto_form',$auto_form);
  $xoopsTpl->assign('formValidator_code',$formValidator_code);
  return;
}

#################################################################
#   顯示單筆報表
#
#
#
#################################################################
function show_one($sn=""){
	global $xoopsDB,$xoopsTpl;
  if(!$sn)return "無此報表！！";
  # ---- 取得主檔資料 ----
  $DBV=get_db_table($sn,"ugm_table_main");
  //if(!$DBV['enable'])return "本報表已停用";
  
  # ---- 取得報表標題及啟用狀態
  $sql="select sn,title,enable
        from ".$xoopsDB->prefix("ugm_table_column")." 
        where `main_sn`='{$DBV['sn']}' 
        order by `sort`";//die($sql);
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql);
  
  
  while(list($sn,$title,$enable)=$xoopsDB->fetchRow($result)){
	  # ---- 變數： $sn , title
	  # ---- 報表標題
    $column[$sn]=array("title"=>$title,"enable"=>$enable);
  }
  
  # ---- 取得記錄資料及啟用狀態
  $order=$DBV['order']?" desc":"";
  $sql="select sn,enable
        from ".$xoopsDB->prefix("ugm_table_record")." 
        where `main_sn`='{$DBV['sn']}' 
        order by `sort`{$order}";//die($sql);
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql);
  
  while(list($sn,$enable)=$xoopsDB->fetchRow($result)){
	  # ---- 變數： $sn ---- y軸
    //$record[]=$sn;
    $record[$sn]=$enable;
  }
  
  # ---- 顯示報表儲存格及啟用狀態 ----   
  foreach($record as $record_sn=>$record_enable){
    # ---- 記錄的啟用狀態
    $r_enable[$record_sn]=$record_enable;
    foreach($column as $column_sn=>$column_title){
      $sql="select `value`
            from ".$xoopsDB->prefix("ugm_table_value")." 
            where `record_sn`='{$record_sn}' and `column_sn`='{$column_sn}'";//die($sql);
      $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql);
      list($value)=$xoopsDB->fetchRow($result);
      $enable=1;
      if(!$record_enable or !$column_title['enable']){
        $enable=0;
      }
      $tbody[$record_sn][$column_sn]=array("value"=>$value,"enable"=>$enable);
      
      
    }  
  }
  //print_r($tbody);die();
  # ---- 報表按鈕
  $btn="
    <a href='{$_SERVER['PHP_SELF']}?op=op_record_form&main_sn={$DBV['sn']}' class='btn btn-primary'>"._BP_ADD."</a>
    <a href='{$_SERVER['PHP_SELF']}?op=op_column_form&sn={$DBV['sn']}' class='btn btn-info'>"._BP_EDIT."</a>
  ";
  # 拖曳排序
  $auto_sort=array("sort_id"=>'sort',"sort_msg"=>'save_msg',"sort_url"=>$_SERVER['PHP_SELF']."?op=save_record_sort&order={$DBV['order']}" );
  $jquery=get_jquery(true);
  # 將資料傳給樣板
  $xoopsTpl->assign('js_code',$jquery);       // js_code(拖曳排序)
  $xoopsTpl->assign('auto_sort',$auto_sort);  // 拖曳排序_設定
  $xoopsTpl->assign('btn',$btn);              // 報表主檔
  $xoopsTpl->assign('DBV',$DBV);              // 報表主檔
  $xoopsTpl->assign('column',$column);        // 報表標題
  $xoopsTpl->assign('tbody',$tbody);          // 報表內容 
  $xoopsTpl->assign('r_enable',$r_enable);    // 記錄的啟用狀態
  
  
}
/*-----------function區--------------*/ 
#################################################################
#   更新主檔資料及增加匯入excel
#
#
#
#################################################################
function op_update(){
	global $xoopsDB;
  # 過濾資料
  print_r($_POST);die();
  $myts =& MyTextSanitizer::getInstance();
  $_POST['sn']=intval($_POST['sn']);
  $_POST['title']=$myts->addSlashes($_POST['title']); 
  $_POST['enable']=intval($_POST['enable']);
  $_POST['sort']=intval($_POST['sort']);   
  $_POST['order']=intval($_POST['order']);  
  $_POST['page_count']=intval($_POST['page_count']);  
  //$import_title=explode (",", $_POST['import_title']);
  # ---- 主機時間戳記
  //$date=strtotime("now");

    $sql = "update ".$xoopsDB->prefix("ugm_table_column")." set
  	 `title` = '{$datas['title']}' ,
  	 `enable` = '{$datas['enable']}'
  	where sn='$sn'";
  	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  
  
  
  
  # ---- 開始更新主檔，取得主檔之sn
  $sql = "update ".$xoopsDB->prefix("ugm_table_main")." set
          `title`  = '{$_POST['title']}'  ,
          `enable` = '{$_POST['enable']}' ,
          `sort`   = '{$_POST['sort']}'   ,
          `order`  = '{$_POST['order']}'  ,
          `page_count` = '{$_POST['page_count']}' 
          where sn='{$_POST['sn']}'";//die($sql);
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); 
  # ---- 取得max_sort

  # ---- 取得 ugm_table_record  where 'main_sn'='{$main_sn}'  的最大sort
  $sort=get_record_max_sort($_POST['sn']);
 
  # ---- 寫入 記錄檔 取得記錄檔之 record_sn   
  foreach ($_POST['import'] as $k =>$record){    
    # ---- 開始寫入記錄檔，取得記錄檔之record_sn
    $sql = "insert into ".$xoopsDB->prefix("ugm_table_record")."
  	        (`main_sn`, `enable`, `sort`)
  	        values
            ('{$main_sn}'  , '1' , '{$sort}')";
    $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql);
    # ----取得最後新增資料的流水編號
    $record_sn=$xoopsDB->getInsertId();
    
    # ---- 將每筆資料還原為cell
    $record=explode (",", $record);     
    foreach ($record as $k =>$v){
      # ---- 開始寫入值檔，取得記錄檔之record_sn
      $sql_r = "insert into ".$xoopsDB->prefix("ugm_table_value")."
    	          (`column_sn`, `record_sn`, `value`)
    	          values
                ('{$column_sn[$k]}' , '{$record_sn}' , '{$v}' )"; 
      $xoopsDB->query($sql_r) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql_r);       
    }     
  }
	return $main_sn;
}

#################################################################
#   將匯入excel資料寫入資料庫
#
#
#
#################################################################
function op_insert(){
	global $xoopsDB;
  # 過濾資料
  $myts =& MyTextSanitizer::getInstance();
  $_POST['title']=$myts->addSlashes($_POST['title']);
  $_POST['enable']=intval($_POST['enable']);
  $_POST['sort']=intval($_POST['sort']);
  $_POST['order']=intval($_POST['order']);
  $_POST['page_count']=intval($_POST['page_count']);
  $_POST['sn']=intval($_POST['sn']);
  # ---- 主機時間戳記
  $date=strtotime("now");

  # ----- 主檔 ----------------------
  if(!$_POST['sn']){
    # ---- 新增 ---- 
    # ---- 開始寫入主檔，取得主檔之sn
    $sql = "insert into ".$xoopsDB->prefix("ugm_table_main")."
  	        (`title`, `enable`, `sort`, `order`, `page_count`, `date`)
  	        values
            ('{$_POST['title']}' , '{$_POST['enable']}' , '{$_POST['sort']}' , '{$_POST['order']}' , '{$_POST['page_count']}' , $date)";
    $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql);
    # ----取得最後新增資料的流水編號
    $main_sn=$xoopsDB->getInsertId();   
  }else{
    # ----  編輯  # ---- 開始更新主檔，取得主檔之sn
    $sql = "update ".$xoopsDB->prefix("ugm_table_main")." set
            `title`  = '{$_POST['title']}'  ,
            `enable` = '{$_POST['enable']}' ,
            `sort`   = '{$_POST['sort']}'   ,
            `order`  = '{$_POST['order']}'  ,
            `page_count` = '{$_POST['page_count']}' 
            where sn='{$_POST['sn']}'";//die($sql);
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
    $main_sn=$_POST['sn'];  
  }
  # -----------------------------------
  
  foreach($_POST['check'] as $check_main_sn =>$record){
    foreach($record as $row =>$v){       
      # ---- 列 --------------------------------------------------------------------------------------       
      if($row!=1){
        if($check_main_sn==0){
           $row_sort= $row;        
        }else{           
           #  ---- 取得 ugm_table_record  where 'main_sn'='{$main_sn}'  的最大sort
           $row_sort=get_record_max_sort($check_main_sn);        
        } 
        # ---- 開始寫入記錄檔，取得記錄檔之record_sn
        $sql = "insert into ".$xoopsDB->prefix("ugm_table_record")."
      	        (`main_sn`, `enable`, `sort`)
      	        values
                ('{$main_sn}'  , '1' , '{$row_sort}')";
        $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql);
        # ----取得最後新增資料的流水編號
        $record_sn=$xoopsDB->getInsertId();       
      }
      # ------------------------------------------------------------------------------------------------      
      foreach($_POST['import'][$check_main_sn][$row] as $col=>$value){
        # ---- 欄 ---------------------------------------------------------------------------------------
        if($row==1){
          # ---- 標題欄
          if($check_main_sn==0){
            # ---- 新增
            # ---- 開始寫入欄位檔，取得欄位檔之colum_sn
            $sql_col = "insert into ".$xoopsDB->prefix("ugm_table_column")."
          	            (`main_sn`, `title`, `enable`, `sort`)
          	            values
                        ('{$main_sn}' , '{$value}' , '1' , '{$col}')";
            $xoopsDB->query($sql_col) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql);
            # ----取得最後新增資料的流水編號
            $column_sn[$col]=$xoopsDB->getInsertId();
          }else{
            # ---- 編輯 的新增
             $sql_col = "select sn 
                         from ".$xoopsDB->prefix("ugm_table_column")."
                         where main_sn='{$check_main_sn}' and title='{$value}'
                         ";
             $result_col = $xoopsDB->query($sql_col) or  redirect_header($_SESSION['return_url'],3, "標題欄資料有錯誤，請檢查！！");
             list($DB_column_sn)=$xoopsDB->fetchRow($result_col);
             if(!$DB_column_sn) redirect_header($_SESSION['return_url'],3, "標題欄資料有錯誤，請檢查！！");
             $column_sn[$col]=$DB_column_sn;
          }
        }else{
          # ----資料列 ------  
          # ---- 開始寫入值檔，取得記錄檔之record_sn
          $sql_cell = "insert into ".$xoopsDB->prefix("ugm_table_value")."
        	          (`column_sn`, `record_sn`, `value`)
        	          values
                    ('{$column_sn[$col]}' , '{$record_sn}' , '{$value}' )";
          $xoopsDB->query($sql_cell) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql_r);          
        }
      }  
    }
  }
  /*
  print_r($_POST['import']);
  echo "<br>";
  print_r($_POST['check']);
  die();


  # ---- 寫入欄位檔，取得col_title 之sn 陣列
  foreach($import_title as $k =>$v){
    # 過濾資料
    $v=$myts->addSlashes($v) ;
    # ---- 開始寫入欄位檔，取得欄位檔之colum_sn
    $sql = "insert into ".$xoopsDB->prefix("ugm_table_column")."
  	        (`main_sn`, `title`, `enable`, `sort`)
  	        values
            ('{$main_sn}' , '{$v}' , '1' , '{$k}')";
    $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql);
    # ----取得最後新增資料的流水編號
    $column_sn[]=$xoopsDB->getInsertId();
  }

  # ---- 寫入 記錄檔 取得記錄檔之 record_sn
  foreach ($_POST['import'] as $k =>$record){
    # ---- 開始寫入記錄檔，取得記錄檔之record_sn
    $sql = "insert into ".$xoopsDB->prefix("ugm_table_record")."
  	        (`main_sn`, `enable`, `sort`)
  	        values
            ('{$main_sn}'  , '1' , '{$k}')";
    $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql);
    # ----取得最後新增資料的流水編號
    $record_sn=$xoopsDB->getInsertId();

    # ---- 將每筆資料還原為cell
    $record=explode (",", $record);
    foreach ($record as $k =>$v){
      # ---- 開始寫入值檔，取得記錄檔之record_sn
      $sql_r = "insert into ".$xoopsDB->prefix("ugm_table_value")."
    	          (`column_sn`, `record_sn`, `value`)
    	          values
                ('{$column_sn[$k]}' , '{$record_sn}' , '{$v}' )";
      $xoopsDB->query($sql_r) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql_r);
    }
  }
  */
	return $main_sn;
}

################################################################################
#  //列出所有ugm_table_main資料
#
#
################################################################################
function op_list(){
	global $xoopsDB,$xoopsModule;
  $_SESSION['return_list']=$_GET?$_GET:"";
	$sql = "select * 
          from ".$xoopsDB->prefix("ugm_table_main")."
          order by sort desc";

	//getPageBar($原sql語法, 每頁顯示幾筆資料, 最多顯示幾個頁數選項);
  $count=20;
  $PageBar=getPageBar($sql,$count,10);
  $bar=$PageBar['bar'];
  $sql=$PageBar['sql'];
  $total=$PageBar['total'];

	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  # ------------ 是否出現分頁 ------------------------------------
  $bar=($total>$count)?"<tr><th colspan=8>{$bar}</th></tr>":"";
  # ---------------------------------------------------------------
	
	$all_content="";
	
	while($all=$xoopsDB->fetchArray($result)){
	  //以下會產生這些變數： $sn , $title , $enable , $sort , $order , $page_count , $date , $counter
    foreach($all as $k=>$v){
      $$k=$v;
    } 
    # ----- 啟用狀態 ----------------------------------------------------------------
		$enable=($enable==1)?"<a href='{$_SERVER['PHP_SELF']}?op=op_update_enable&sn={$sn}&enable=0' title='"._BP_ENABLE_0."' atl='"._BP_ENABLE_0."'><img src='../images/on.png' /></a>":"<a href='{$_SERVER['PHP_SELF']}?op=op_update_enable&sn={$sn}&enable=1' title='"._BP_ENABLE."' atl='"._BP_ENABLE."'><img src='../images/off.png'/></a>";
		# ----- 排序方式-----------------------------------------------------------------
    $order=($order==1)?"由大至小":"<span>由小至大</span>";
    # ----- 日期: 時間戳記 轉使用者時間 ---------------------------------------------
    $date=date("Y/m/d",xoops_getUserTimestamp($date)); 
    # ----- 人氣 ----------------------- --------------------------------------------- 
    $counter=($counter)?$counter:"";
    # --------------------------------------------------------------------------------
		$fun="
		<td  class='c'>
  	<a href='{$_SERVER['PHP_SELF']}?op=show_one&sn=$sn' class='btn btn-success btn-mini' title=''>"._BP_VIEW."</a>
		<a href='{$_SERVER['PHP_SELF']}?op=op_form&sn=$sn' class='btn btn-info btn-mini' title=''>"._BP_EDIT."</a>
		<a href=\"javascript:op_delete_func($sn);\" class='btn btn-danger btn-mini' title=''>"._BP_DEL."</a> 
		<a href='..\index.php?sn={$sn}' class='btn btn btn-warning btn-mini' title=''>前台</a>
		</td>";
		
		$all_content.="<tr>
		<td>{$title}</td>
		<td class='c'>{$enable}</td>
		<td class='c'>{$sort}</td>
		<td class='c'>{$order}</td>
		<td class='c'>{$page_count}</td>
		<td class='c'>{$date}</td>
		<td class='c'>{$counter}</td>
		$fun
		</tr>";
	}


  //--------------------- 引入jquery -------------------------------------
  if(!file_exists(XOOPS_ROOT_PATH."/modules/tadtools/jquery.php")){
    redirect_header("index.php",3, _TAD_NEED_TADTOOLS);
  }
  include_once XOOPS_ROOT_PATH."/modules/tadtools/jquery.php";
  $jquery_path = get_jquery(); //一般只要此行即可

 	
	//刪除確認的JS
	$data=$jquery_path.ugm_javascript(1)."
	<script>
	function op_delete_func(sn){
		var sure = window.confirm('"._BP_DEL_CHK."');
		if (!sure)	return;
		location.href=\"{$_SERVER['PHP_SELF']}?op=op_delete&sn=\" + sn;
	}
	</script>

	<table  summary='list_table' border='0' cellspacing='3' cellpadding='3' class='ugm_tb'>
	<tr>
	<th>"._MA_UGMTABLE_TITLE."</th>
	<th>"._MA_UGMTABLE_ENABLE."</th>
	<th>"._MA_UGMTABLE_SORT."</th>
	<th>"._MA_UGMTABLE_ORDER."</th>
	<th>"._MA_UGMTABLE_PAGE_COUNT."</th>
	<th>"._MA_UGMTABLE_DATE."</th>
	<th>"._MA_UGMTABLE_COUNTER."</th>
	<th>"._BP_FUNCTION."</th>
  </tr>
	<tbody>
	$all_content
  $bar
	</tbody>
	</table>";
	
   $add_button="
     <div class='btn-group'>
       <a href='{$_SERVER['PHP_SELF']}?op=op_form' class='btn btn-primary'>"._BP_ADD."</a>
     </div>";
	//raised,corners,inset
	$main=ugm_div("",$add_button.$data,"");	
	return $main;
}

###############################################################################
#  刪除ugm_table_record 某筆記錄資料
#
#
#
###############################################################################
function op_record_delete($sn=""){
	global $xoopsDB;
  if(!$sn)return;
  
  # ---- 刪除 ugm_table_value ----
  $sql = "delete 
          from  ".$xoopsDB->prefix("ugm_table_value")."          
          where `record_sn`='{$sn}'"; //die($sql);  
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
 
  # ---- 刪除 ugm_table_record ---- 
	$sql = "delete
          from ".$xoopsDB->prefix("ugm_table_record")." 
          where sn='$sn'";// die($sql);
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  return; 
}

###############################################################################
#  刪除ugm_table_main某筆資料資料
#
#
#
###############################################################################
//
function op_delete($sn=""){
	global $xoopsDB;
  if(!$sn)return;
  # ---- 刪除 ugm_table_value ----
  $sql = "select a.sn
          from      ".$xoopsDB->prefix("ugm_table_value")."  as a
          left join ".$xoopsDB->prefix("ugm_table_column")." as b on a.column_sn = b.sn          
          where b.main_sn='{$sn}'";// die($sql);  
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); 
  
  while(list($value_sn)=$xoopsDB->fetchRow($result)){
    # ---- 刪除 ugm_table_column ----
  	$sql = "delete 
            from ".$xoopsDB->prefix("ugm_table_value")." 
            where sn='$value_sn'"; //die($sql);
  	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); 
  }
   
  # ---- 刪除 ugm_table_column ----
	$sql = "delete 
          from ".$xoopsDB->prefix("ugm_table_column")." 
          where main_sn='$sn'"; //die($sql);
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); 
   
  # ---- 刪除 ugm_table_column ----   

	$sql = "delete
          from ".$xoopsDB->prefix("ugm_table_record")." 
          where main_sn='$sn'";// die($sql);
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); 
   
  # ---- 刪除 ugm_table_main ----   
	
  $sql = "delete
          from ".$xoopsDB->prefix("ugm_table_main")." 
          where sn='$sn'"; //die($sql);
	$xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
}

###############################################################################
#  更新標題欄位啟用狀態
#
#
#
###############################################################################
function op_update_enable(){
  global $xoopsDB;
  /***************************** 過瀘資料 *************************/
  $enable=intval($_GET['enable']);
  $sn=intval($_GET['sn']);
  /****************************************************************/
  //更新
  $sql = "update ".$xoopsDB->prefix("ugm_table_main")." set  `enable` = '{$enable}' where `sn`='{$sn}'";
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  return ;
}    
###############################################################################
#  更新記錄啟用狀態
#
#
#
###############################################################################
function op_update_record_enable(){
  global $xoopsDB;
  /***************************** 過瀘資料 *************************/
  $enable=intval($_GET['enable']);
  $sn=intval($_GET['sn']);
  /****************************************************************/
  //更新
  $sql = "update ".$xoopsDB->prefix("ugm_table_record")." set  `enable` = '{$enable}' where `sn`='{$sn}'";
  $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
  return ;
} 
###############################################################################
#  自動排序
#
#
#
###############################################################################
function save_column_sort(){
  global $xoopsDB;
  $sort=1;
  foreach ($_POST['tr'] as $sn) {
    $sql="update ".$xoopsDB->prefix("ugm_table_column")." set `sort`='{$sort}' where `sn`='{$sn}'";
    $xoopsDB->queryF($sql) or die("Save Sort Fail! (".date("Y-m-d H:i:s").")");
    $sort++;
  }
  # 返回值
  echo "Save Sort OK! (".date("Y-m-d H:i:s").")";
  return;
} 
###############################################################################
#  報表「記錄」拖曳排序
#
#
#
###############################################################################
function save_record_sort(){
  global $xoopsDB;
  $order=intval($_GET['order']);
  if($order){
    $sort=count($_POST['tr']);
    foreach ($_POST['tr'] as $sn) {
      $sql="update ".$xoopsDB->prefix("ugm_table_record")." set `sort`='{$sort}' where `sn`='{$sn}'";
      $xoopsDB->queryF($sql) or die("Save Sort Fail! (".date("Y-m-d H:i:s").")");
      $sort--;
    }  
  }else{
    $sort=1;
    foreach ($_POST['tr'] as $sn) {
      $sql="update ".$xoopsDB->prefix("ugm_table_record")." set `sort`='{$sort}' where `sn`='{$sn}'";
      $xoopsDB->queryF($sql) or die("Save Sort Fail! (".date("Y-m-d H:i:s").")");
      $sort++;
    }  
  }
  # 返回值
  echo "Save Sort OK! (".date("Y-m-d H:i:s").")";
  return;
}
?>