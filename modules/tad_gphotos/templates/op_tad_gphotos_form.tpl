<script type="text/javascript">
    $(document).ready(function(){
        //
        $('#album_url').change(function(){
            var p=/^https:\/\/photos.app.goo.gl/gi;
            var url=$('#album_url').val();
            if(p.test(url)){
                alert('<{$smarty.const._MD_TADGPHOTOS_URL_ALERT}>');
                $('#album_url').val('');
            }
        });
    });
</script>

<form action="<{$action}>" method="post" id="myForm" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <!--相簿名稱-->
            <div class="form-group row mb-3">
                <label class="col-label col-form-label">
                    <{$smarty.const._MD_TADGPHOTOS_ALBUM_NAME}>
                </label>
                <div class="">
                    <input type="text" name="album_name" id="album_name" class="form-control" value="<{$album_name}>" placeholder="<{$smarty.const._MD_TADGPHOTOS_ALBUM_NAME}><{$smarty.const._MD_TADGPHOTOS_ALBUM_NAME_HELP}>">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <!--相簿分類-->
            <div class="form-group row mb-3">
                <label class="col-label col-form-label">
                    <{$smarty.const._MD_TADGPHOTOS_CSN}>
                </label>
                <div class="">
                    <select name="csn" id="csn" class="form-control validate[required]">
                        <option value=""><{$smarty.const._MD_TADGPHOTOS_UNCATEGORIZED}></option>
                        <{$cate_options}>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!--相簿網址-->
    <div class="form-group row mb-3">
        <label class="col-label col-form-label">
            <{$smarty.const._MD_TADGPHOTOS_ALBUM_URL}>
        </label>
        <div class="">
            <input type="text" name="album_url" id="album_url" class="form-control border-primary validate[required , custom[url]]" value="<{$album_url}>" placeholder="<{$smarty.const._MD_TADGPHOTOS_ALBUM_URL_DEMO}>">
        </div>
    </div>

    <div class="alert alert-info">
        <{$smarty.const._MD_TADGPHOTOS_ALBUM_URL_HEPL}>
    </div>

    <div class="bar">
        <input type='hidden' name="uid" value="<{$uid}>">

        <{$token_form}>

        <input type="hidden" name="op" value="<{$next_op}>">
        <input type="hidden" name="album_sn" value="<{$album_sn}>">
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> <{$smarty.const._TAD_SAVE}></button>
    </div>
</form>
