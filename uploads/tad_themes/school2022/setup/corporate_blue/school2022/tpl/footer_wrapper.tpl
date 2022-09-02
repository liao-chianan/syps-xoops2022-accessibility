<div id="footer-wrapper">
    <div id="footer-display">
        <div>
            <{includeq file="$xoops_rootpath/modules/tadtools/themes5_tpl/footerBlock.tpl"}>
            <{if $xoops_isadmin}><a href="<{$xoops_url}>/modules/system/admin.php?fct=preferences&op=show&confcat_id=3" class="block_config"></a><{/if}>
            <{$xoops_footer}>
        </div>
    </div>
</div>