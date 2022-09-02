<?php
xoops_loadLanguage('admin_common', 'tadtools');

//tad_sitemap-edit
define('_MA_TADSITEMAP_MID', 'Module ID');
define('_MA_TADSITEMAP_NAME', 'Name');
define('_MA_TADSITEMAP_URL', 'URL');
define('_MA_TADSITEMAP_DESCRIPTION', 'Description');
define('_MA_TADSITEMAP_LAST_UPDATE', 'Last Update');
define('_MA_TADSITEMAP_SORT', 'Weight');
define('_MA_TADSITEMAP_INPUT_DESC', 'Please input the description');
define('_MA_TADSITEMAP_AUTO_IMPORT', 'Auto Detect Site Map');
define('_MA_TADSITEMAP_HOMEPAGE', 'Homepage');
define('_MA_TADSITEMAP_CLEAN', 'Empty items will not be displayed');

define('_MA_TADSITEMAP_XOOPS_CSS', 'xoops.css has %s places that have not been fixed. If there is no <a href="https://schoolweb.tn.edu.tw/~matrix/xoops.css" target="_blank"> Please download it manually or right click Save xoops.css </a> and overwrite %s');

define('_MA_TADSITEMAP_TEXTSANITIZER_PATH', 'Open <code>%s</code> and search for "<code>$text = $this->makeClickable($text);</code>" (in three places) and change the line to: "<code>$text = XoopsModules\Tadtools\Utility:: linkify($text);</code>" and then save the upload and overwrite');

define('_MA_TADSITEMAP_PROFILE', 'Please go to <a href="' . XOOPS_URL . '/modules/system/admin.php?fct=preferences&op=show&confcat_id=2" target="_blank">your preferences</a> and set "Allow New Member Registration" to "No", because the registration form does not comply with Accessibility 2.0, and it is easy to generate spam accounts.');

define('_MA_TADSITEMAP_NAV_LINK', 'The navigation bar does not have a "Site Map" link. <a href="check.php?op=add2nav"> You can click here to automatically add it </a>');
define('_MA_TADSITEMAP_LINK_ENABLE', 'The navigation bar has a "Site Map" link, but it is not enabled, <a href="check.php?op=enable4nav&menuid=%s"> Click here to enable it automatically </a>');

define('_MA_TADSITEMAP_DB_FIX', 'Click the following button to correct the original database content.');

define('_MA_TADSITEMAP_VIEW_FIX', 'Automatic correction after preview');
define('_MA_TADSITEMAP_VIEW_FIX_AGAIN', 'Preview Correction Again');
define('_MA_TADSITEMAP_AUTO_FIX', 'Direct automatic correction');

define('_MA_TADSITEMAP_DL_FREEGO', '<a href="https://accessibility.ncc.gov.tw/Download/Detail/1743?Category=70" target="_blank"> Download FreeGo 110.07</a> and detect "' . XOOPS_URL . '" with the AA standard');
define('_MA_TADSITEMAP_STATEMENT', 'This program only helps to pass the machine check when not logged in to the website. It cannot guarantee that the manual check can pass.');

define('_MA_TADSITEMAP_TABLE_COL', 'Column');
define('_MA_TADSITEMAP_NEED_FIX', 'Field (%s) needs to be modified:');
define('_MA_TADSITEMAP_FIX_NOW', 'Fix now');
define('_MA_TADSITEMAP_THATS_ALL', 'All the correction programs can be done, please correct the rest.');
define('_MA_TADSITEMAP_FIX_THEME_FS', 'Changed %s\'s default font size unit of the layout from %s to %s');
define('_MA_TADSITEMAP_COMMENT_CLOSED', 'Turned off %s commenting to comply with accessibility standards and to avoid spamming');
define('_MA_TADSITEMAP_FACEBOOK_CLOSED', 'Turned off %s facebook message box to comply with accessibility standards');
define('_MA_TADSITEMAP_TAD_WEB_SCHEDULE_FIX', 'Complete revision of tad_web schedule templates to meet accessibility standards');
define('_MA_TADSITEMAP_TAD_WEB_FB_CLOSED', 'Turned off the Facebook message box in the "%s" feature of "%s" to comply with accessibility standards');
