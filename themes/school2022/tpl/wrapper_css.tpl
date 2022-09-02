#page-wrapper,
#top-wrapper,#top-display,
#logo-wrapper,#logo-display,
#nav-wrapper,#nav-display,
#slide-wrapper,#slide-display,
#base-wrapper,#base-display,
#footer-wrapper,#footer-display,
#bottom-wrapper,#bottom-display
{
    max-width: 100%;
}

<{* 頁面 *}>
<{assign var="item" value='page'}>
<{assign var="side_bgcolor" value=$base_color}>
<{assign var="content_bgcolor" value=null}>
<{assign var="bg_img" value=$page_img}>
<{assign var="bg_repeat" value=$page_img_repeat}>
<{assign var="bg_position" value=$page_img_position}>
<{assign var="bg_size" value=$page_img_size}>
<{assign var="padding" value=null}>
<{assign var="mt" value="`$margin_top`px"}>
<{assign var="mb" value="`$margin_bottom`px"}>
<{assign var="height" value=null}>
<{assign var="color" value=null}>
<{assign var="style" value=$page_style}>
<{assign var="zindex" value=null}>
<{assign var="shadow_arr" value=$page_shadow}>
<{assign var="display_type" value=null}>
<{assign var="border_radius" value=null}>
<{includeq file="$xoops_rootpath/themes/school2022/tpl/wrapper_display.tpl"}>


<{* 頂部 *}>
<{assign var="item" value='top'}>
<{assign var="side_bgcolor" value=$top_side_bgcolor}>
<{assign var="content_bgcolor" value=$top_content_bgcolor}>
<{assign var="bg_img" value=$top_img}>
<{assign var="bg_repeat" value=$top_img_repeat}>
<{assign var="bg_position" value=$top_img_position}>
<{assign var="bg_size" value=$top_img_size}>
<{assign var="padding" value=$top_padding}>
<{assign var="mt" value=$top_padding_mt}>
<{assign var="mb" value=$top_padding_mb}>
<{assign var="height" value=$top_height}>
<{assign var="color" value=$top_color}>
<{assign var="style" value=$top_style}>
<{assign var="zindex" value=$top_zindex}>
<{assign var="shadow_arr" value=$top_shadow}>
<{assign var="display_type" value=$top_display_type}>
<{assign var="border_radius" value=$top_border_radius}>
<{includeq file="$xoops_rootpath/themes/school2022/tpl/wrapper_display.tpl"}>
<{if $top_color}>
    #top-display a,
    #top-display a:hover,
    #top-display a:active ,
    #top-display a:visited {
        color:<{$top_color}>;
    }
<{/if}>


<{* Logo *}>
<{assign var="item" value='logo'}>
<{assign var="side_bgcolor" value=$logo_side_bgcolor}>
<{assign var="content_bgcolor" value=$logo_content_bgcolor}>
<{assign var="bg_img" value=$logo_img}>
<{assign var="bg_repeat" value=$logo_img_repeat}>
<{assign var="bg_position" value=$logo_img_position}>
<{assign var="bg_size" value=$logo_img_size}>
<{assign var="padding" value=$logo_padding}>
<{assign var="mt" value=$logo_padding_mt}>
<{assign var="mb" value=$logo_padding_mb}>
<{assign var="height" value=null}>
<{assign var="color" value=null}>
<{assign var="style" value=$logo_style}>
<{assign var="zindex" value=$logo_zindex}>
<{assign var="shadow_arr" value=$logo_shadow}>
<{assign var="display_type" value=$logo_display_type}>
<{assign var="border_radius" value=$logo_border_radius}>
<{includeq file="$xoops_rootpath/themes/school2022/tpl/wrapper_display.tpl"}>

