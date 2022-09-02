<{if $logo_position=="slide"}>
    <{includeq file="$xoops_rootpath/modules/tadtools/themes5_tpl/logo.tpl"}>
<{elseif $logo_cols}>
    <div id="logo-wrapper">
        <{assign var=mylogofile value=$xoops_rootpath$logo_path`$smarty.get.$logo_var`.$logo_ext}>
        <div id="logo-display" class="container-fluid <{if $logo_align}>d-flex <{$logo_align}><{/if}>">
            <div class="row">

            <{if $logo_cols}>
                <{assign var="logo_col" value='-'|explode:$logo_cols}>
            <{else}>
                <{assign var="logo_col" value=[12,0]}>
            <{/if}>
            <div class="col-xl-<{if $logo_col.0}><{$logo_col.0}><{else}>auto<{/if}> text-start">
                <{if $logo_text=='1'}>
                    <h1>
                    <a href="<{$xoops_url}><{$smarty.server.DOCUMENT_URI}>?<{$logo_var}>=<{$smarty.get.$logo_var}>"><{$xoops_sitename}></a>
                    </h1>
                    <div class="mt-1 opacity-75"><{$xoops_slogan}></div>
                <{elseif $logo_position=="page"}>
                    <{if $logo_auto==1 and $smarty.server.REQUEST_URI|strpos:$smarty.get.$logo_var!==false and $mylogofile|file_exists}>
                        <a href="<{$xoops_url}><{$smarty.server.DOCUMENT_URI}>?<{$logo_var}>=<{$smarty.get.$logo_var}>">
                            <img id="website_logo" src="<{$xoops_url}><{$logo_path}><{$smarty.get.$logo_var}>.<{$logo_ext}>" style="<{if $logo_full!='1'}>max-<{/if}>>width: 100%;position: relative; z-index:10;" alt="<{$xoops_sitename}>" title="<{$xoops_sitename}>" class="img-fluid">
                        </a>
                    <{else}>
                        <!--no logo-wrapper by lcn-->
                        <!--{includeq file="$xoops_rootpath/modules/tadtools/themes5_tpl/logo.tpl"}--!>
                    <{/if}>
                <{/if}>
            </div>
            <{if $logo_col.1}>
                <div class="col-xl-<{if $logo_col.1}><{$logo_col.1}><{else}>auto<{/if}> text-end">
                    <{assign var="item_content" value=$logo_right}>
                    <{assign var="item_html" value=$logo_right_content}>
                    <{assign var="item_bid" value=$bids.logo_right}>
                    <{includeq file="$xoops_rootpath/themes/school2022/tpl/custom_content.tpl"}>
                </div>
            <{/if}>

            </div>
        </div>
    </div>
<{/if}>
