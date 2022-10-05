<{if $all_tad_gphotos_images}>
    <h2 class="sr-only visually-hidden"><{$smarty.const._MD_TADGPHOTOS_HOME}></h2>
    <{if $smarty.session.tad_gphotos_adm or $create_album}>
        <{$delete_tad_gphotos_images_func}>
    <{/if}>

    <div id="tad_gphotos_images_sort">
        <{foreach from=$all_tad_gphotos_images item=data}>
            <div class="polaroid" style="width: <{$config.polaroid_width}>px; height: <{$config.polaroid_height}>px; margin: <{$config.polaroid_margin_y}>px <{$config.polaroid_margin_x}>px;">
                <a href="<{$data.image_link}>" target="_blank" style="color: transparent;">
                    <img src="<{$data.image_url}>" id="tr_<{$data.image_sn}>" class="thumb-img"  style="height: <{$img_height}>px;" alt="<{$data.image_sn}>"><span class="sr-only visually-hidden"><{if $data.image_description}><{$data.image_description}><{else}><{$album_name}><{/if}></span>
                </a>
                <div class="polaroid-container">
                    <p id="gphoto<{$data.image_sn}>"><{$data.image_description}></p>
                </div>
            </div>
        <{/foreach}>
    </div>

    <div style="margin: 30px auto;"><{$bar}></div>
<{else}>
    <h2 class="sr-only visually-hidden"><{$smarty.const._TAD_EMPTY}></h2>
    <div class="jumbotron text-center">
        <{if $smarty.session.tad_gphotos_adm or $create_album}>
            <a href="<{$xoops_url}>/modules/tad_gphotos/index.php?op=tad_gphotos_form" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> <{$smarty.const._MD_TADGPHOTOS_ADD}></a>
        <{else}>
            <h3><{$smarty.const._TAD_EMPTY}></h3>
        <{/if}>
    </div>
<{/if}>
