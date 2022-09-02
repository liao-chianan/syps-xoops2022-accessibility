<{if $item_height!=""}>
    <div id="<{$item}>-wrapper">
        <div id="<{$item}>-display">
            <div style="<{$item_style}>" class="row">
                <{assign var="item_col" value='-'|explode:$item_cols}>
                <{if $item_col.0}>
                    <div class="col-xl-<{$item_col.0}> text-xl-start">
                        <{assign var="item_content" value=$item_left}>
                        <{assign var="item_html" value=$item_left_content}>
                        <{assign var="item_bid" value=$item_left_bid}>
                        <{includeq file="$xoops_rootpath/themes/school2022/tpl/custom_content.tpl"}>
                    </div>
                <{/if}>

                <{if $item_col.1}>
                    <div class="col-xl-<{$item_col.1}> text-xl-center">
                        <{assign var="item_content" value=$item_center}>
                        <{assign var="item_html" value=$item_center_content}>
                        <{assign var="item_bid" value=$item_center_bid}>
                        <{includeq file="$xoops_rootpath/themes/school2022/tpl/custom_content.tpl"}>
                    </div>
                <{/if}>

                <{if $item_col.2}>
                    <div class="col-xl-<{$item_col.2}> text-xl-end">
                        <{assign var="item_content" value=$item_right}>
                        <{assign var="item_html" value=$item_right_content}>
                        <{assign var="item_bid" value=$item_right_bid}>
                        <{includeq file="$xoops_rootpath/themes/school2022/tpl/custom_content.tpl"}>
                    </div>
                <{/if}>
            </div>
        </div>
    </div>
<{/if}>
