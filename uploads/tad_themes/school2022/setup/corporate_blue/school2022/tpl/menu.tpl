<style>
<{foreach from=$line_arr key=i item=line}>
  <{assign var="link" value="|"|explode:$line}>
  ul#head_menu li.head-menu-item-<{$i}> a:hover ,
  ul#head_menu li.head-menu-item-<{$i}> a.active {
    <{if $link.2}>background-color: <{$link.2}>;<{/if}>
    <{if $link.3}>color: <{$link.3}>;<{/if}>
  }
<{/foreach}>
</style>
<ul id="head_menu">
<{assign var="current_url" value="`$smarty.server.HTTP_HOST``$smarty.server.REQUEST_URI`"}>
<{foreach from=$line_arr key=i item=line}>
  <{assign var="link" value="|"|explode:$line}>

  <li class="head-menu-item-<{$i}>">
    <a href="<{$link.1}>" <{if $link.4}>target="<{$link.4|trim}>"<{/if}> <{if $current_url|strpos:$link.1}>class="active"<{/if}>><{$link.0}></a>
  </li>
<{/foreach}>
</ul>