#logo-wrapper{
    <{if $logo_bg}>
        background-image: url('<{$logo_bg}>') <{if $logo_bg2}>, url('<{$logo_bg2}>')<{/if}>;
        background-position: <{$logo_bg_position}><{if $logo_bg2_position}>, <{$logo_bg2_position}><{/if}>;
        background-repeat: <{$logo_bg_repeat}><{if $logo_bg2_repeat}>, <{$logo_bg2_repeat}><{/if}>;
        background-size: <{$logo_bg_size}><{if $logo_bg2_size}>, <{$logo_bg2_size}><{/if}>;
    <{/if}>
}

<{* 導覽列 *}>
<{assign var="item" value='nav'}>
<{assign var="side_bgcolor" value=$nav_side_bgcolor}>
<{assign var="content_bgcolor" value=null}>
<{assign var="bg_img" value=null}>
<{assign var="bg_repeat" value=null}>
<{assign var="bg_position" value=null}>
<{assign var="bg_size" value=null}>
<{assign var="padding" value=$nav_padding}>
<{assign var="mt" value=$nav_padding_mt}>
<{assign var="mb" value=$nav_padding_mb}>
<{assign var="height" value=null}>
<{assign var="color" value=null}>
<{assign var="style" value=$nav_style}>
<{assign var="zindex" value=$nav_zindex}>
<{assign var="shadow_arr" value=$nav_shadow}>
<{assign var="display_type" value=$nav_display_type}>
<{assign var="border_radius" value=$nav_border_radius}>
<{includeq file="$xoops_rootpath/themes/school2022/tpl/wrapper_display.tpl"}>
<{includeq file="$xoops_rootpath/themes/school2022/tpl/nav_color.tpl"}>


<{* 滑動圖 *}>
<{assign var="item" value='slide'}>
<{assign var="side_bgcolor" value=$slide_side_bgcolor}>
<{assign var="content_bgcolor" value=$slide_content_bgcolor}>
<{assign var="bg_img" value=$slide_img}>
<{assign var="bg_repeat" value=$slide_img_repeat}>
<{assign var="bg_position" value=$slide_img_position}>
<{assign var="bg_size" value=$slide_img_size}>
<{assign var="padding" value=$slide_padding}>
<{assign var="mt" value=$slide_padding_mt}>
<{assign var="mb" value=$slide_padding_mb}>
<{assign var="height" value=$slide_height}>
<{assign var="color" value=null}>
<{assign var="style" value=$slide_style}>
<{assign var="zindex" value=$slide_zindex}>
<{assign var="shadow_arr" value=$slide_shadow}>
<{assign var="display_type" value=$slide_display_type}>
<{assign var="border_radius" value=$slide_border_radius}>
<{includeq file="$xoops_rootpath/themes/school2022/tpl/wrapper_display.tpl"}>


<{* 中間 *}>
<{assign var="item" value='middle'}>
<{assign var="side_bgcolor" value=$middle_side_bgcolor}>
<{assign var="content_bgcolor" value=$middle_content_bgcolor}>
<{assign var="bg_img" value=$middle_img}>
<{assign var="bg_repeat" value=$middle_img_repeat}>
<{assign var="bg_position" value=$middle_img_position}>
<{assign var="bg_size" value=$middle_img_size}>
<{assign var="padding" value=$middle_padding}>
<{assign var="mt" value=$middle_padding_mt}>
<{assign var="mb" value=$middle_padding_mb}>
<{assign var="height" value=$middle_height}>
<{assign var="color" value=$middle_color}>
<{assign var="style" value=$middle_style}>
<{assign var="zindex" value=$middle_zindex}>
<{assign var="shadow_arr" value=$middle_shadow}>
<{assign var="display_type" value=$middle_display_type}>
<{assign var="border_radius" value=$middle_border_radius}>
<{includeq file="$xoops_rootpath/themes/school2022/tpl/wrapper_display.tpl"}>
<{if $middle_color}>
    #middle-display a,
    #middle-display a:hover,
    #middle-display a:active ,
    #middle-display a:visited {
        color:<{$middle_color}>;
    }
