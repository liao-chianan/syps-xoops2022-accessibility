<{if $container_width == 12}>
    <{assign var=container_width value=100%}>
<{elseif $container_width == 11}>
    <{assign var=container_width value=92%}>
<{elseif $container_width == 10}>
    <{assign var=container_width value=83%}>
<{elseif $container_width == 9}>
    <{assign var=container_width value=75%}>
<{elseif $container_width == 8}>
    <{assign var=container_width value=67%}>
<{/if}>


<{if $slide_display_type=='not_full' and $content_display_type=='not_full' and $logo_display_type=='not_full' and $footer_display_type=='not_full' and $nav_display_type=='not_full' and $top_display_type=='not_full' and $bottom_display_type=='not_full'}>
    <{assign var=use_page value=true}>
<{else}>
    <{assign var=use_page value=false}>
<{/if}>
