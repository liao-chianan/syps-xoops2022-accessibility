<{if 'html'|in_array:$item_content}>
    <{if $item_html}><div class="d-inline-block"><{$item_html}></div><{/if}>
<{/if}>

<{if 'fa-icon'|in_array:$item_content}>
    <{assign var="icon_arr" value="\n"|explode:$item_html}>
    <div class="<{if "<br>"|in_array:$icon_arr}>d-block<{else}>d-inline-block<{/if}>"> <{includeq file="$xoops_rootpath/themes/school2022/tpl/fa_icon.tpl"}></div>
<{/if}>

<{if 'block'|in_array:$item_content}>
    <div class="d-block">
        <{if $item_bid.options}>
            <{block id=$item_bid.bid options=$item_bid.options}>
        <{else}>
            <{block id=$item_bid.bid}>
        <{/if}>
    </div>
<{/if}>

<{if 'google_translate'|in_array:$item_content}>
    <div class="d-inline-block"> <{includeq file="$xoops_rootpath/themes/school2022/tpl/google_translate.tpl"}></div>
<{/if}>

<{if 'menu'|in_array:$item_content}>
    <{assign var="line_arr" value="\n"|explode:$item_html}>
    <div class="d-inline-block"> <{includeq file="$xoops_rootpath/themes/school2022/tpl/menu.tpl"}></div>
<{/if}>

<{if 'search'|in_array:$item_content }>
    <div class="d-inline-block"> <{includeq file="$xoops_rootpath/themes/school2022/tpl/search.tpl"}></div>
<{/if}>

<{if 'login'|in_array:$item_content}>
    <div class="d-inline-block"> <{includeq file="$xoops_rootpath/themes/school2022/tpl/login.tpl"}></div>
<{/if}>

<{if 'navbar'|in_array:$item_content}>
    <div class="d-xl-inline-block" style="<{$nav_style}>">
        <{includeq file="$xoops_rootpath/modules/tadtools/themes5_tpl/navbar.tpl"}>
    </div>
<{/if}>
