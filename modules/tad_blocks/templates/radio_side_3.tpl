<!-- 上中左 -->
<{if $all_blocks}>
    <h4 class="block_side"><{$smarty.const._MD_TAD_BLOCKS_TOP_LEFT}></h4>
    <div class="droppable" id="side-3" data-side="3">
        <{foreach from=$all_blocks.3 item=b}>
            <{includeq file="$xoops_rootpath/modules/tad_blocks/templates/block_tool.tpl"}>
        <{/foreach}>
    </div>
<{else}>
    <label for="side_3" style="background: <{$cb_color}>;">
        <input type="radio" name="TDC[side]" id="side_3" value="3" <{if $side==3}>checked<{/if}>>
        <span class="position_title"><{$smarty.const._MD_TAD_BLOCKS_TOP_LEFT}></span>
    </label>
<{/if}>