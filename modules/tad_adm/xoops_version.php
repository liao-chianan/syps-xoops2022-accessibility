<?php
$modversion = [];

//---模組基本資訊---//
$modversion['name'] = _MI_TADADM_NAME;
$modversion['version'] = '2.92';
$modversion['description'] = _MI_TADADM_DESC;
$modversion['author'] = _MI_TADADM_AUTHOR;
$modversion['credits'] = _MI_TADADM_CREDITS;
$modversion['help'] = 'page=help';
$modversion['license'] = 'GNU GPL 2.0';
$modversion['license_url'] = 'www.gnu.org/licenses/gpl-2.0.html/';
$modversion['image'] = "images/logo_{$xoopsConfig['language']}.png";
$modversion['dirname'] = basename(__DIR__);

//---模組狀態資訊---//
$modversion['release_date'] = '2022/05/18';
$modversion['module_website_url'] = 'https://tad0616.net/';
$modversion['module_website_name'] = _MI_TAD_WEB;
$modversion['module_status'] = 'release';
$modversion['author_website_url'] = 'https://tad0616.net/';
$modversion['author_website_name'] = _MI_TAD_WEB;
$modversion['min_php'] = 5.4;
$modversion['min_xoops'] = '2.5';

//---paypal資訊---//
$modversion['paypal'] = [];
$modversion['paypal']['business'] = 'tad0616@gmail.com';
$modversion['paypal']['item_name'] = 'Donation : ' . _MI_TAD_WEB;
$modversion['paypal']['amount'] = 0;
$modversion['paypal']['currency_code'] = 'USD';

//---模組資料表架構---//
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables'][1] = 'tad_adm';

//---後台使用系統選單---//
$modversion['system_menu'] = 1;

//---後台管理介面設定---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

//---前台主選單設定---//
$modversion['hasMain'] = 1;
//$modversion['sub'][1]['name'] = '';
//$modversion['sub'][1]['url'] = '';

//---模組自動功能---//
$modversion['onInstall'] = 'include/onInstall.php';
$modversion['onUpdate'] = 'include/onUpdate.php';
$modversion['onUninstall'] = 'include/onUninstall.php';

//---偏好設定---//
$modversion['config'] = [];
$i = 0;
$modversion['config'][$i]['name'] = 'list_amount';
$modversion['config'][$i]['title'] = '_MI_TADADM_LIST_AMOUNT';
$modversion['config'][$i]['description'] = '_MI_TADADM_LIST_AMOUNT_DESC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = '10';

$i++;
$modversion['config'][$i]['name'] = 'login';
$modversion['config'][$i]['title'] = '_MI_TADADM_LOGIN';
$modversion['config'][$i]['description'] = '_MI_TADADM_LOGIN_DESC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'module_id_temp';
$modversion['config'][$i]['title'] = '_MI_TADADM_MODULE_ID_TEMP';
$modversion['config'][$i]['description'] = '_MI_TADADM_MODULE_ID_TEMP_DESC';
$modversion['config'][$i]['formtype'] = 'textarea';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'block_id_temp';
$modversion['config'][$i]['title'] = '_MI_TADADM_BLOCK_ID_TEMP';
$modversion['config'][$i]['description'] = '_MI_TADADM_BLOCK_ID_TEMP_DESC';
$modversion['config'][$i]['formtype'] = 'textarea';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'ssh_port';
$modversion['config'][$i]['title'] = '_MI_TADADM_SSH_PORT';
$modversion['config'][$i]['description'] = '_MI_TADADM_SSH_PORT_DESC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = '22';

$i++;
$modversion['config'][$i]['name'] = 'source';
$modversion['config'][$i]['title'] = '_MI_TADADM_SOURCE';
$modversion['config'][$i]['description'] = '_MI_TADADM_SOURCE_DESC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'https://campus-xoops.tn.edu.tw';

//---搜尋---//
//$modversion['hasSearch'] = 1;
//$modversion['search']['file'] = "include/search.php";
//$modversion['search']['func'] = "搜尋函數名稱";

//---區塊設定---//
$modversion['blocks'] = [];
$i = 1;
$modversion['blocks'][$i]['file'] = 'tad_adm_new.php';
$modversion['blocks'][$i]['name'] = _MI_TADADM_BNAME1;
$modversion['blocks'][$i]['description'] = _MI_TADADM_BDESC1;
$modversion['blocks'][$i]['show_func'] = 'tad_adm_new';
$modversion['blocks'][$i]['template'] = 'tad_adm_new.tpl';
$modversion['blocks'][$i]['edit_func'] = 'tad_adm_new_edit';
$modversion['blocks'][$i]['options'] = '10';

//---樣板設定---//
$modversion['templates'] = [];
$i = 1;
$modversion['templates'][$i]['file'] = 'tad_adm_adm_main.tpl';
$modversion['templates'][$i]['description'] = 'tad_adm_adm_main.tpl';

$i++;
$modversion['templates'][$i]['file'] = 'tad_adm_adm_spam.tpl';
$modversion['templates'][$i]['description'] = 'tad_adm_adm_spam.tpl';

$i++;
$modversion['templates'][$i]['file'] = 'tad_adm_adm_phpini.tpl';
$modversion['templates'][$i]['description'] = 'tad_adm_adm_phpini.tpl';

$i++;
$modversion['templates'][$i]['file'] = 'tad_adm_adm_backup.tpl';
$modversion['templates'][$i]['description'] = 'tad_adm_adm_backup.tpl';

$i++;
$modversion['templates'][$i]['file'] = 'tad_adm_adm_clean.tpl';
$modversion['templates'][$i]['description'] = 'tad_adm_adm_clean.tpl';

$i++;
$modversion['templates'][$i]['file'] = 'tad_adm_tn_manager.tpl';
$modversion['templates'][$i]['description'] = 'tad_adm_tn_manager.tpl';
$i++;
$modversion['templates'][$i]['file'] = 'tad_adm_adm_xoops.tpl';
$modversion['templates'][$i]['description'] = 'tad_adm_adm_xoops.tpl';
