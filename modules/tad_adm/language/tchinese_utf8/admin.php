<?php
xoops_loadLanguage('admin_common', 'tadtools');
//phpini.php
define('_MA_TADADM_PHPINI_ITEM', '設定項目');
define('_MA_TADADM_PHPINI_ITEM_VAL', '設定值');
define('_MA_TADADM_PHPINI_ADV', '建議值');
define('_MA_TADADM_PHPINI_ITEM_DESC', '相關說明');

//main.php
define('_MA_TADADM_1', '<i class="icon-ok"></i>');
define('_MA_TADADM_0', '');
define('_MA_TADADM_MOD_UPDATE_MODULE', '立即升級到');
define('_MA_TADADM_MOD_INSTALL_MODULE', '立即安裝');
define('_MA_TADADM_MOD_UPDATE_THEME', '升級佈景到');
define('_MA_TADADM_MOD_INSTALL_THEME', '安裝佈景');
define('_MA_TADADM_MOD_LATEST', '已是最新的');
define('_MA_TADADM_NO_MODS', '沒有任何模組');
define('_MA_TADADM_MOD_NAME', '模組名稱');
define('_MA_TADADM_MOD_VERSION', '目前版本');
define('_MA_TADADM_MOD_NEW_VERSION', '最新版本');
define('_MA_TADADM_MOD_LAST_UPDATE', '上次升級');
define('_MA_TADADM_MOD_NEW_LAST_UPDATE', '發布日期');
define('_MA_TADADM_MOD_DIRNAME', '目錄名稱');
define('_MA_TADADM_MOD_UNINSTALL', '未安裝');
define('_MA_TADADM_MOD_UPDATE_DESC', '新版說明');
define('_MA_TADADM_MOD_ABOUT_MOD', '模組簡介');
define('_MA_TADADM_LOGIN', '登入');
define('_MA_TADADM_SSH', 'SSH登入');
define('_MA_TADADM_SSH_HOST', '請輸入SSH登入主機');
define('_MA_TADADM_SSH_ID', '請輸入SSH登入帳號');
define('_MA_TADADM_SSH_PASS', '請輸入SSH登入密碼');
define('_MA_TADADM_FTP', 'FTP登入');
define('_MA_TADADM_FTP_HOST', '請輸入FTP登入主機');
define('_MA_TADADM_FTP_ID', '請輸入FTP登入帳號');
define('_MA_TADADM_FTP_PASS', '請輸入FTP登入密碼');
define('_MA_TADADM_DL_FAIL', '「%s」下載失敗！');
define('_MA_TADADM_MV_FAIL', '「%s」搬移至modules下失敗！');
define('_MA_TADADM_SSH_LOGIN_FAIL', '「%s」以SSH登入「%s」失敗！');
define('_MA_TADADM_FTP_LOGIN_FAIL', '「%s」以FTP登入「%s」失敗！');
define('_MA_TADADM_FTP_FAIL', 'FTP 連線失敗！（可能該伺服器無FTP服務或未啟動FTP服務）');
define('_MA_TADADM_KIND', '種類');
define('_MA_TADADM_MODULE', '模組');
define('_MA_TADADM_THEME', '佈景');
define('_MA_TADADM_FIX', '補充');
define('_MA_TADADM_THEME_UPDATE_OK', '佈景升級完畢！');
define('_MA_TADADM_THEME_INSTALL_OK', '「%s」佈景安裝完畢！可至「<a href="' . XOOPS_URL . '/modules/system/admin.php?fct=preferences&op=show&confcat_id=1">偏好設定</a>」將之設為預設佈景，或至前台佈景區塊套用之。');
define('_MA_TADADM_FTP_NOTE', 'FTP僅適用與安裝新模組，因為權限關係，FTP模式無法覆蓋原有資料夾，故不適用於升級模組。');

