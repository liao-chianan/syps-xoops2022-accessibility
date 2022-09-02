<?php
require XOOPS_ROOT_PATH . '/themes/school2022/bg_config.php';
$i = 0;

//中間自訂內容顯示模式
$i++;
$theme_config[$i]['name'] = "middle_display_type";
$theme_config[$i]['text'] = TF_DISPLAY_TYPE;
$theme_config[$i]['desc'] = TF_DISPLAY_TYPE_DESC;
$theme_config[$i]['type'] = "selectpicker";
$theme_config[$i]['options'] = ['not_full' => TF_DISPLAY_TYPE_NOT_FULL, 'bg_full' => TF_DISPLAY_TYPE_BG_FULL, 'all_full' => TF_DISPLAY_TYPE_ALL_FULL];
$theme_config[$i]['images'] = ['not_full' => XOOPS_URL . '/modules/tad_themes/images/dt_not_full.png', 'bg_full' => XOOPS_URL . '/modules/tad_themes/images/dt_bg_full.png', 'all_full' => XOOPS_URL . '/modules/tad_themes/images/dt_all_full.png'];
$theme_config[$i]['default'] = "bg_full";

//中間自訂內容是否套用陰影
$i++;
$theme_config[$i]['name'] = "middle_shadow";
$theme_config[$i]['text'] = TF_SHADOW;
$theme_config[$i]['desc'] = TF_SHADOW_DESC;
$theme_config[$i]['type'] = "checkbox";
$theme_config[$i]['options'] = ['t' => TF_TOP, 'b' => TF_BOTTOM, 'l' => TF_LEFT, 'r' => TF_RIGHT];
$theme_config[$i]['default'] = [];

//內部距離設定
$i++;
$theme_config[$i]['name'] = "middle_padding";
$theme_config[$i]['text'] = TF_PADDING_MARGIN;
$theme_config[$i]['desc'] = TF_PADDING_MARGIN_DESC;
$theme_config[$i]['type'] = "padding_margin";
$theme_config[$i]['default'] = "10px";
$theme_config[$i]['mt'] = "0px";
$theme_config[$i]['mb'] = "0px";

//z-index
$i++;
$theme_config[$i]['name'] = "middle_zindex";
$theme_config[$i]['text'] = TF_ZINDEX;
$theme_config[$i]['desc'] = TF_ZINDEX_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "0";

//圓角
$i++;
$theme_config[$i]['name'] = "middle_border_radius";
$theme_config[$i]['text'] = TF_BORDER_RADIUS;
$theme_config[$i]['desc'] = TF_BORDER_RADIUS_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "0px";

//中間底色
$i++;
$theme_config[$i]['name'] = "middle_content_bgcolor";
$theme_config[$i]['text'] = TF_CONTENT_BGCOLOR;
$theme_config[$i]['desc'] = TF_CONTENT_BGCOLOR_DESC;
$theme_config[$i]['type'] = "color";
$theme_config[$i]['default'] = "transparent";

//兩側底色
$i++;
$theme_config[$i]['name'] = "middle_side_bgcolor";
$theme_config[$i]['text'] = TF_SIDE_BGCOLOR;
$theme_config[$i]['desc'] = TF_SIDE_BGCOLOR_DESC;
$theme_config[$i]['type'] = "color";
$theme_config[$i]['default'] = "transparent";

//中間底圖
$i++;
$theme_config[$i]['name'] = "middle_img";
$theme_config[$i]['text'] = TF_BG_IMG;
$theme_config[$i]['desc'] = TF_BG_IMG_DESC;
$theme_config[$i]['type'] = "bg_file";
$theme_config[$i]['default'] = "";
$theme_config[$i]['options'] = $bg_file;
$theme_config[$i]['repeat'] = "repeat";
$theme_config[$i]['position'] = "left top";
$theme_config[$i]['size'] = "auto";

//中間高度
$i++;
$theme_config[$i]['name'] = "middle_height";
$theme_config[$i]['text'] = TF_HEIGHT;
$theme_config[$i]['desc'] = TF_HEIGHT_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "";

//中間文字顏色
$i++;
$theme_config[$i]['name'] = "middle_color";
$theme_config[$i]['text'] = TF_COLOR;
$theme_config[$i]['desc'] = TF_COLOR_DESC;
$theme_config[$i]['type'] = "color";
$theme_config[$i]['default'] = "";

