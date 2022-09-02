<?php
include_once XOOPS_ROOT_PATH . '/modules/tadtools/language/' . $GLOBALS['xoopsConfig']['language'] . '/theme_common.php';
/**自訂設定之語系**/
define('TF_SHOW_VAR', '顯示佈景變數資訊');
define('TF_SHOW_VAR_DESC', '佈景開發時，會顯示所有 tad_themes 提供的控制變數及設定值');
define('TF_FONT_FAMILY', '主要字型設定');
define('TF_FONT_FAMILY_DEFAULT', 'Iansui, jf-openhuninn, Mamelon, mnyylti, HanWangWeBe, HanWangMingBlack, JasonHandwriting1-Regular, JasonHandwriting2-Regular, JasonHandwriting3-Regular');
define('TF_FONT_FAMILY_DESC', '輸入字型名稱，有空白的部份需要用""包起來。完整可用字型請參考：<a href="' . XOOPS_URL . '/modules/tadtools/fonts.php" target="_blank">' . XOOPS_URL . '/modules/tadtools/fonts.php</a>');
define('TF_LEFT_SPARATE', '左區域分隔線');
define('TF_LEFT_SPARATE_DESC', '左區域和主內容間是否加上分隔線');
define('TF_RIGHT_SPARATE', '右區域分隔線');
define('TF_RIGHT_SPARATE_DESC', '右區域和主內容間是否加上分隔線');
define('TF_SPARATE_STYLE', '左右區域分隔線的樣式');
define('TF_SPARATE_STYLE_DESC', '左右區域分隔線的樣式');
define('TF_MY_CODE', '欲加入頁尾的CSS或JS語法');
define('TF_MY_CODE_DESC', '可自行載入CSS或JS，例如：&lt;link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Noto+Serif+TC&display=swap" rel="stylesheet" media="all"&gt;');
define('TF_OG_FILE', '網站縮圖');
define('TF_OG_FILE_DESC', '在fb或line分享網址時，會顯示的縮圖（寬高至少 200px）');

define('TF_LOGO_BG1', 'logo區域的底圖1');
define('TF_LOGO_BG1_DESC', '若「是」會在logo區域加上底圖1');
define('TF_LOGO_BG1_REPEAT', 'logo底圖1重複方式');
define('TF_LOGO_BG1_REPEAT_DESC', 'logo底圖1重複的方式');
define('TF_LOGO_BG1_POSITION', 'logo底圖1位置');
define('TF_LOGO_BG1_POSITION_DESC', 'logo底圖1起始的位置');
define('TF_LOGO_BG1_SIZE', 'logo底圖1縮放');
define('TF_LOGO_BG1_SIZE_DESC', 'logo底圖1縮放方式');

define('TF_LOGO_BG2', 'logo區域的底圖2');
define('TF_LOGO_BG2_DESC', '若「是」會在logo區域加上底圖2');
define('TF_LOGO_BG2_REPEAT', 'logo底圖2重複方式');
define('TF_LOGO_BG2_REPEAT_DESC', 'logo底圖2重複的方式');
define('TF_LOGO_BG2_POSITION', 'logo底圖2位置');
define('TF_LOGO_BG2_POSITION_DESC', 'logo底圖2起始的位置');
define('TF_LOGO_BG2_SIZE', 'logo底圖2縮放');
define('TF_LOGO_BG2_SIZE_DESC', 'logo底圖2縮放方式');

define('TF_SLIDE_TIMEOUT', '滑動圖顯示時間');
define('TF_SLIDE_TIMEOUT_DESC', '單位為毫秒');
define('TF_SLIDE_NAV', '是否顯示控制項目');
define('TF_SLIDE_NAV_DESC', '若「否」左右滑動的圖示或控制器會消失');

define('TF_DISPLAY_TYPE_NOT_FULL', '內容底色皆置中');
define('TF_DISPLAY_TYPE_BG_FULL', '內容置中，底色滿版');
define('TF_DISPLAY_TYPE_ALL_FULL', '內容底色皆滿版');