<{/if}>

<{* 主內容 *}>
<{assign var="item" value='content'}>
<{assign var="side_bgcolor" value=$base_color}>
<{assign var="content_bgcolor" value=$content_content_bgcolor}>
<{assign var="bg_img" value=$content_img}>
<{assign var="bg_repeat" value=$content_img_repeat}>
<{assign var="bg_position" value=$content_img_position}>
<{assign var="bg_size" value=$content_img_size}>
<{assign var="padding" value=$content_padding}>
<{assign var="mt" value=$content_padding_mt}>
<{assign var="mb" value=$content_padding_mb}>
<{assign var="height" value=null}>
<{assign var="color" value=$font_color}>
<{assign var="style" value=$content_style}>
<{assign var="zindex" value=$content_zindex}>
<{assign var="shadow_arr" value=$content_shadow}>
<{assign var="display_type" value=$content_display_type}>
<{assign var="border_radius" value=$content_border_radius}>
<{includeq file="$xoops_rootpath/themes/school2022/tpl/wrapper_display.tpl"}>



<{* 頁尾 *}>
<{assign var="item" value='footer'}>
<{assign var="side_bgcolor" value=$footer_side_bgcolor}>
<{assign var="content_bgcolor" value=$footer_content_bgcolor}>
<{assign var="bg_img" value=$footer_img}>
<{assign var="bg_repeat" value=$footer_img_repeat}>
<{assign var="bg_position" value=$footer_img_position}>
<{assign var="bg_size" value=$footer_img_size}>
<{assign var="padding" value=$footer_padding}>
<{assign var="mt" value=$footer_padding_mt}>
<{assign var="mb" value=$footer_padding_mb}>
<{assign var="height" value=$footer_height}>
<{assign var="color" value=$footer_color}>
<{assign var="style" value=$footer_style}>
<{assign var="zindex" value=$footer_zindex}>
<{assign var="shadow_arr" value=$footer_shadow}>
<{assign var="display_type" value=$footer_display_type}>
<{assign var="border_radius" value=$footer_border_radius}>
<{includeq file="$xoops_rootpath/themes/school2022/tpl/wrapper_display.tpl"}>
<{if $footer_color}>
    #footer-display a,
    #footer-display a:hover,
    #footer-display a:active ,
    #footer-display a:visited {
        color:<{$footer_color}>;
    }
<{/if}>


<{* 底部 *}>
<{assign var="item" value='bottom'}>
<{assign var="side_bgcolor" value=$bottom_side_bgcolor}>
<{assign var="content_bgcolor" value=$bottom_content_bgcolor}>
<{assign var="bg_img" value=$bottom_img}>
<{assign var="bg_repeat" value=$bottom_img_repeat}>
<{assign var="bg_position" value=$bottom_img_position}>
<{assign var="bg_size" value=$bottom_img_size}>
<{assign var="padding" value=$bottom_padding}>
<{assign var="mt" value=$bottom_padding_mt}>
<{assign var="mb" value=$bottom_padding_mb}>
<{assign var="height" value=$bottom_height}>
<{assign var="color" value=$bottom_color}>
<{assign var="style" value=$bottom_style}>
<{assign var="zindex" value=$bottom_zindex}>
<{assign var="shadow_arr" value=$bottom_shadow}>
<{assign var="display_type" value=$bottom_display_type}>
<{assign var="border_radius" value=$bottom_border_radius}>
<{includeq file="$xoops_rootpath/themes/school2022/tpl/wrapper_display.tpl"}>
<{if $bottom_color}>
    #bottom-display a,
    #bottom-display a:hover,
    #bottom-display a:active ,
    #bottom-display a:visited {
        color:<{$bottom_color}>;
    }
<{/if}>

@media (min-width: 768px) {
    #page-wrapper{
        max-width: <{$container_width}>;
    }
}