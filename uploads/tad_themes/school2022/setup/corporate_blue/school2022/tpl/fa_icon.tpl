<{foreach from=$icon_arr item=icon}>
    <{if $icon!="<br>"}>
        <{assign var="link" value="|"|explode:$icon}>
        <a href="<{$link.0}>" <{if $link.3}>target="<{$link.3}>"<{/if}> class="si<{$link.2}>"><i class="fa <{$link.1}>" <{if $link.4}>data<{if $bootstrap=='5'}>-bs<{/if}>-toggle="tooltip" title="<{$link.4}>"<{/if}>></i></a>
    <{/if}>
<{/foreach}>

<script language="JavaScript" type="text/javascript">
    $(document).ready(function(){
        <{if $bootstrap=='5'}>
            $('[data-bs-toggle="tooltip"]').tooltip();
        <{else}>
            $('[data-toggle="tooltip"]').tooltip();
        <{/if}>
    });
</script>