define('TF_USE_CONTAINER_WIDTH', '整體頁面顯示寬度');
define('TF_USE_CONTAINER_WIDTH_DESC', '如： 1430px 或 85%');

define('TF_LOGO_AUTO', '是否使用自動配對');
define('TF_LOGO_AUTO_DESC', '讓系統自動偵測網址某變數來自動切換 logo');
define('TF_LOGO_PATH', '圖示放置路徑');
define('TF_LOGO_PATH_DESC', '前後都要有 /，如：/uploads/logo/');
define('TF_LOGO_VAR', '自動配對變數名稱');
define('TF_LOGO_VAR_DESC', '欲偵測的網址變數名稱，如：nsn');
define('TF_LOGO_EXT', 'logo圖的副檔名');
define('TF_LOGO_EXT_DESC', '例如 jpg 或 png');
define('TF_LOGO_ALIGN', 'logo圖的位置');
define('TF_LOGO_ALIGN_DESC', '僅適用於「置於頁面上」模式');
define('TF_LOGO_ALIGN_L', '靠左');
define('TF_LOGO_ALIGN_C', '置中');
define('TF_LOGO_ALIGN_R', '靠右');

define('TF_BG_COLOR', '背景顏色');
define('TF_BG_REPEAT', '背景重複');
define('TF_BG_REPEAT_NORMAL', '一般重複');
define('TF_BG_REPEAT_X', '僅橫向重複');
define('TF_BG_REPEAT_Y', '僅垂直重複');
define('TF_BG_NO_REPEAT', '不重複');
define('TF_BG_NO_REPEAT_COVER', '不重複，並放大圖片填滿畫面');
define('TF_BG_NO_REPEAT_CONTAIN', '不重複，並縮放以呈現完整圖片');
define('TF_BG_ATTACHMENT', '背景模式');
define('TF_BG_ATTACHMENT_SCROLL', '隨畫面捲動');
define('TF_BG_ATTACHMENT_FIXED', '固定不捲動');
define('TF_BG_POSITION', '背景位置');
define('TF_BG_POSITION_LT', '左上');
define('TF_BG_POSITION_LC', '左中');
define('TF_BG_POSITION_LB', '左下');
define('TF_BG_POSITION_RT', '右上');
define('TF_BG_POSITION_RC', '右中');
define('TF_BG_POSITION_RB', '右下');
define('TF_BG_POSITION_CC', '正中');
define('TF_BG_POSITION_CT', '上中');
define('TF_BG_POSITION_CB', '下中');
define('TF_BG_BG2', '背景底圖2');
define('TF_BG_BG2_DESC', '背景加上底圖2');
define('TF_BG_BG2_REPEAT', '背景底圖2重複方式');
define('TF_BG_BG2_REPEAT_DESC', '背景底圖2重複的方式');
define('TF_BG_BG2_POSITION', '背景底圖2位置');
define('TF_BG_BG2_POSITION_DESC', '背景底圖2起始的位置');
define('TF_BG_BG2_SIZE', '背景底圖2尺寸');
define('TF_BG_BG2_SIZE_DESC', '背景底圖2尺寸');
define('TF_BG_BG3', '背景底圖3');
define('TF_BG_BG3_DESC', '背景加上底圖3');
define('TF_BG_BG3_REPEAT', '背景底圖3重複方式');
define('TF_BG_BG3_REPEAT_DESC', '背景底圖2重複的方式');
define('TF_BG_BG3_POSITION', '背景底圖3位置');
define('TF_BG_BG3_POSITION_DESC', '背景底圖3起始的位置');
define('TF_BG_BG3_SIZE', '背景底圖3尺寸');
define('TF_BG_BG3_SIZE_DESC', '背景底圖3尺寸');

define('TF_BG_SIZE_NONE', '無');
define('TF_BG_SIZE_COVER', '放大圖片填滿畫面');
define('TF_BG_SIZE_CONTAIN', '縮放以呈現完整圖片');
define('TF_BG_SIZE_FULL', '滿版');

