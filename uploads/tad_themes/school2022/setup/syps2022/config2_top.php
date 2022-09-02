<?php
require XOOPS_ROOT_PATH . '/themes/school2022/bg_config.php';
$i = 0;

$i++;
$theme_config[$i]['name'] = "top_display_type";
$theme_config[$i]['text'] = TF_DISPLAY_TYPE;
$theme_config[$i]['desc'] = TF_DISPLAY_TYPE_DESC;
$theme_config[$i]['type'] = "selectpicker";
$theme_config[$i]['options'] = ['not_full' => TF_DISPLAY_TYPE_NOT_FULL, 'bg_full' => TF_DISPLAY_TYPE_BG_FULL, 'all_full' => TF_DISPLAY_TYPE_ALL_FULL];
$theme_config[$i]['images'] = ['not_full' => XOOPS_URL . '/modules/tad_themes/images/dt_not_full.png', 'bg_full' => XOOPS_URL . '/modules/tad_themes/images/dt_bg_full.png', 'all_full' => XOOPS_URL . '/modules/tad_themes/images/dt_all_full.png'];
$theme_config[$i]['default'] = "bg_full";

$i++;
$theme_config[$i]['name'] = "top_shadow";
$theme_config[$i]['text'] = TF_SHADOW;
$theme_config[$i]['desc'] = TF_SHADOW_DESC;
$theme_config[$i]['type'] = "checkbox";
$theme_config[$i]['options'] = ['t' => TF_TOP, 'b' => TF_BOTTOM, 'l' => TF_LEFT, 'r' => TF_RIGHT];
$theme_config[$i]['default'] = [];

$i++;
$theme_config[$i]['name'] = "top_padding";
$theme_config[$i]['text'] = TF_PADDING_MARGIN;
$theme_config[$i]['desc'] = TF_PADDING_MARGIN_DESC;
$theme_config[$i]['type'] = "padding_margin";
$theme_config[$i]['default'] = "6px 0px";
$theme_config[$i]['mt'] = "0px";
$theme_config[$i]['mb'] = "0px";

$i++;
$theme_config[$i]['name'] = "top_zindex";
$theme_config[$i]['text'] = TF_ZINDEX;
$theme_config[$i]['desc'] = TF_ZINDEX_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "11";

$i++;
$theme_config[$i]['name'] = "top_border_radius";
$theme_config[$i]['text'] = TF_BORDER_RADIUS;
$theme_config[$i]['desc'] = TF_BORDER_RADIUS_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "0px";

$i++;
$theme_config[$i]['name'] = "top_content_bgcolor";
$theme_config[$i]['text'] = TF_CONTENT_BGCOLOR;
$theme_config[$i]['desc'] = TF_CONTENT_BGCOLOR_DESC;
$theme_config[$i]['type'] = "color";
$theme_config[$i]['default'] = "#80d3d6";

$i++;
$theme_config[$i]['name'] = "top_side_bgcolor";
$theme_config[$i]['text'] = TF_SIDE_BGCOLOR;
$theme_config[$i]['desc'] = TF_SIDE_BGCOLOR_DESC;
$theme_config[$i]['type'] = "color";
$theme_config[$i]['default'] = "#80d3d6";

$i++;
$theme_config[$i]['name'] = "top_img";
$theme_config[$i]['text'] = TF_BG_IMG;
$theme_config[$i]['desc'] = TF_BG_IMG_DESC;
$theme_config[$i]['type'] = "bg_file";
$theme_config[$i]['default'] = "";
$theme_config[$i]['options'] = $bg_file;
$theme_config[$i]['repeat'] = "no-repeat";
$theme_config[$i]['position'] = "left top";
$theme_config[$i]['size'] = "contain";

$i++;
$theme_config[$i]['name'] = "top_height";
$theme_config[$i]['text'] = TF_HEIGHT;
$theme_config[$i]['desc'] = TF_HEIGHT_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "50px";

$i++;
$theme_config[$i]['name'] = "top_color";
$theme_config[$i]['text'] = TF_COLOR;
$theme_config[$i]['desc'] = TF_COLOR_DESC;
$theme_config[$i]['type'] = "color";
$theme_config[$i]['default'] = "";

$i++;
$theme_config[$i]['name'] = "top_style";
$theme_config[$i]['text'] = TF_STYLE;
$theme_config[$i]['desc'] = TF_STYLE_DESC;
$theme_config[$i]['type'] = "textarea";
$theme_config[$i]['default'] = "";

$i++;
$theme_config[$i]['name'] = "top_cols";
$theme_config[$i]['text'] = TF_3COLS;
$theme_config[$i]['desc'] = TF_3COLS_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "12-0-0";

