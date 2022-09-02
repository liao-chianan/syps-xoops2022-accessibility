/* 不透明時 $nav_bg_opacity=<{$nav_bg_opacity}> */
<{if $navbar_bg_top == $navbar_bg_bottom}>
    /* 沒有漸層 */
    <{if $nav_display_type=='not_full'}>
        /* 非滿版狀態時 $nav_display_type=<{$nav_display_type}> */
        #nav-display {
            background: <{$navbar_bg_top}> <{if $navbar_img}>url(<{$navbar_img}>)<{/if}>;
        }
        #nav-wrapper{
            background: <{$nav_side_bgcolor}>;
        }
    <{else}>
        /* 滿版狀態時 $nav_display_type=<{$nav_display_type}>，顏色放在外框，內容底透明 */
        #nav-display {
            background: <{$navbar_bg_top}> <{if $navbar_img}>url(<{$navbar_img}>)<{/if}>;
        }
        #nav-wrapper{
            background: <{$navbar_bg_top}> <{if $navbar_img}>url(<{$navbar_img}>)<{/if}>;
        }
    <{/if}>
<{else}>
    /* 有漸層 */
    /* 非滿版狀態時 */
    <{if $nav_display_type=='not_full'}>
        #nav-display {
            background: linear-gradient(<{$navbar_bg_top}>,<{$navbar_bg_bottom}>) <{if $navbar_img}>url(<{$navbar_img}>)<{/if}>;
        }
        #nav-wrapper{
            background: <{$nav_side_bgcolor}>;
        }
    <{else}>
        /* 滿版狀態時，顏色放在外框，內容底透明 */
        #nav-display {
            background: linear-gradient(<{$navbar_bg_top}>,<{$navbar_bg_bottom}>) <{if $navbar_img}>url(<{$navbar_img}>)<{/if}>;
        }
        #nav-wrapper{
            background: linear-gradient(<{$navbar_bg_top}>,<{$navbar_bg_bottom}>) <{if $navbar_img}>url(<{$navbar_img}>)<{/if}>;
        }

    <{/if}>
<{/if}>
