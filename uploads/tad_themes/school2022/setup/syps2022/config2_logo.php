<?php
require XOOPS_ROOT_PATH . '/themes/school2022/bg_config.php';
$i = 0;

$i++;
$theme_config[$i]['name'] = "logo_display_type";
$theme_config[$i]['text'] = TF_DISPLAY_TYPE;
$theme_config[$i]['desc'] = TF_DISPLAY_TYPE_DESC;
$theme_config[$i]['type'] = "selectpicker";
$theme_config[$i]['options'] = ['not_full' => TF_DISPLAY_TYPE_NOT_FULL, 'bg_full' => TF_DISPLAY_TYPE_BG_FULL, 'all_full' => TF_DISPLAY_TYPE_ALL_FULL];
$theme_config[$i]['images'] = ['not_full' => XOOPS_URL . '/modules/tad_themes/images/dt_not_full.png', 'bg_full' => XOOPS_URL . '/modules/tad_themes/images/dt_bg_full.png', 'all_full' => XOOPS_URL . '/modules/tad_themes/images/dt_all_full.png'];
$theme_config[$i]['default'] = "not_full";

$i++;
$theme_config[$i]['name'] = "logo_content_bgcolor";
$theme_config[$i]['text'] = TF_CONTENT_BGCOLOR;
$theme_config[$i]['desc'] = TF_CONTENT_BGCOLOR_DESC;
$theme_config[$i]['type'] = "color";
$theme_config[$i]['default'] = "transparent";

$i++;
$theme_config[$i]['name'] = "logo_side_bgcolor";
$theme_config[$i]['text'] = TF_SIDE_BGCOLOR;
$theme_config[$i]['desc'] = TF_SIDE_BGCOLOR_DESC;
$theme_config[$i]['type'] = "color";
$theme_config[$i]['default'] = "transparent";

$i++;
$theme_config[$i]['name'] = "logo_shadow";
$theme_config[$i]['text'] = TF_SHADOW;
$theme_config[$i]['desc'] = TF_SHADOW_DESC;
$theme_config[$i]['type'] = "checkbox";
$theme_config[$i]['options'] = ['t' => TF_TOP, 'b' => TF_BOTTOM, 'l' => TF_LEFT, 'r' => TF_RIGHT];
$theme_config[$i]['default'] = [];

$i++;
$theme_config[$i]['name'] = "logo_padding";
$theme_config[$i]['text'] = TF_PADDING_MARGIN;
$theme_config[$i]['desc'] = TF_PADDING_MARGIN_DESC;
$theme_config[$i]['type'] = "padding_margin";
$theme_config[$i]['default'] = "0px";
$theme_config[$i]['mt'] = "0px";
$theme_config[$i]['mb'] = "0px";

$i++;
$theme_config[$i]['name'] = "logo_zindex";
$theme_config[$i]['text'] = TF_ZINDEX;
$theme_config[$i]['desc'] = TF_ZINDEX_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "50";

$i++;
$theme_config[$i]['name'] = "logo_border_radius";
$theme_config[$i]['text'] = TF_BORDER_RADIUS;
$theme_config[$i]['desc'] = TF_BORDER_RADIUS_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "";

$i++;
$theme_config[$i]['name'] = "logo_style";
$theme_config[$i]['text'] = TF_STYLE;
$theme_config[$i]['desc'] = TF_STYLE_DESC;
$theme_config[$i]['type'] = "textarea";
$theme_config[$i]['default'] = "";

$i++;
$theme_config[$i]['name'] = "logo_bg";
$theme_config[$i]['text'] = TF_LOGO_BG1;
$theme_config[$i]['desc'] = TF_LOGO_BG1_DESC;
$theme_config[$i]['type'] = "bg_file";
$theme_config[$i]['default'] = "";
$theme_config[$i]['options'] = $bg_file;
$theme_config[$i]['repeat'] = "repeat";
$theme_config[$i]['position'] = "left top";
$theme_config[$i]['size'] = "auto";