//spam.php
define('_MA_TADADM_NEVERLOGIN', '未登入過');
define('_MA_TADADM_CKECKOK', '清查完畢或查無資料');
define('_MA_TADADM_WORKTIME', '執行時間：%s 秒');
define('_MA_TADADM_AUTO_CHECK', '自動清查模式');
define('_MA_TADADM_AUTO_CHECK_DESC', '（使用一次即可，第一次用來清查所有帳號。此功能會自動檢查所有帳號，並自動換頁。由於換頁有20次之限制，故若帳號超過 %s 個，最後畫面可能會因為強制中斷而變成空白。此時，滑鼠請直接點擊網址列，然後按Enter，使之繼續檢查即可，直至檢查完畢為止。）');
define('_MA_TADADM_AUTO_CHECK_DESC1', '檢查時會連至 <a href="http://www.stopforumspam.com" target="_blank">http://www.stopforumspam.com</a> 檢查該帳號的 Email 是否為登記有案的垃圾帳號，故第一次速度會比較慢。');
define('_MA_TADADM_AUTO_CHECK_DESC2', '檢查後就會將結果存入資料庫，所以，第二次瀏覽帳號就會變快了。');
define('_MA_TADADM_AUTO_CHECK_DESC3', '<span style="color:red">紅色代表這是登記有案的「垃圾帳號」</span>；<span style="color:#CC6600">橘色代表「從簽名檔來研判八成是垃圾帳號」</span>；<span style="color:#505050">黑色代表應該是一般帳號</span>，<span style="color:blue">藍色是有發布過文章的帳號</span>');
define('_MA_TADADM_AUTO_CHECK_DESC4', '<a href="spam.php?op=all&mode=force">強制重查！</a>之前查過的Email會註記為已查，故不會再次至 stopforumspam 檢查該 Email 是否為垃圾郵件以加快檢查速度。但有些 Email 是之後才被 stopforumspam 列為垃圾郵件，故每隔一段時間，可利用此功能，重查一下 Email 是否有被列為垃圾郵件。');
define('_MA_TADADM_AUTO_CHECK_DESC5', '<a href="spam.php?op=spam">僅列出查為垃圾郵件列表</a>（執行「強制重查」後，可利用此功能觀看有找出哪些垃圾郵件並刪除之。）');
define('_MA_TADADM_UNAME', '帳號');
define('_MA_TADADM_COUNT', '發表數');
define('_MA_TADADM_EMAIL', '信箱');
define('_MA_TADADM_SPAM', '垃圾');
define('_MA_TADADM_REGIST', '註冊日');
define('_MA_TADADM_LASTLOGIN', '未登入日');
define('_MA_TADADM_SIGN', '簽名');
define('_MA_TADADM_DONT_DEL_ROOT', '不能刪除管理員');
define('_MA_TADADM_DEL_FAIL', '刪除使用者失敗！');
define('_MA_TADADM_DEL_OK', '刪除完畢！');
define('_MA_TADADM_NEXT_PAGE', '切換到下一頁');
define('_MA_TADADM_TOTAL', '共 %s 筆資料');
define('_MA_TADADM_NEVERSTART_DAY', '列出未啟動，並註冊超過 %s 天');
define('_MA_TADADM_NEVERLOGIN_DAY', '列出從未登入過，並註冊超過 %s 天');
define('_MA_TADADM_BY_EMAIL', '列出 Email 結尾（網域）為 %s 的資料');

define('_MA_TADADM_SELECT_ALL', '全選');
define('_MA_TADADM_MOD_FUNCTION', '管理');
define('_MA_TADADM_MOD_BLOCK', '區塊');
define('_MA_TADADM_MOD_ADMIN', '模組後台');

define('_MA_TADADM_MODULES_UPDATING', '升級');
define('_MA_TADADM_MODULES_INSTALLING', '安裝');
define('_MA_TADADM_MODULES_PHP_INI_PATH', '重要設定');
define('_MA_TADADM_FREE_SPACE', '硬碟剩餘空間：');
define('_MA_TADADM_DOWNLOAD_ZIP', '開始壓縮備份');

define('_MA_TADADM_CHMOD_FAILED', '<ul><li>無法將 %s 的讀寫權限設為 %s，該檔案目錄的擁有者為 %s:%s，屬性為 %s。</li></ul>');

define('_MA_TADADM_ADMTPL', '後台');
define('_MA_TADADM_MOD_UPDATE_ADMTPL', '升級後台');
define('_MA_TADADM_MOD_INSTALL_ADMTPL', '安裝後台');
define('_MA_TADADM_ADM_TPL_LATEST', '已是最新');
define('_MA_TADADM_ADM_TPL_INSTALL_OK', '後台佈景 %s 安裝成功！並已自動替換之。');
define('_MA_TADADM_ADM_TPL_UPDATE_OK', '後台佈景升級成功！');

define('_MA_TADADM_MOD_CLOSED', '模組關閉中');
define('_MA_TADADM_CLEAN', '清除選取的自訂樣板');
define('_MA_TADADM_CLEANED', '目前沒有自訂的舊樣板');

