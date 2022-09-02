<div class="news_page_container">
    <div <{if $page.need_sign}>style="background-image: url('<{$page.need_sign}>'); background-position: right top; background-repeat: no-repeat;"<{/if}>>
        <h4 class="my">
            <a href="<{$xoops_url}>/modules/tadnews/index.php?nsn=<{$page.nsn}>">
            <{$page.news_title}>
            </a>
        </h4>
    </div>
    <div class="news_page_content">
        <{if $page.not_news!=1 or ($page.not_news==1 and $cate_set_title==1)}>
            <div class="row news_page_info">
                <div class="col-md-6">
                    <{$page.prefix_tag}>

                    <span class="news_page_info_text">
                        <a href="<{$xoops_url}>/userinfo.php?uid=<{$page.uid}>"><{$page.uid_name}></a>
                        -
                        <a href="<{$xoops_url}>/modules/tadnews/<{$page.link_page}>?ncsn=<{$page.ncsn}>"><{$page.cate_name}></a>
                        |
                        <{$page.post_date}>
                        |
                        <{$smarty.const._TADNEWS_HOT}>
                        <{$page.counter}>
                    </span>
                    <{$page.star}>
                </div>
                <div class="col-md-6 text-right text-end"><{$page.fun}></div>
            </div>
        <{/if}>

        <div style="margin: 30px;">
            <{$page.pic}>
            <{$page.content}>
        </div>
        <div style="clear:both;"></div>
    </div>
</div>