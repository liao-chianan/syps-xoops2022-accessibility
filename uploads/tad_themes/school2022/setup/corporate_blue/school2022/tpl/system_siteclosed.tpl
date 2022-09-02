<!DOCTYPE html>
<html lang="<{$xoops_langcode}>">
    <head>
        <!--目前$_SESSION['bootstrap']="<{php}>echo $_SESSION['bootstrap'];<{/php}>"; -->
        <!--將目前的資料夾名稱，設定為樣板標籤變數 theme_name-->
        <{assign var=theme_name value=$xoTheme->folderName}>
        <!--載入由使用者設定的各項佈景變數-->
        <{includeq file="$xoops_rootpath/modules/tadtools/themes_common/get_var.tpl"}>
        <!--目前 $smarty.config.bootstrap = <{$smarty.config.bootstrap}> | $bootstrap=<{$bootstrap}> -->
        <!-- theme_id= <{$theme_id}>-->
        <{includeq file="$xoops_rootpath/themes/school2022/tpl/var.tpl"}>

        <{includeq file="$xoops_rootpath/modules/tadtools/themes_common/meta.tpl"}>
        <!-- 網站的標題及標語 -->
        <title><{$xoops_sitename}><{if $xoops_pagetitle}> - <{$xoops_pagetitle}><{/if}></title>

        <{includeq file="$xoops_rootpath/modules/tadtools/themes5_tpl/link_css.tpl"}>

        <!-- 給模組套用的樣板標籤開始 -->
        <{$xoops_module_header}>
        <!-- 給模組套用的樣板標籤結束 -->

        <!-- 局部套用的樣式，如果有載入完整樣式 theme_css.tpl 那就不需要這一部份 -->
        <{includeq file="$xoops_rootpath/modules/tadtools/themes5_tpl/theme_css.tpl"}>

        <style type="text/css">
            <{includeq file="$xoops_rootpath/themes/school2022/tpl/theme_css.tpl"}>
            <{includeq file="$xoops_rootpath/themes/school2022/tpl/wrapper_css.tpl"}>
        </style>

        <!-- 載入bootstrap -->
        <{includeq file="$xoops_rootpath/modules/tadtools/themes5_tpl/bootstrap_js.tpl"}>
    </head>

    <body>
        <!-- 導覽列區域 -->
        <{if $navbar_pos=='fixed-top'}>
            <{includeq file="$xoops_rootpath/themes/school2022/tpl/navbar.tpl"}>
        <{/if}>

        <{if $use_page}>
        <div id="page-wrapper">
        <{/if}>

        <{* 頂部內容區 *}>
        <{includeq file="$xoops_rootpath/themes/school2022/tpl/top_wrapper.tpl"}>

        <{* logo區域 *}>
        <{includeq file="$xoops_rootpath/themes/school2022/tpl/logo_wrapper.tpl"}>

        <{* 導覽列區域 *}>
        <{if $navbar_pos=='sticky-top'}>
            <{includeq file="$xoops_rootpath/themes/school2022/tpl/navbar.tpl"}>
        <{/if}>

        <{* 滑動圖區域 *}>
        <{if $use_slide }>
            <{includeq file="$xoops_rootpath/themes/school2022/tpl/slide_wrapper.tpl"}>
        <{/if}>

        <{* 導覽列區域 *}>
        <{if $navbar_pos=='default'}>
            <{includeq file="$xoops_rootpath/themes/school2022/tpl/navbar.tpl"}>
        <{/if}>

        <{* 中間內容區 *}>
        <{includeq file="$xoops_rootpath/themes/school2022/tpl/middle_wrapper.tpl"}>

        <{* 導覽列區域 *}>
        <{if $navbar_pos=='middle-bottom'}>
            <{includeq file="$xoops_rootpath/themes/school2022/tpl/navbar.tpl"}>
        <{/if}>

        <{* 主內容區域 *}>
        <{includeq file="$xoops_rootpath/themes/school2022/tpl/close_content_wrapper.tpl"}>

        <{* 頁尾區域 *}>
        <{includeq file="$xoops_rootpath/themes/school2022/tpl/footer_wrapper.tpl"}>

        <{* 底部內容區 *}>
        <{includeq file="$xoops_rootpath/themes/school2022/tpl/bottom_wrapper.tpl"}>

        <{if $use_page}>
        </div>
        <{/if}>

        <{* 導覽列區域 *}>
        <{if $navbar_pos=='fixed-bottom'}>
            <{includeq file="$xoops_rootpath/themes/school2022/tpl/navbar.tpl"}>
        <{/if}>

        <!-- 載入自訂js -->
        <{includeq file="$xoops_rootpath/themes/school2022/tpl/my_js.tpl"}>
        <{$my_code}>
    </body>
</html>