$i++;
$theme_config[$i]['name'] = "logo_bg2";
$theme_config[$i]['text'] = TF_LOGO_BG2;
$theme_config[$i]['desc'] = TF_LOGO_BG2_DESC;
$theme_config[$i]['type'] = "bg_file";
$theme_config[$i]['default'] = "";
$theme_config[$i]['options'] = $bg_file;
$theme_config[$i]['repeat'] = "repeat";
$theme_config[$i]['position'] = "left top";
$theme_config[$i]['size'] = "auto";

$i++;
$theme_config[$i]['name'] = "logo_auto";
$theme_config[$i]['text'] = TF_LOGO_AUTO;
$theme_config[$i]['desc'] = TF_LOGO_AUTO_DESC;
$theme_config[$i]['type'] = "yesno";
$theme_config[$i]['default'] = "0";

$i++;
$theme_config[$i]['name'] = "logo_path";
$theme_config[$i]['text'] = TF_LOGO_PATH;
$theme_config[$i]['desc'] = TF_LOGO_PATH_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "/uploads/logos/";

$i++;
$theme_config[$i]['name'] = "logo_var";
$theme_config[$i]['text'] = TF_LOGO_VAR;
$theme_config[$i]['desc'] = TF_LOGO_VAR_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "";

$i++;
$theme_config[$i]['name'] = "logo_ext";
$theme_config[$i]['text'] = TF_LOGO_EXT;
$theme_config[$i]['desc'] = TF_LOGO_EXT_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "png";

$i++;
$theme_config[$i]['name'] = "logo_align";
$theme_config[$i]['text'] = TF_LOGO_ALIGN;
$theme_config[$i]['desc'] = TF_LOGO_ALIGN_DESC;
$theme_config[$i]['type'] = "radio";
$theme_config[$i]['options'] = ['' => TF_NONE, 'justify-content-start' => TF_LOGO_ALIGN_L, 'justify-content-center' => TF_LOGO_ALIGN_C, 'justify-content-end' => TF_LOGO_ALIGN_R];
$theme_config[$i]['default'] = "";

$i++;
$theme_config[$i]['name'] = "logo_full";
$theme_config[$i]['text'] = TF_LOGO_FULL;
$theme_config[$i]['desc'] = TF_LOGO_FULL_DESC;
$theme_config[$i]['type'] = "yesno";
$theme_config[$i]['default'] = "0";

$i++;
$theme_config[$i]['name'] = "logo_text";
$theme_config[$i]['text'] = TF_LOGO_TEXT;
$theme_config[$i]['desc'] = TF_LOGO_TEXT_DESC;
$theme_config[$i]['type'] = "yesno";
$theme_config[$i]['default'] = "0";

$i++;
$theme_config[$i]['name'] = "logo_cols";
$theme_config[$i]['text'] = TF_LOGO_COLS;
$theme_config[$i]['desc'] = TF_LOGO_COLS_DESC;
$theme_config[$i]['type'] = "text";
$theme_config[$i]['default'] = "12-0";

$i++;
$theme_config[$i]['name'] = "logo_right";
$theme_config[$i]['text'] = TF_LOGO_RIGHT;
$theme_config[$i]['desc'] = TF_LOGO_RIGHT_DESC;
$theme_config[$i]['type'] = "checkbox";
$theme_config[$i]['options'] = ['html' => TF_HTML, 'fa-icon' => TF_FA_ICON, 'block' => TF_BLOCK, 'google_translate' => TF_GOOGLE_TRANSLATE, 'menu' => TF_MENU, 'search' => TF_SEARCH, 'login' => TF_LOGIN, 'navbar' => TF_NAVBAR];
$theme_config[$i]['default'] = ["html"];
$theme_config[$i]['bid_name'] = "";

$i++;
$theme_config[$i]['name'] = "logo_right_content";
$theme_config[$i]['text'] = TF_LOGO_RIGHT . TF_CONTENT;
$theme_config[$i]['desc'] = TF_LOGO_RIGHT . TF_CONTENT_DESC;
$theme_config[$i]['type'] = "textarea";
$theme_config[$i]['default'] = "";