define('_MA_TADADM_MOD_PREF', '偏好設定');
define('_MA_TADADM_CAN_UPDATE_TO', '可升級至');
define('_MA_TADADM_ENABLE_MOD', '啟用模組');
define('_MA_TADADM_UNABLE_INSTALL_MODS', '無法安裝的模組');
define('_MA_TADADM_UNABLE_UPDATE_MODS', '無法升級的模組');
define('_MA_TADADM_REMOVE', '移除');
define('_MA_TADADM_DEFAULT_THEME', '目前預設佈景');
define('_MA_TADADM_UPDATE_TO_ALLOWED', '改為可選');
define('_MA_TADADM_UPDATE_TO_NOT_ALLOWED', '改為不可選');
define('_MA_TADADM_WRITABLE', '可寫入');
define('_MA_TADADM_ALLOWED_THEMES', '可選用網站佈景');
define('_MA_TADADM_NOT_ALLOWED_THEMES', '不開放選用的網站佈景');
define('_MA_TADADM_SPECIAL_THEMES', '特殊佈景');
define('_MA_TADADM_THEME_DELETE_OK', '佈景移除成功！');
define('_MA_TADADM_THEME_DELETE_FAIL', '佈景移除失敗！');

define('_MA_TADADM_FAILED_TO_GET_JSON', '無法取得檔案清單');

define('_MA_TADADM_ALLOWED_ENABLE_THEMES', '可安裝網站佈景');
define('_MA_TADADM_SPECIAL_ENABLE_THEMES', '可安裝特殊佈景');
define('_MA_TADADM_SPECIAL_THEMES_CANT_DEFAULT', '特殊佈景，不可為預設佈景');
define('_MA_TADADM_SPECIAL_THEMES_CANT_USEABLE', '特殊佈景，不應該可被使用者選用');

define('_MA_TADADM_ENABLE_MODS', '可安裝模組');
define('_MA_TADADM_ENABLE_ADM', '可安裝後台');
define('_MA_TADADM_ENABLE_THEME', '可安裝佈景');
define('_MA_TADADM_ENABLE_BLOCK', '可安裝區塊');
define('_MA_TADADM_UNABLE_BLOCKS', '關閉中區塊');
define('_MA_TADADM_MOD_UPDATE_BLOCK', '立即升級區塊');
define('_MA_TADADM_UPGRADE_XOOPS', '立即升級至');
define('_MA_TADADM_PATCH_XOOPS', '加入');
define('_MA_TADADM_UPGRADE_XOOPS_ITEMS', '可升級的項目');
define('_MA_TADADM_PATCH_XOOPS_ITEMS', '可補丁的項目');
define('_MA_TADADM_PATCH_OK', '補丁成功！');
define('_MA_TADADM_UPGRADE_OK', '升級成功！');
define('_MA_TADADM_UPGRADE_FROM_URL', '接著請手動進行升級程序');
define('_MA_TADADM_VERSION', '版本');
define('_MA_TADADM_HIGHER', '高於');
define('_MA_TADADM_LOWER', '低於');
define('_MA_TADADM_EQUAL', '已經是');
define('_MA_TADADM_UNABLE_UPGRADE', '無法安裝或升級');
define('_MA_TADADM_NONEED_UPGRADE', '無需升級');
define('_MA_TADADM_PATCH_INSTALLED', '此補丁已安裝');
define('_MA_TADADM_INSTALLED', '已安裝');

define('_MA_TADADM_INSTALLED_ITEM', '所有已安裝項目');
define('_MA_TADADM_INSTALLED_BLOCK', '已安裝區塊');
define('_MA_TADADM_INSTALLED_THEME', '已安裝佈景');
define('_MA_TADADM_INSTALLED_ADM', '已安裝後台');
define('_MA_TADADM_INSTALLED_MODS', '已安裝模組');
define('_MA_TADADM_INSTALLED_UNABLE_MODS', '已安裝但被關閉的模組');

define('_MA_TADADM_NEED_UPGRADE', '需升級項目');
define('_MA_TADADM_CLOSED', '（關閉中）');
define('_MA_TADADM_NEED_UPGRADE_MODS', '需升級模組');
define('_MA_TADADM_NEED_UPGRADE_THEME', '需升級佈景');
define('_MA_TADADM_NEED_UPGRADE_BLOCK', '需升級區塊');
define('_MA_TADADM_NEED_UPGRADE_ADM', '需升級後台');

define('_MA_TADADM_ADM_TPL', '後台');
define('_MA_TADADM_CONFIG', '偏好設定');
define('_MA_TADADM_UPDATE', '更新');
define('_MA_TADADM_BLOCK', '區塊');
define('_MA_TADADM_ID', '編號');
define('_MA_TADADM_IMG', '圖片');
define('_MA_TADADM_TITEL', '項目名稱');
define('_MA_TADADM_DESCRIPTION', '項目說明');
define('_MA_TADADM_OWNER', '擁有者');
define('_MA_TADADM_WRITEABLE', '讀寫權限');
define('_MA_TADADM_INSTALL', '手動安裝方式');
define('_MA_TADADM_UPGRADE', '手動升級方式');
define('_MA_TADADM_ENABLE_OTHER', '可安裝素材');
