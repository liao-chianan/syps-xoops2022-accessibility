<div id="slide-wrapper">
    <div id="slide-display">
        <div>
            <{if $slide_kind!=''}>
                <{includeq file="$xoops_rootpath/modules/tadtools/themes_common/slider/`$slide_kind`.tpl"}>
            <{else}>
			
                <{includeq file="$xoops_rootpath/themes/school2022/tpl/slideshow_responsive.tpl"}>
                <{if $slide_mask}>
                    <img src="<{$slide_mask}>" alt="mask" class="img-fluid" style="width:100%; position:absolute; z-index:2; left:0px; top:0px;">
                <{elseif $slide_def_mask}>
                    <img src="<{$xoops_url}>/uploads/tad_themes/school2022/mask/<{$slide_def_mask}>.svg" alt="mask" class="img-fluid" style="width:100%; position:absolute; z-index:2; left:0px; top:0px;">
                <{/if}>
            <{/if}>
        </div>
    </div>
</div>