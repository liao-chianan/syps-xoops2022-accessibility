<?php 
##################################################
#  匯入報表
#  
#
#
##################################################
function import_excel($col_num=0){
  global $xoopsDB,$xoopsModule,$xoopsModuleConfig;
  # 過濾資料
  $myts =& MyTextSanitizer::getInstance();
  $main_sn=intval($_POST['sn']);
  //$op=$main_sn?"op_update":"op_insert";

  # ---- 有傳excel檔
  if($_FILES['importfile']['tmp_name']){
    //引入TadTools的函式庫
    if(!file_exists(TADTOOLS_PATH."/tad_function.php")){
     redirect_header("http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50",3, _TAD_NEED_TADTOOLS);
    }
    #引入 PHPExcel_IOFactory 物件庫
    require_once XOOPS_ROOT_PATH.'/modules/tadtools/PHPExcel/IOFactory.php';

    #讀取舊版 excel 檔案
    $reader = PHPExcel_IOFactory::createReader('Excel5');

    # 檔案名稱
    $PHPExcel = $reader->load( $_FILES['importfile']['tmp_name'] );

    # 讀取第一個工作表(編號從 0 開始)
    $sheet = $PHPExcel->getSheet(0);

    # 取得總列數 1 2 3 ......
    $highestRow = $sheet->getHighestRow();

    # 取得總欄數 # A B C ....
    $lastColumn = $sheet->getHighestColumn(); 

    if($main_sn){
      # ---- 編輯報表，匯入excel，從後面增加
      $sql="select count(sn)
            from ".$xoopsDB->prefix("ugm_table_column")."
            where main_sn='{$main_sn}'
      ";//die($sql);
      $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
      # ---- 得到標題欄數 ----
      list($col_num)=$xoopsDB->fetchRow($result);
      $col_num--;
    }else{
      # ---- 新增報表，匯入excel，建立標題欄
      # 轉成數字
      $col_num=ExcelCol2num($lastColumn);
    }
    #整合成$datas 陣列
    # 一次讀取一列，標題列不讀取 (列的編號由1 開始)
    for ($row = 1; $row <= $highestRow; $row++) {
      //讀取一列中的每一格
      for ($col = 0; $col <= $col_num; $col++) {
        #取得資料
        $val =  $sheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
        # ---- 過濾資料
        # 去除空格
        $val=trim($val);
        $datas[$row][$col]= $myts->addSlashes($val);
      }
    }
  }else{
    if(!$main_sn)redirect_header($_SESSION['return_url'],3, "沒有傳檔無法新增！！");
    # ---- 編輯表頭，沒有傳檔
    $_POST['title']=$myts->addSlashes($_POST['title']);
    $_POST['enable']=intval($_POST['enable']);
    $_POST['sort']=intval($_POST['sort']);
    $_POST['order']=intval($_POST['order']);
    $_POST['page_count']=intval($_POST['page_count']);

    $sql = "update ".$xoopsDB->prefix("ugm_table_main")." set
            `title`  = '{$_POST['title']}'  ,
            `enable` = '{$_POST['enable']}' ,
            `sort`   = '{$_POST['sort']}'   ,
            `order`  = '{$_POST['order']}'  ,
            `page_count` = '{$_POST['page_count']}'
            where sn='{$main_sn}'";//die($sql);
    $xoopsDB->queryF($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	  redirect_header($_SESSION['return_url'],3, _BP_SUCCESS);
  }

  # ---- 報表主檔資料
  $form_head="";
  /*
   [op]  [sn]  [title] [enable]  [sort] [order] [page_count] 

  */
  foreach($_POST as $key => $v){
    if($key=="op"){
      # ---- op 改為寫入
      $form_head.="<input type='hidden' name='op' value='op_insert'>";
    }else{
      $form_head.="<input type='hidden' name='{$key}' value='{$v}'>";
    }
  }

  # 顯示匯入資料   
  $i=0;
  $add_form=$form_head;
  
  foreach($datas as $row => $record){
    # ---- 顯示資料 ----
    $add_form.="<tr>";
    # ---- 標題 ----
    foreach($record as $col => $column){
      if($row==1){
        if($col==0){
          $add_form.="<th>
                        <input type='hidden' name='check[$main_sn][$row]' value='on'>
                        <input type='hidden' name='import[$main_sn][$row][$col]' value='{$column}'>{$column}
                      </th>";
        }else{
          $add_form.="<th><input type='hidden' name='import[$main_sn][$row][$col]' value='{$column}'>{$column}</th>";
        }
      }else{
        if($col==0){
          $add_form.="<td>
                        <input type='checkbox' name='check[$main_sn][$row]'  checked>
                        <input type='hidden' name='import[$main_sn][$row][$col]' value='{$column}'>{$column}
                      </td>";
        }else{
          $add_form.="<td><input type='hidden' name='import[$main_sn][$row][$col]' value='{$column}'>{$column}</td>";
        }
      }
    }
    $add_form.="</tr>";
  }
  $main="
  	<form action='{$_SERVER['PHP_SELF']}' method='post' id='myForm' enctype='multipart/form-data'>    
      <button type='submit' class='btn btn-primary'>"._MA_IMPORT_OK."</button>
    	<table border='0' cellspacing='3' cellpadding='3' id='ugm_tb' class='table' style='word-wrap:break-word; word-break:break-all;'>
      $add_form
      </table>
    </form>
  ";
  return  $main;   
}


?>