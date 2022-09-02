<?php
require XOOPS_ROOT_PATH . '/themes/school2022/bg_config.php';
$i = 0;

//整體頁面顯示寬度
$i++;
$theme_config[$i]['name'] = "container_width";
$theme_config[$i]['text'] = TF_USE_CONTAINER_WIDTH;
$theme_config[$i]['desc'] = TF_USE_CONTAINER_WIDTH_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "70%";

//整體頁面是否套用陰影
$i++;
$theme_config[$i]['name'] = "page_shadow";
$theme_config[$i]['text'] = TF_SHADOW;
$theme_config[$i]['desc'] = TF_SHADOW_DESC . TF_PAGE_SHADOW_DESC;
$theme_config[$i]['type'] = "checkbox";
$theme_config[$i]['options'] = ['t' => TF_TOP, 'b' => TF_BOTTOM, 'l' => TF_LEFT, 'r' => TF_RIGHT];
$theme_config[$i]['default'] = [];

//底圖
$i++;
$theme_config[$i]['name'] = "page_img";
$theme_config[$i]['text'] = TF_BG_IMG;
$theme_config[$i]['desc'] = TF_BG_IMG_DESC;
$theme_config[$i]['type'] = "bg_file";
$theme_config[$i]['default'] = "";
$theme_config[$i]['options'] = $bg_file;
$theme_config[$i]['repeat'] = "repeat";
$theme_config[$i]['position'] = "left top";
$theme_config[$i]['size'] = "auto";

//整體頁面CSS樣式設定
$i++;
$theme_config[$i]['name'] = "page_style";
$theme_config[$i]['text'] = TF_STYLE;
$theme_config[$i]['desc'] = TF_STYLE_DESC;
$theme_config[$i]['type'] = "textarea";
$theme_config[$i]['default'] = "padding: 10px;";

//字型設定
$i++;
$theme_config[$i]['name'] = "font_family";
$theme_config[$i]['text'] = TF_FONT_FAMILY;
$theme_config[$i]['desc'] = TF_FONT_FAMILY_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "";
