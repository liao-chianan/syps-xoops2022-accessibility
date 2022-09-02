<{foreach from=$icon_arr item=icon}>
    <{if $icon!="<br>"}>
        <{assign var="link" value="|"|explode:$icon}>
        <a href="<{$link.0}>" <{if $link.4}>target="<{$link.3}>"<{/if}> class="si<{$link.2}>"><i class="fa <{$link.1}>"></i></a>
    <{/if}>
<{/foreach}>
