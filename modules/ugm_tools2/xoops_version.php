<?php
$modversion = array();

//---模組基本資訊---//
$modversion['name']        = 'ugm_tools2';
$modversion['version']     = 1.28;
$modversion['description'] = '模組工具2';
$modversion['author']      = '郭俊良';
$modversion['credits']     = '育將電腦工作室';
$modversion['help']        = 'page=help';
$modversion['license']     = 'GNU GPL 2.0';
$modversion['license_url'] = 'www.gnu.org/licenses/gpl-2.0.html/';
$modversion['image']       = 'images/logo.png';
$modversion['dirname']     = basename(dirname(__FILE__));

//---模組狀態資訊---//
$modversion['release_date']        = '2021/08/24';
$modversion['module_website_url']  = 'https://github.com/webugm/ugm_tools2';
$modversion['module_website_name'] = 'ugm_tools2';
$modversion['module_status']       = 'release';
$modversion['author_website_url']  = 'https://www.ugm.com.tw';
$modversion['author_website_name'] = '育將電腦工作室';
$modversion['min_php']             = 7.0;
$modversion['min_xoops']           = '2.5';
$modversion['min_tadtools']        = '3.3';

//---paypal資訊---//
$modversion['paypal']                  = array();
$modversion['paypal']['business']      = 'tawan158@gmail.com';
$modversion['paypal']['item_name']     = 'Donation : ' . '郭俊良';
$modversion['paypal']['amount']        = 10;
$modversion['paypal']['currency_code'] = 'USD';

//---後台使用系統選單---//
$modversion['system_menu'] = 1;

//---模組資料表架構---//
//$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
//$modversion['tables'][0] = '';

//---後台管理介面設定---//
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu']  = 'admin/menu.php';

//---前台主選單設定---//
$modversion['hasMain'] = 0;
//$modversion['sub'][1]['name'] = '';
//$modversion['sub'][1]['url'] = '';

//---模組自動功能---//
//$modversion['onInstall'] = "include/install.php";
//$modversion['onUpdate'] = "include/update.php";
//$modversion['onUninstall'] = "include/onUninstall.php";

//---樣板設定---//
$modversion['templates']                    = array();
$i                                          = 1;
$modversion['templates'][$i]['file']        = 'demo_adm_main.tpl';
$modversion['templates'][$i]['description'] = '後台管理頁樣板';

// $i++;
// $modversion['templates'][$i]['file']        = 'demo_index.tpl';
// $modversion['templates'][$i]['description'] = '模組首頁樣板';

//---偏好設定---//
$modversion['config'] = array();
//$i=0;
//$modversion['config'][$i]['name']    = '偏好設定名稱（英文）';
//$modversion['config'][$i]['title']    = '偏好設定標題（常數）';
//$modversion['config'][$i]['description']    = '偏好設定說明（常數）';
//$modversion['config'][$i]['formtype']    = '輸入表單類型';
//$modversion['config'][$i]['valuetype']    = '輸入值類型';
//$modversion['config'][$i]['default']    = 預設值;
//
//$i++;

//---搜尋---//
//$modversion['hasSearch'] = 1;
//$modversion['search']['file'] = "include/search.php";
//$modversion['search']['func'] = "搜尋函數名稱";

//---區塊設定---//
//$modversion['blocks'] = array();
//$i=1;
//$modversion['blocks'][$i]['file'] = "區塊檔.php";
//$modversion['blocks'][$i]['name'] = 區塊名稱（常數）;
//$modversion['blocks'][$i]['description'] = 區塊說明（常數）;
//$modversion['blocks'][$i]['show_func'] = "執行區塊函數名稱";
//$modversion['blocks'][$i]['template'] = "區塊樣板.tpl";
//$modversion['blocks'][$i]['edit_func'] = "編輯區塊函數名稱";
//$modversion['blocks'][$i]['options'] = "設定值1|設定值2";
//
//$i++;

//---評論---//
//$modversion['hasComments'] = 1;
//$modversion['comments']['pageName'] = '單一頁面.php';
//$modversion['comments']['itemName'] = '主編號';

//---通知---//
//$modversion['hasNotification'] = 1;
