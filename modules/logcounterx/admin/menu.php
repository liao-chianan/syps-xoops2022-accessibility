<?php
$adminmenu = array();
$icon_dir=substr(XOOPS_VERSION,6,3)=='2.6'?"":"images/";

$i = 1;
$adminmenu[$i]['title'] = _MI_TAD_ADMIN_HOME ;
$adminmenu[$i]['link'] = 'admin/index.php' ;
$adminmenu[$i]['desc'] = _MI_TAD_ADMIN_HOME_DESC ;
$adminmenu[$i]['icon'] = 'images/admin/home.png' ;

$i++;
$adminmenu[$i]['title'] = _LCX_MI_GENCONF;
$adminmenu[$i]['link'] = "admin/genadm.php";
$adminmenu[$i]['desc'] = _LCX_MI_GENCONF ;
$adminmenu[$i]['icon'] = "images/admin/genadm.png";

$i++;
$adminmenu[$i]['title'] = _LCX_MI_LOGCONF;
$adminmenu[$i]['link'] = "admin/logadm.php";
$adminmenu[$i]['desc'] = _LCX_MI_LOGCONF ;
$adminmenu[$i]['icon'] = "images/admin/logadm.png";

$i++;
$adminmenu[$i]['title'] = _LCX_MI_REPCONF;
$adminmenu[$i]['link'] = "admin/repadm.php";
$adminmenu[$i]['desc'] = _LCX_MI_REPCONF ;
$adminmenu[$i]['icon'] = "images/admin/repadm.png";

$i++;
$adminmenu[$i]['title'] = _LCX_MI_IMGSLCT;
$adminmenu[$i]['link'] = "admin/imgslct.php";
$adminmenu[$i]['desc'] = _LCX_MI_IMGSLCT ;
$adminmenu[$i]['icon'] = "images/admin/imgslct.png";

$i++;
$adminmenu[$i]['title'] = _LCX_MI_REBUILD;
$adminmenu[$i]['link'] = "admin/rebuild.php";
$adminmenu[$i]['desc'] = _LCX_MI_REBUILD ;
$adminmenu[$i]['icon'] = "images/admin/rebuild.png";

$i++;
$adminmenu[$i]['title'] = _LCX_MI_BROSERLIST;
$adminmenu[$i]['link'] = "admin/uaos.php";
$adminmenu[$i]['desc'] = _LCX_MI_BROSERLIST ;
$adminmenu[$i]['icon'] = "images/admin/uaos.png";

$i++;
$adminmenu[$i]['title'] = _LCX_MI_QWORDSLIST;
$adminmenu[$i]['link'] = "admin/qwords.php";
$adminmenu[$i]['desc'] = _LCX_MI_QWORDSLIST ;
$adminmenu[$i]['icon'] = "images/admin/qwords.png";

$i++;
$adminmenu[$i]['title'] = _LCX_MI_DBCHECK;
$adminmenu[$i]['link'] = "admin/db_check.php";
$adminmenu[$i]['desc'] = _LCX_MI_DBCHECK ;
$adminmenu[$i]['icon'] = "images/admin/db_check.png";

$i++;
$adminmenu[$i]['title'] = _MI_TAD_ADMIN_ABOUT;
$adminmenu[$i]['link'] = 'admin/about.php';
$adminmenu[$i]['desc'] = _MI_TAD_ADMIN_ABOUT_DESC;
$adminmenu[$i]['icon'] = 'images/admin/about.png';



?>