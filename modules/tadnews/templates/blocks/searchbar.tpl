<div style="padding:4px 10px; border-radius:5px; background-color: rgba(157, 201, 241, 0.671); margin-bottom:10px;">
    <!--edit by lcn 20220815--!><!--label for="ncsn<{$block.randStr}>">
        <{$smarty.const._MB_TADNEWS_BAR_CATE}><{$smarty.const._TAD_FOR}>
    </label>
    <select id="ncsn<{$block.randStr}>">
        <option value=""></option>
        <{foreach from=$block.ncsn key=ncsn item=title}>
            <option value="<{$ncsn}>"><{$title}></option>
        <{/foreach}>
    </select--!>
    <label for="tag_sn<{$block.randStr}>">
        <{$smarty.const._MB_TADNEWS_BAR_TAG}><{$smarty.const._TAD_FOR}>
    </label>
    <select id="tag_sn<{$block.randStr}>">
        <option value=""></option>
        <{foreach from=$block.tag key=tag_sn item=tag}>
            <option value="<{$tag_sn}>"><{$tag}></option>
        <{/foreach}>
    </select>
    <label for="keyword<{$block.randStr}>">
        <{$smarty.const._MB_TADNEWS_BAR_KEYWORD}><{$smarty.const._TAD_FOR}>
    </label>
    <input type="text" id="keyword<{$block.randStr}>" size=8>

    <label for="start_day<{$block.randStr}>">
        <{$smarty.const._MB_TADNEWS_BAR_DATE}><{$smarty.const._TAD_FOR}>
    </label>
    <input type="text" id="start_day<{$block.randStr}>" size=12 onClick="WdatePicker({dateFmt:'yyyy-MM-dd', startDate:'%y-%M-%d'})" placeholder="<{$smarty.const._MB_TADNEWS_BAR_START_DAY}>">-
    <label for="end_day<{$block.randStr}>" class="sr-only visually-hidden">
        <{$smarty.const._MB_TADNEWS_BAR_DATE}><{$smarty.const._TAD_FOR}>
    </label><input type="text" id="end_day<{$block.randStr}>" size=12 onClick="WdatePicker({dateFmt:'yyyy-MM-dd', startDate:'%y-%M-%d'})" placeholder="<{$smarty.const._MB_TADNEWS_BAR_END_DAY}>">
</div>
