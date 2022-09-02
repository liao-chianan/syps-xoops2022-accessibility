<{if $module.isAdmin}>
  <li role="separator" class="divider"></li>
  <li><a href="<{xoAppUrl}>modules/system/admin.php?fct=preferences&op=showmod&mod=<{$module.mid}>">偏好設定</a></li>
  <li><a href="admin/groupperm.php">權限設定</a></li>
  <li><a href="admin/index.php">管理後台</a></li>
<{/if}>

<{if $xoops_uname === "ugm"}>
  <li role="separator" class="divider"></li>
  <li><a href="<{xoAppUrl}>modules/system/admin.php?fct=modulesadmin&op=update&module=<{$module.dirname}>" target="_blank">模組更新</a></li>
  <li><a href="<{xoAppUrl}>modules/system/admin.php?fct=maintenance" target="_blank">維護</a></li>
  <li><a href="<{xoAppUrl}>modules/tadtools/themes_common/tools/debug.php?op=debug&v=1">開除錯</a></li>
  <li><a href="<{xoAppUrl}>modules/tadtools/themes_common/tools/debug.php?op=debug&v=0">關除錯</a></li>
<{/if}>