define('TF_NAV_BG_OPACITY', '導覽列透明度');
define('TF_NAV_BG_OPACITY_DESC', '請設定 0（透明）~1（不透明）之間的小數值');
define('TF_NAV_MARGIN', '導覽列上下間距設定');
define('TF_NAV_MARGIN_DESC', '可針對上右下左設定間距，如「15px」，不需間距的話空白即可');

define('TF_SLIDE_MT', '上方距離');
define('TF_SLIDE_MT_DESC', '滑動圖距離上方多少像素（px）');
define('TF_SLIDE_MB', '下方距離');
define('TF_SLIDE_MB_DESC', '下方距離下方多少像素（px）');

define('TF_NAV_SUB_BG_COLOR', '導覽列子選單底色');
define('TF_NAV_SUB_BG_COLOR_DESC', '導覽列子選單的背景色');
define('TF_NAV_SUB_FONT_COLOR', '導覽列子選單文字顏色');
define('TF_NAV_SUB_FONT_COLOR_DESC', '導覽列子選單的文字顏色');

define('TF_SHADOW', '陰影方向');
define('TF_SHADOW_DESC', '有勾選的方向才會出現陰影');
define('TF_PAGE_SHADOW_DESC', '（當所有區域的「顯示模式」值均為「內容底色皆置中」陰影才會生效）');
define('TF_TOP', '上');
define('TF_RIGHT', '右');
define('TF_BOTTOM', '下');
define('TF_LEFT', '左');

define('TF_BORDER_RADIUS', '圓角設定');
define('TF_BORDER_RADIUS_DESC', '可針對四個角設定圓角，如「8px 8px 0px 0px」，僅「' . TF_DISPLAY_TYPE_NOT_FULL . '」時有作用');

define('TF_LOGO_FULL', 'logo 是否自動滿版');
define('TF_LOGO_FULL_DESC', '會將 logo 寬度自動設為 100%');

define('TF_NAV_LINE', '選項分格線');
define('TF_NAV_LINE_DESC', '選項是否加上分格線');

define('TF_SLIDE_KIND', '滑動圖套件');
define('TF_SLIDE_KIND_DESC', '可選用不同滑動圖套件');
define('TF_SLIDE_KIND1', '自適應滑動圖（不限數量、不限高度）');
define('TF_SLIDE_KIND2', 'CarouSlide滑動圖（限五張圖，需有描述，高度 300）');
define('TF_SLIDE_KIND3', 'templatemo_slider 滑動圖');

define('TF_LOGO_TEXT', '是否使用文字取代 logo 圖片');
define('TF_LOGO_TEXT_DESC', '是否使用網站名稱取代 logo 圖');

define('TF_PADDING_MARGIN', '元件內外距設定');
define('TF_PADDING_MARGIN_DESC', '上下是指離上下方元件距離（不含底色），內距則是內容離元件邊界的距離（含底色）');
define('TF_PADDING', '元件內距設定');
define('TF_PADDING_DESC', '內距則是內容離元件邊界的距離（含底色）');

define('TF_DISPLAY_TYPE', '本區域顯示模式');
define('TF_DISPLAY_TYPE_DESC', '以何種方式來呈現本區域');

define('TF_BG_IMG', '背景圖');
define('TF_BG_IMG_DESC', '背景圖相關設定項目');

define('TF_COLOR', '文字顏色');
define('TF_COLOR_DESC', '內容的文字顏色');
define('TF_HEIGHT', '最低高度');
define('TF_HEIGHT_DESC', '沒內容時可設定最低呈現高度（空值就是不使用本區域）');

define('TF_ZINDEX', '上下層順序');
define('TF_ZINDEX_DESC', '設定此區域的上下層排序');
define('TF_PIN', '是否釘選此區域');
define('TF_PIN_DESC', '選是的話，當該區域到頂端時會固定住（若偏好設定有設定「導覽列的釘住」或導覽列設為「上方鎖定」則會找出導覽列位置優先釘選，並忽略此值）');

