<script type="text/javascript" src="<{xoAppUrl modules/tadtools/jquery.sticky/jquery.sticky.js}>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("select[name='xoops_theme_select']").addClass("form-control");
        $("input[name='query']").addClass("form-control");
        $("input[name='uname']").addClass("form-control");
        $("input[name='pass']").addClass("form-control");
        $('iframe:not([title])').attr('title','iframe content');

        <{if $use_pin=="1" or $navbar_pos=='fixed-top'}>
            <{if $top_height!="" && ("navbar"|in_array:$top_left || "navbar"|in_array:$top_center || "navbar"|in_array:$top_right)}>
                <{assign var=pin_zone value="top"}>
            <{elseif "navbar"|in_array:$logo_right}>
                <{assign var=pin_zone value="logo"}>
            <{elseif $middle_height!="" && ("navbar"|in_array:$middle_left || "navbar"|in_array:$middle_center || "navbar"|in_array:$middle_right)}>
                <{assign var=pin_zone value="middle"}>
            <{else}>
                <{assign var=pin_zone value="nav"}>
            <{/if}>
        <{/if}>

        <{if $pin_zone}>
            if($( window ).width() > 768){
                $("#<{$pin_zone}>-wrapper").sticky({topSpacing:0 , zIndex: 500, getWidthFrom:'#<{$pin_zone}>-wrapper'});
            }else{
                $("#<{$pin_zone}>-wrapper").unstick();
            }
        <{/if}>
    });

    <{if $pin_zone}>
        $(window).resize(function() {
            if($(window).width() > 768){
                // 避免在手機狀態下無法上下選擇選項
                $("#<{$pin_zone}>-wrapper").sticky({topSpacing:0 , zIndex: 500, getWidthFrom:'#<{$pin_zone}>-wrapper'});
            }else{
                $("#<{$pin_zone}>-wrapper").unstick();
            }
        });
    <{/if}>
</script>