<?php
$modversion = array();

//---模組基本資訊---//
$modversion['name'] = _MI_UGMTABLE_NAME;
$modversion['version'] = 1.01;
$modversion['description'] = _MI_UGMTABLE_DESC;
$modversion['author'] = _MI_UGMTABLE_AUTHOR;
$modversion['credits'] = _MI_UGMTABLE_CREDITS;
$modversion['help'] = 'page=help';
$modversion['license'] = 'GNU GPL 2.0';
$modversion['license_url'] = 'www.gnu.org/licenses/gpl-2.0.html/';
$modversion['image'] = 'images/logo.png';
$modversion['dirname'] = basename(dirname(__FILE__));


//---模組狀態資訊---//
$modversion['release_date'] = '2014/05/27';
$modversion['module_website_url'] = 'http://www.ugm.com.tw/';
$modversion['module_website_name'] = _MI_UGMTABLE_WEBSITE_NAME;
$modversion['module_status'] = 'release';
$modversion['author_website_url'] = 'http://www.ugm.com.tw/';
$modversion['author_website_name'] = _MI_UGMTABLE_WEBSITE_NAME;
$modversion['min_php']=5.2;
$modversion['min_xoops']='2.5';
$modversion['min_tadtools']='2.3';

//---paypal資訊---//
$modversion ['paypal'] = array();
$modversion ['paypal']['business'] = 'tawan158@gmail.com';
$modversion ['paypal']['item_name'] = 'Donation : ' . _MI_UGMTABLE_WEBSITE_NAME;
$modversion ['paypal']['amount'] = 0;
$modversion ['paypal']['currency_code'] = 'USD';


//---後台使用系統選單---//
$modversion['system_menu'] = 1;


//---模組資料表架構---////---啟動後台管理界面選單---//
$modversion['system_menu'] = 1;//---資料表架構---//
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "ugm_table_column";
$modversion['tables'][2] = "ugm_table_main";
$modversion['tables'][3] = "ugm_table_record";
$modversion['tables'][4] = "ugm_table_value";

//---後台管理介面設定---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';


//---前台主選單設定---//
$modversion['hasMain'] = 1;
//$modversion['sub'][1]['name'] = '';
//$modversion['sub'][1]['url'] = '';


//---模組自動功能---//
//$modversion['onInstall'] = "include/install.php";
//$modversion['onUpdate'] = "include/update.php";
//$modversion['onUninstall'] = "include/onUninstall.php";


//---偏好設定---//
$modversion['config'] = array();
//$modversion['config'][0]['name']	= '偏好設定名稱（英文）';
//$modversion['config'][0]['title']	= '偏好設定標題（常數）';
//$modversion['config'][0]['description']	= '偏好設定說明（常數）';
//$modversion['config'][0]['formtype']	= '輸入表單類型';
//$modversion['config'][0]['valuetype']	= '輸入值類型';
//$modversion['config'][0]['default']	= 預設值;


//---搜尋---//
//$modversion['hasSearch'] = 1;
//$modversion['search']['file'] = "include/search.php";
//$modversion['search']['func'] = "搜尋函數名稱";

//---區塊設定---//
//$modversion['blocks'] = array();
//$modversion['blocks'][1]['file'] = "區塊檔.php";
//$modversion['blocks'][1]['name'] = 區塊名稱（常數）;
//$modversion['blocks'][1]['description'] = 區塊說明（常數）;
//$modversion['blocks'][1]['show_func'] = "執行區塊函數名稱";
//$modversion['blocks'][1]['template'] = "區塊樣板.html";
//$modversion['blocks'][1]['edit_func'] = "編輯區塊函數名稱";
//$modversion['blocks'][1]['options'] = "設定值1|設定值2";

//---樣板設定---//
$modversion['templates'] = array(); 
$modversion['templates'][1]['file'] = 'ugm_table_index_tpl.html';
$modversion['templates'][1]['description'] = _MI_UGMTABLE_TEMPLATE_DESC1;
$modversion['templates'][2]['file'] = 'ugm_table_adm_main_tpl.html';
$modversion['templates'][2]['description'] = _MI_UGMTABLE_TEMPLATE_DESC2;
$modversion['templates'][3]['file'] = 'ugm_table_autoform.html';
$modversion['templates'][3]['description'] = _MI_UGMTABLE_TEMPLATE_DESC3; 
$modversion['templates'][4]['file'] = 'ugm_table_show_one.html';
$modversion['templates'][4]['description'] = _MI_UGMTABLE_TEMPLATE_DESC4; 
$modversion['templates'][5]['file'] = 'ugm_table_tableform.html';
$modversion['templates'][5]['description'] = _MI_UGMTABLE_TEMPLATE_DESC5;  
$modversion['templates'][6]['file'] = 'ugm_table_recordform.html';
$modversion['templates'][6]['description'] = _MI_UGMTABLE_TEMPLATE_DESC6;
//$modversion['templates'][1]['file'] = 'xxx.html';
//$modversion['templates'][1]['description'] = '';


//---評論---//
//$modversion['hasComments'] = 1;
//$modversion['comments']['pageName'] = '單一頁面.php';
//$modversion['comments']['itemName'] = '主編號';

//---通知---//
//$modversion['hasNotification'] = 1;



?>
