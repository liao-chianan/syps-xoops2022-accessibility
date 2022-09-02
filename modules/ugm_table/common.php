<?php
##########################################################
#  前、後台共用檔
#  權限設定
#
#
#
##########################################################
define("TADTOOLS_PATH",XOOPS_ROOT_PATH."/modules/tadtools");
define("TADTOOLS_URL",XOOPS_URL."/modules/tadtools");
include_once 'ugm_tools.php';

//判斷是否對該模組有管理權限
$isAdmin=is_Admin();
//判斷是否為模組管理員
function is_Admin(){
  global $xoopsUser,$xoopsModule;
  $isAdmin=false;
  if ($xoopsUser) {
    $module_id = $xoopsModule->getVar('mid');
    $isAdmin=$xoopsUser->isAdmin($module_id);
  }
  return $isAdmin;
}
function module_footer($main=""){
  global $xoopsTpl,$module_css,$interface_menu,$module_menu;
  $xoopsTpl->assign( "css" , $module_css) ;
  $xoopsTpl->assign( "content" , $main) ; 
  $xoopsTpl->assign( "bootstrap" , get_bootstrap()) ; #判斷是否引入bootstrap
  //$xoopsTpl->assign( "toolbar" , toolbar_bootstrap($interface_menu)) ;
  $xoopsTpl->assign( "toolbar" , $module_menu) ;
}
?>
