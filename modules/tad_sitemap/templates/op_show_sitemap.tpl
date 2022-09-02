<h1><{$smarty.const._MD_TADSITEMA_SMNAME1}></h1>
<{$about_site}>
<{if $all_content}>
    <{assign var="i" value=0}>
    <table class="table">
    <{foreach from=$all_content item=map}>
        <{assign var="i" value=$i+1}>
        <{assign var="j" value=0}>
        <tr>
            <th id="wcag_item_<{$i}>"><{$i}>.<{$map.name}></th>
            <td headers="wcag_item_<{$i}>">
            <{if $map.item}>
                <{foreach from=$map.item item=sub}>
                <{if $sub.name}>
                    <{assign var="j" value=$j+1}>
                    <div>
                    <span class="badge badge-info"><{$i}>-<{$j}></span>
                    <a href="<{$xoops_url}>/modules/<{$map.dirname}>/<{$sub.url}>"><{$sub.name}></a>
                    <{if $sub.description}>  : <{$sub.description}><{/if}>
                    </div>
                <{/if}>
                <{/foreach}>
            <{/if}>
            </td>
        </tr>
    <{/foreach}>
    </table>

<{else}>
    <{if $smarty.session.tad_sitemap_adm}>
        <div class="jumbotron text-center">
            <a href="<{$xoops_url}>/modules/tad_sitemap/admin/main.php" class="btn btn-info"><{$smarty.const._TAD_ADD}></a>
        </div>
    <{/if}>
<{/if}>