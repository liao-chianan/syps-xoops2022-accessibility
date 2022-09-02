<?php
/*
type=> 1.hidden 2.text
-------------------------------------------------------------------------------
validator -> 1. validate[required] 必填

*/
$auto_form_head=array(
  'action'  => $_SERVER['PHP_SELF'],
  'method'  => 'post', 
  'id'      => 'myForm', 
  'class'   => 'form-inline', 
  'enctype' => 'multipart/form-data',
  'title'   => $form_title
);


$auto_form['一般設定'] = array(
  # ---- op ----
  array(
    'name'      =>'op',
    'text'      =>'',
    'desc'      =>'',
    'type'      => 'hidden',
    'value'     =>$op,
    'validator' =>'',
    'width' =>''
  ),  
  # ---- 流水號 ----
  array(
    'name'      =>'sn',
    'text'      =>'',
    'desc'      =>'',
    'type'      => 'hidden',
    'value'     =>$sn,
    'validator' =>'',
    'width' =>''
  ),
  # ---- 報表標題 ----
  array(
    'name'      =>'title',
    'text'      =>_MA_UGMTABLE_TITLE,
    'desc'      =>'',
    'type'      => 'text',
    'value'     =>$title,
    'validator' =>'validate[required]',
    'width' =>'span12'
  ),
  # ---- 狀態(啟用、停用) ----
  array(
    'name'      =>'enable',
    'text'      =>_MA_UGMTABLE_ENABLE,
    'desc'      =>'',
    'type'      =>'yesno',
    'value'     =>$enable,
    'validator' => '',
    'width' =>''
  ),
  # ---- 排序 ----
 array(
    'name'      =>'sort',
    'text'      =>_MA_UGMTABLE_SORT,
    'desc'      =>'',
    'type'      =>'text',
    'value'     =>$sort,
    'validator' =>'',
    'width' =>'span2'
  ),
  # ---- 排序狀態(降、升) ----
  array(
    'name'      =>'order',
    'text'      =>_MA_UGMTABLE_ORDER_TITLE,
    'desc'      =>'',
    'type'      =>'yesno',
    'value'     =>$order,
    'validator' => '',
    'width' =>''
  ),
  # ---- 每頁筆數 ----
  array(
    'name'      =>'page_count',
    'text'      =>_MA_UGMTABLE_PAGE_COUNT,
    'desc'      =>'',
    'type'      =>'text',
    'value'     =>$page_count,
    'validator' =>' validate[required]',
    'width' =>'span2'
  ),
  # ---- 匯入excel檔，name須與import_excel配合 ----
  array(
    'name'      =>'importfile',
    'text'      =>'上傳檔案',
    'desc'      =>'資料格式必須是xls格式文件！！',
    'type'      =>'d_file',
    'value'     =>'',
    'validator' =>'',
    'width' =>'span12'
  )  
);



?>