//中間自訂內容CSS樣式設定
$i++;
$theme_config[$i]['name'] = "middle_style";
$theme_config[$i]['text'] = TF_STYLE;
$theme_config[$i]['desc'] = TF_STYLE_DESC;
$theme_config[$i]['type'] = "textarea";
$theme_config[$i]['default'] = "";

//左中右的寬度
$i++;
$theme_config[$i]['name'] = "middle_cols";
$theme_config[$i]['text'] = TF_3COLS;
$theme_config[$i]['desc'] = TF_3COLS_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "4-4-4";

// 左側內容
$i++;
$theme_config[$i]['name'] = "middle_left";
$theme_config[$i]['text'] = TF_MIDDLE_LEFT;
$theme_config[$i]['desc'] = TF_MIDDLE_LEFT . TF_SELECT_CONTENT;
$theme_config[$i]['type'] = "checkbox";
$theme_config[$i]['options'] = ['html' => TF_HTML, 'fa-icon' => TF_FA_ICON, 'block' => TF_BLOCK, 'google_translate' => TF_GOOGLE_TRANSLATE, 'menu' => TF_MENU, 'search' => TF_SEARCH, 'login' => TF_LOGIN, 'navbar' => TF_NAVBAR];
$theme_config[$i]['default'] = [];
$theme_config[$i]['bid_name'] = '';

//左側自訂內容
$i++;
$theme_config[$i]['name'] = "middle_left_content";
$theme_config[$i]['text'] = TF_MIDDLE_LEFT . TF_CONTENT;
$theme_config[$i]['desc'] = TF_MIDDLE_LEFT . TF_CONTENT_DESC;
$theme_config[$i]['type'] = "textarea";
$theme_config[$i]['default'] = "";

// 中間內容
$i++;
$theme_config[$i]['name'] = "middle_center";
$theme_config[$i]['text'] = TF_MIDDLE_CENTER;
$theme_config[$i]['desc'] = TF_MIDDLE_CENTER . TF_SELECT_CONTENT;
$theme_config[$i]['type'] = "checkbox";
$theme_config[$i]['options'] = ['html' => TF_HTML, 'fa-icon' => TF_FA_ICON, 'block' => TF_BLOCK, 'google_translate' => TF_GOOGLE_TRANSLATE, 'menu' => TF_MENU, 'search' => TF_SEARCH, 'login' => TF_LOGIN, 'navbar' => TF_NAVBAR];
$theme_config[$i]['default'] = [];
$theme_config[$i]['bid_name'] = '';

//中間自訂內容
$i++;
$theme_config[$i]['name'] = "middle_center_content";
$theme_config[$i]['text'] = TF_MIDDLE_CENTER . TF_CONTENT;
$theme_config[$i]['desc'] = TF_MIDDLE_CENTER . TF_CONTENT_DESC;
$theme_config[$i]['type'] = "textarea";
$theme_config[$i]['default'] = "";

// 右側內容
$i++;
$theme_config[$i]['name'] = "middle_right";
$theme_config[$i]['text'] = TF_MIDDLE_RIGHT;
$theme_config[$i]['desc'] = TF_MIDDLE_RIGHT . TF_SELECT_CONTENT;
$theme_config[$i]['type'] = "checkbox";
$theme_config[$i]['options'] = ['html' => TF_HTML, 'fa-icon' => TF_FA_ICON, 'block' => TF_BLOCK, 'google_translate' => TF_GOOGLE_TRANSLATE, 'menu' => TF_MENU, 'search' => TF_SEARCH, 'login' => TF_LOGIN, 'navbar' => TF_NAVBAR];
$theme_config[$i]['default'] = [];
$theme_config[$i]['bid_name'] = '';

//右側自訂內容
$i++;
$theme_config[$i]['name'] = "middle_right_content";
$theme_config[$i]['text'] = TF_MIDDLE_RIGHT . TF_CONTENT;
$theme_config[$i]['desc'] = TF_MIDDLE_RIGHT . TF_CONTENT_DESC;
$theme_config[$i]['type'] = "textarea";
$theme_config[$i]['default'] = "";
