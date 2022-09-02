<?php

/*-----------引入檔案區--------------*/

include_once "header.php";
include XOOPS_ROOT_PATH."/header.php";
$xoopsOption['template_main'] = "ugm_table_index_tpl.html";



/*-----------執行動作判斷區----------*/
$op=empty($_REQUEST['op'])?"":$_REQUEST['op'];
$sn   = empty($_REQUEST['sn'])    ? "" : intval($_REQUEST['sn']);

switch($op){

	default:
	show_one($sn);
	break;
}

/*-----------秀出結果區--------------*/
module_footer($main);    
include_once XOOPS_ROOT_PATH.'/footer.php';
/*  ----------------------------  */

#################################################################
#   顯示單筆報表
#
#
#
#################################################################
function show_one($sn=""){
	global $xoopsDB,$xoopsTpl;
  if(!$sn){
    $sql="select sn
          from ".$xoopsDB->prefix("ugm_table_main")."
          order by date desc
          limit 1";
    $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); 
    list($sn)=$xoopsDB->fetchRow($result);
    if(!$sn)redirect_header(XOOPS_URL,3, "目前沒有資料"); 
  }
  
  # ---- 取得主檔資料 ----
  $DBV=get_db_table($sn,"ugm_table_main");
  if(!$DBV['enable'])redirect_header(XOOPS_URL,3, "");
  
  # ---- 取得報表標題及啟用狀態
  $sql="select sn,title
        from ".$xoopsDB->prefix("ugm_table_column")." 
        where `main_sn`='{$DBV['sn']}' and  `enable`='1'
        order by `sort`";//die($sql);
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); 
  
  
  while(list($sn,$title)=$xoopsDB->fetchRow($result)){
	  # ---- 變數： $sn , title
	  # ---- 報表標題
    $column[$sn]=$title;
  }
  
  # ---- 取得記錄資料及啟用狀態
  $order=$DBV['order']?" desc":"";
  # --------------------------------------------------------------- 
  $sql="select sn,enable
        from ".$xoopsDB->prefix("ugm_table_record")." 
        where `main_sn`='{$DBV['sn']}'  and  `enable`='1'
        order by `sort`{$order}";//die($sql); 
  
  
  # ---------- 分頁 -------------------------------------------------
  //getPageBar($原sql語法, 每頁顯示幾筆資料, 最多顯示幾個頁數選項);
  $PageBar=getPageBar($sql,$DBV['page_count'],10);
  $bar=$PageBar['bar'];
  $sql=$PageBar['sql'];
  $total=$PageBar['total'];//頁數
  # ------------------------------------------------------------------   
        
        
  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); 
  # ------------ 是否出現分頁 ------------------------------------
  $bar=($total>$DBV['page_count'])?$bar:"";
  
  while(list($sn,$enable)=$xoopsDB->fetchRow($result)){
	  # ---- 變數： $sn ---- y軸
    //$record[]=$sn;
    $record[]=$sn;
  }
  
  # ---- 顯示報表儲存格及啟用狀態 ----   
  foreach($record as $record_sn){
    foreach($column as $column_sn=>$column_title){
      $sql="select `value`
            from ".$xoopsDB->prefix("ugm_table_value")." 
            where `record_sn`='{$record_sn}' and `column_sn`='{$column_sn}'";//die($sql);
      $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error()); //die($sql);
      list($value)=$xoopsDB->fetchRow($result);
      $tbody[$record_sn][$column_sn]=$value;
    }  
  }
  //$jquery=get_jquery(true); 
  # 將資料傳給樣板
  //$xoopsTpl->assign('js_code',$jquery);       // js_code(拖曳排序)
  //$xoopsTpl->assign('auto_sort',$auto_sort);  // 拖曳排序_設定
  //$xoopsTpl->assign('btn',$btn);              // 報表主檔
  $xoopsTpl->assign('bar',$bar);              // 分頁
  $xoopsTpl->assign('DBV',$DBV);              // 報表主檔
  $xoopsTpl->assign('column',$column);        // 報表標題
  $xoopsTpl->assign('tbody',$tbody);          // 報表內容 
  $xoopsTpl->assign('r_enable',$r_enable);    // 記錄的啟用狀態
  
 return; 
}

?>