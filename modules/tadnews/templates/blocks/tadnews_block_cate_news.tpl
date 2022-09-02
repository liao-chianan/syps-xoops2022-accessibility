<{foreach item=all_news from=$block.all_news}>
    <{if $all_news.news}>
        <div class="row">
            <{if $all_news.show_pic}>
                <div class="col-md-2">
                    <a href="<{$xoops_url}>/modules/tadnews/index.php?ncsn=<{$all_news.ncsn}>">
                        <img src="<{$all_news.pic}>" alt="<{$all_news.nc_title}>" title="<{$all_news.nc_title}>" style="width: 100%;">
                    </a>

                    <h4 class="my"><a href="index.php?ncsn=<{$all_news.ncsn}>"><{$all_news.nc_title}></a></h4>
                </div>
                <div class="col-md-10">
            <{else}>
                <div class="col-md-12">
            <{/if}>

            <{if $all_news.news}>
                <table class="table table-striped table-hover table-shadow">
                    <tr class="my">
                        <th><a href="<{$xoops_url}>/modules/tadnews/index.php?ncsn=<{$all_news.ncsn}>"><{$all_news.nc_title}></a></th>
                    </tr>
                    <{foreach item=news from=$all_news.news}>
                        <tr>
                            <td>
                                <div class="pull-right float-right"><{$news.files}></div>
                                <{$news.post_date}>
                                <{$news.prefix_tag}>
                                <{if $news.need_sign}>
                                    <img src="<{$news.need_sign}>" alt="<{$news.news_title}>" style="margin:3px;">
                                <{/if}>
                                <{$news.always_top_pic}>
                                <a href="<{$xoops_url}>/modules/tadnews/index.php?nsn=<{$news.nsn}>"><{$news.news_title}></a>
                            </td>
                        </tr>
                    <{/foreach}>
                </table>
            <{else}>
                <div class="alert alert-warning">
                    <div style="font-size: 1.875rem; color: #cfcfcf; padding: 30px;">
                        <{$smarty.const._TADNEWS_EMPTY}>
                    </div>
                </div>
            <{/if}>
            </div>
        </div>
    <{/if}>
<{/foreach}>
