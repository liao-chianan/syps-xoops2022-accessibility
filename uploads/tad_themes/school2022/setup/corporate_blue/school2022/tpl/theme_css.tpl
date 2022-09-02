<{if $bg_bg2 and $bg_bg3}>
    body{
        background-image: url('<{$bg_bg3}>'), url('<{$bg_bg2}>'), url('<{$bg_img}>');
        background-position: <{$bg_bg3_position}>, <{$bg_bg2_position}>, <{$bg_position}>;
        background-repeat: <{$bg_bg3_repeat}>, <{$bg_bg2_repeat}>, <{$bg_repeat}>;
        background-size: <{$bg_bg3_size}>, <{$bg_bg2_size}>, <{$bg_size}>;
    }
<{elseif $bg_bg2}>
    body{
        background-image: url('<{$bg_bg2}>'), url('<{$bg_img}>');
        background-position: <{$bg_bg2_position}>, <{$bg_position}>;
        background-repeat: <{$bg_bg2_repeat}>, <{$bg_repeat}>;
        background-size: <{$bg_bg2_size}>, <{$bg_size}>;
    }
<{elseif $bg_bg3}>
    body{
        background-image: url('<{$bg_bg3}>'),url('<{$bg_img}>');
        background-position: <{$bg_bg3_position}>, <{$bg_position}>;
        background-repeat: <{$bg_bg3_repeat}>, <{$bg_repeat}>;
        background-size: <{$bg_bg3_size}>, <{$bg_size}>;
    }
<{/if}>

#xoops_theme_left_zone{
<{if $left_separate=='1'}>
    border-right:<{$separate_style}>;
<{/if}>
    background-color:<{$lb_color}>;
    padding: 0px 14px;
}
#xoops_theme_center_zone{
    background-color:<{$cb_color}>;
    padding: 0px 14px;
}
#xoops_theme_right_zone {
<{if $right_separate=='1'}>
    border-<{if $theme_type=="theme_type_3" or $theme_type=="theme_type_4" or $theme_type=="theme_type_8"}>top<{else}>left<{/if}>:<{$separate_style}>;
<{/if}>
    background-color:<{$rb_color}>;
    padding: 0px 14px;
}