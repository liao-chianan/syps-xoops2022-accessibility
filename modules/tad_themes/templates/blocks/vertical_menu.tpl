<!--add by lcn 20220829 判斷target是_blank補上文字說明--!>
<{if $block.menu}>
    <ul class="vertical_menu">
        <{foreach from=$block.menu item=menu key=i}>
            <{if $menu.itemname!=""}>
                <li>
                    <a href="<{$menu.itemurl}>" target="<{$menu.target}>" title="<{$menu.itemname}><{if $menu.target=="_blank"}>[另開新視窗]<{/if}>">
                        <i class="fa <{$menu.bootstrap_icon}>"></i>
                        <{$menu.itemname}>
                    </a>
                </li>
            <{/if}>
        <{/foreach}>
    </ul>
<{/if}>