define('TF_CONTENT_BGCOLOR', '中間底色');
define('TF_CONTENT_BGCOLOR_DESC', '中間有放內容的區域之底色（若有底圖，此處請設成透明）');

define('TF_SIDE_BGCOLOR', '兩側底色');
define('TF_SIDE_BGCOLOR_DESC', '無內容（兩側）部份的底色');
define('TF_STYLE', '自訂樣式設定');
define('TF_STYLE_DESC', '可使用CSS語法自行定義本區域外觀');

define('TF_TOP_LEFT', '頂部左側');
define('TF_TOP_CENTER', '頂部中間');
define('TF_TOP_RIGHT', '頂部右側');
define('TF_MIDDLE_LEFT', '中間左側');
define('TF_MIDDLE_CENTER', '中間中間');
define('TF_MIDDLE_RIGHT', '中間右側');
define('TF_BOTTOM_LEFT', '底部左側');
define('TF_BOTTOM_CENTER', '底部中間');
define('TF_BOTTOM_RIGHT', '底部右側');

define('TF_SELECT_CONTENT', '選擇欲出現的內容<ol style="list-style-type: decimal;"><li>可多選，但「自訂內容」、「連結選項」、「Font Awesome 圖示連結」不能同時選</li><li>區塊無須啟用</li><li>可用進階區塊模組來<a href="<{$xoops_url}>/modules/tad_blocks/index.php?op=block_form">產生自訂內容</a></li></ol>');
define('TF_CONTENT', '自訂內容');
define('TF_CONTENT_DESC', '可以加入任何內容（html）<ol style="list-style-type: decimal;"><li>「自訂內容」、「連結選項」、「Font Awesome 圖示連結」的內容填至此處</li><li>「自訂內容」支援HTML語法</li><li>「連結選項」一個選項一行：「文字|連結|背景色|文字色|新視窗」，如：<code>最新消息|/modules/tadnews/|#f5c9c9|#ffffff|_blank</code></li><li>「Font Awesome 圖示連結」一個圖示一行：「連結|圖示|深淺|新視窗」，如：<code>https://www.facebook.com|fa-facebook|dark|_blank</code></li></ol>');
define('TF_NONE', '無');
define('TF_SEARCH', '搜尋框');
define('TF_LOGIN', '登入框');
define('TF_NAVBAR', '導覽列');
define('TF_MENU', '連結選項');
define('TF_FA_ICON', 'Font Awesome 圖示連結');
define('TF_HTML', '自訂內容');
define('TF_BLOCK', '置入區塊：');
define('TF_GOOGLE_TRANSLATE', 'Google 翻譯');
define('TF_3COLS', '設定左中右的呈現欄寬');
define('TF_3COLS_DESC', '填入三個數字，以-隔開，勿有空白，總和需為 12，如：4-4-4 或 3-6-3');

define('TF_LOGO_RIGHT', 'Logo 右側');
define('TF_LOGO_RIGHT_DESC', '<ol style="list-style-type: decimal;"><li>僅於「logo圖位置」值為「置於頁面上」時有效，可多選</li><li>「自訂內容」及「連結選項」不可同時勾選</li></ol>');
define('TF_LOGO_COLS', '設定 Logo 左右的呈現欄寬');
define('TF_LOGO_COLS_DESC', '僅「置於頁面上」有效，填入兩個數字，以-隔開，總和需為 12，如：6-6 或 4-8（空白即關閉整個 logo 區域）');

define('TF_TOP_ZONE', '頂部自訂區');
define('TF_LOGO_ZONE', 'Logo區域');
define('TF_NAV_ZONE', '導覽列區域');
define('TF_SLIDE_ZONE', '滑動圖區域');
define('TF_MIDDEL_ZONE', '中間自訂區');

define('TF_NAV_NO_MOUSE_OVER', '是否點擊才出現子選單');
define('TF_NAV_NO_MOUSE_OVER_DESC', '預設為滑鼠停留就出現，選是就必須點擊才會出現');