$i++;
$theme_config[$i]['name'] = "top_left";
$theme_config[$i]['text'] = TF_TOP_LEFT;
$theme_config[$i]['desc'] = TF_TOP_LEFT . TF_SELECT_CONTENT;
$theme_config[$i]['type'] = "checkbox";
$theme_config[$i]['options'] = ['html' => TF_HTML, 'fa-icon' => TF_FA_ICON, 'block' => TF_BLOCK, 'google_translate' => TF_GOOGLE_TRANSLATE, 'menu' => TF_MENU, 'search' => TF_SEARCH, 'login' => TF_LOGIN, 'navbar' => TF_NAVBAR];
$theme_config[$i]['default'] = ["html","navbar"];
$theme_config[$i]['bid_name'] = "";

$i++;
$theme_config[$i]['name'] = "top_left_content";
$theme_config[$i]['text'] = TF_TOP_LEFT . TF_CONTENT;
$theme_config[$i]['desc'] = TF_TOP_LEFT . TF_CONTENT_DESC;
$theme_config[$i]['type'] = "textarea";
$theme_config[$i]['default'] = "<a href=\"#xoops_theme_center\" id=\"gotocenter\" class=\"gotocenter\" title=\"移到主要內容\" >跳到主要內容</a>
<noscript>
您目前的瀏覽器不支援JavaScript! 請參考<a href=\"/nojs-nav.php\">[替代頁面]</a>取得完整資訊!
<br></noscript>
<h1>
<a href=\".\" title=\"臺北市萬華區雙園國小\"><img src=\"http://www2.syps.tp.edu.tw/uploads/tad_themes/school2022/logo/logo_9_3_GgF.png\" alt=\"臺北市萬華區雙園國民小學\" title=\"臺北市萬華區雙園國民小學\" width=\"50\" height=\"50\"></a>

<span style=\"text-align: left;color: #444444; text-shadow: #fefefe 0.1em 0.1em 0.1em;vertical-align: middle;padding-top: 1px;font-size:2rem\">臺北市萬華區雙園國小</span>

<span style=\"text-align: left;color: #444444; text-shadow: #fefefe 0.1em 0.1em 0.1em;vertical-align: middle;padding-top: 1px;font-size:1.1rem\">Shuang Yuan Primary School</span></h1>";

$i++;
$theme_config[$i]['name'] = "top_center";
$theme_config[$i]['text'] = TF_TOP_CENTER;
$theme_config[$i]['desc'] = TF_TOP_CENTER . TF_SELECT_CONTENT;
$theme_config[$i]['type'] = "checkbox";
$theme_config[$i]['options'] = ['html' => TF_HTML, 'fa-icon' => TF_FA_ICON, 'block' => TF_BLOCK, 'google_translate' => TF_GOOGLE_TRANSLATE, 'menu' => TF_MENU, 'search' => TF_SEARCH, 'login' => TF_LOGIN, 'navbar' => TF_NAVBAR];
$theme_config[$i]['default'] = [];
$theme_config[$i]['bid_name'] = "";

$i++;
$theme_config[$i]['name'] = "top_center_content";
$theme_config[$i]['text'] = TF_TOP_CENTER . TF_CONTENT;
$theme_config[$i]['desc'] = TF_TOP_CENTER . TF_CONTENT_DESC;
$theme_config[$i]['type'] = "textarea";
$theme_config[$i]['default'] = "";

$i++;
$theme_config[$i]['name'] = "top_right";
$theme_config[$i]['text'] = TF_TOP_RIGHT;
$theme_config[$i]['desc'] = TF_TOP_RIGHT . TF_SELECT_CONTENT;
$theme_config[$i]['type'] = "checkbox";
$theme_config[$i]['options'] = ['html' => TF_HTML, 'fa-icon' => TF_FA_ICON, 'block' => TF_BLOCK, 'google_translate' => TF_GOOGLE_TRANSLATE, 'menu' => TF_MENU, 'search' => TF_SEARCH, 'login' => TF_LOGIN, 'navbar' => TF_NAVBAR];
$theme_config[$i]['default'] = ["html"];
$theme_config[$i]['bid_name'] = "";

$i++;
$theme_config[$i]['name'] = "top_right_content";
$theme_config[$i]['text'] = TF_TOP_RIGHT . TF_CONTENT;
$theme_config[$i]['desc'] = TF_TOP_RIGHT . TF_CONTENT_DESC;
$theme_config[$i]['type'] = "textarea";
$theme_config[$i]['default'] = "";
