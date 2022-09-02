<?php
define("_TAD_NEWS_ERROR_LEVEL",1);
#####################################################################################
#  自動取得(資料表,排序欄位)的最新排序
#
#
#
#####################################################################################
if(!function_exists("get_max_sort")){
function get_max_sort($tal,$col){
	global $xoopsDB;
	$sql = "select max($col) from ".$xoopsDB->prefix($tal);
	$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());
	list($sort)=$xoopsDB->fetchRow($result);
	return ++$sort;
}
}
###############################################################################
#  ugm_div(標題,內容，圓角，寬度)
#  圓角
#
#
###############################################################################
if(!function_exists("ugm_div")){
function ugm_div($title="",$data="",$corners="",$width=""){
  $title=empty($title)?"":"<h2> {$title}</h2>";
  if($corners=="shadow"){
    #留白
    $main="
      <div class='Block1Border'><div class='Block1BL'><div></div></div><div class='Block1BR'><div></div></div><div class='Block1TL'></div><div class='Block1TR'><div></div></div><div class='Block1T'></div><div class='Block1R'><div></div></div><div class='Block1B'><div></div></div><div class='Block1L'></div><div class='Block1C'></div><div class='Block1'>{$title}
            <div class='Block1ContentBorder'>{$data}
            </div>
        </div></div>
    ";
  }elseif($corners=="shadow1"){
    $main="
      <div class='Block1Border'><div class='Block1BL'><div></div></div><div class='Block1BR'><div></div></div><div class='Block1TL'></div><div class='Block1TR'><div></div></div><div class='Block1T'></div><div class='Block1R'><div></div></div><div class='Block1B'><div></div></div><div class='Block1L'></div><div class='Block1C'></div><div class='Block1' style='padding:3px 3px 3px 3px;'>{$title}
            <div class='Block1ContentBorder'>{$data}
            </div>
        </div></div>
    ";
  }else{
    $main="<div class='BlockBorder'><div class='BlockBL'><div></div></div><div class='BlockBR'><div></div></div><div class='BlockTL'></div><div class='BlockTR'><div></div></div><div class='BlockT'></div><div class='BlockR'><div></div></div><div class='BlockB'><div></div></div><div class='BlockL'></div><div class='BlockC'></div><div class='Block'>\n
    {$data}\n
    </div></div>\n";
   //$main=empty($title)? $main:"<span class='title'>{$title}</span>".$main; style='background-color: #fff131;color:#0003dc;height:180px;'
    $main=$title.$main; 
  }
  if(!empty($width)){
    $main="<div style='width:{$width}px;'>{$main}</div>";
  }
  return $main;
}
}

if(!function_exists("ugm_javascript")){
function ugm_javascript($op=0,$tag=".ugm_tb"){
	//$op=0  $op=1 隔行變色
  $change_line=($op==0)?"":"
     $('{$tag} tr:odd').addClass('oddalt'); //給class為ugm_tb的表格的奇數行添加class值為oddalt
     $('{$tag} tr:even').addClass('alt'); //給class為ugm_tb的表格的偶數行添加class值為alt
	";
	if($tag!=".ugm_tb"){
    $style="
    <style>
    /************************** ugm 表格*******************************************/
    {$tag}{margin: 0;width: 100%;border: none;border-collapse: separate /*collapse*/;border-spacing: 1px;border-image: initial;}
    {$tag} img{vertical-align:middle;}
    {$tag} input{font-size:16px;}
    /*.ugm_tb div{float : left}    
    .ugm_tb th{background-image:none;background-color: #B5CBE6;padding:5px;font-size:16px;text-align:center;color: #039;height:26px;} */
    {$tag} th{padding: 5px;	border-bottom:1px solid rgb(192,192,192);	background-color: rgb(64,64,64);	text-align:center; 	vertical-align: middle;	color:#ffffff;} 
    {$tag} td{padding:5px;font-size:12px;vertical-align: middle;}
    {$tag} span{color: Red;}
    {$tag} td a{text-decoration: none;}
    {$tag} td a:hove{text-decoration: text-decoration: underline;;}
    {$tag} textarea{}
    {$tag} th.bar{text-align:center;clear: both;}
    {$tag} td.align_c{text-align:center;}
    {$tag} .bar{width: 100%;text-align:center;background: #fff;margin-top: 6px;}
    {$tag} span.title{margin:0;padding:5px;width:98%;font-size:16px;text-align:center;color: #039;}
    {$tag} tr.level_0{background-color: #eed2c9;font-size:12px;}
    {$tag} tr.level_1,tr.level_3,tr.level_5{background-color: #eeeeee;font-size:12px;}
    {$tag} tr.level_2,tr.level_4,tr.level_6{background-color: #e0ffb2;font-size:12px;}
    {$tag} td.align_c{text-align:center;}
    {$tag} td.align_r{text-align:right;}
    {$tag} tr.oddalt{background-color: #eee;}
    {$tag} tr.alt{background-color: #ddd;}
    {$tag} tr.over{background-color: #BDF5BF;font-size:12px;} /*over*/
    {$tag} tr.level_1 td.ugm_indent{text-indent:16pt;}
    {$tag} tr.level_2 td.ugm_indent{text-indent:32pt;}
    {$tag} tr.level_3 td.ugm_indent{text-indent:48pt;}
    {$tag} tr.level_4 td.ugm_indent{text-indent:64pt;}
    {$tag} tr.level_5 td.ugm_indent{text-indent:80pt;}
    {$tag} tr.level_6 td.ugm_indent{text-indent:96pt;}
    </style>";
  }
  $main="
    <script language='javascript'>
      $(function(){
      	//--------------table隔行變色--------------------------------
      	$('{$tag} tr').mouseover(function(){ //如果鼠標移到class為ugm_tb的表格的tr上時，執行函數
        $(this).addClass('over');}).mouseout(function(){ //給這行添加class值為over，並且當鼠標一出該行時執行函數
        $(this).removeClass('over');}) //移除該行的class
        {$change_line}
      	//-----------------------------------------------------------
      });
    </script>
    {$style}
  ";
  return $main;
}
}
################################################################################
#  收合js
#
#
#
###############################################################################

if(!function_exists("ddaccordion")){
function ddaccordion(){
  global $xoopsModule;
  # ---- 取得模組目錄名稱 ---------------
  $MDIR=$xoopsModule->getVar('dirname');
  # -------------------------------------
  $main="
    <script type='text/javascript' src='".XOOPS_URL."/modules/{$MDIR}/class/ddaccordion/ddaccordion.js'>
    /***********************************************
    * Accordion Content script- (c) Dynamic Drive DHTML code library (http://www.dynamicdrive.com/dynamicindex17/ddaccordionmenu-glossy.htm)
    * Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
    * This notice must stay intact for legal use
    ***********************************************/
    </script>
    <script type='text/javascript'>
    ddaccordion.init({
    	headerclass: 'submenuheader', //Shared CSS class name of headers group
    	contentclass: 'submenu', //Shared CSS class name of contents group
    	revealtype: 'click', //顯示內容的方法， Valid value: 'click', 'clickgo', or 'mouseover'
    	mouseoverdelay: 200, //if revealtype='mouseover', set delay in milliseconds before header expands onMouseover
    	collapseprev: true, //是否只展開一個? true/false
    	defaultexpanded: [0], //展開第幾個，不填則不展開，index of content(s) open by default [index1, index2, etc] [] denotes no content
    	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
    	animatedefault: false, //Should contents open by default be animated into view?
    	persiststate: true, //persist state of opened contents within browser session?
    	toggleclass: ['', ''], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ['class1', 'class2']
    	togglehtml: ['suffix', \"<img src='".XOOPS_URL."/modules/{$MDIR}/class/ddaccordion/plus.gif' class='statusicon' />\", \"<img src='".XOOPS_URL."/modules/{$MDIR}/class/ddaccordion/minus.gif' class='statusicon' />\"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ['position', 'html1', 'html2'] (see docs)
    	animatespeed: 'fast', //speed of animation: integer in milliseconds (ie: 200), or keywords 'fast', 'normal', or 'slow'
    	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
    		//do nothing
    	},
    	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
    		//do nothing
    	}
    })
    </script>
    <style type='text/css'>
    .glossymenu{
    margin: 5px 0;
    padding: 0;
    width: 100%; /*width of menu*/
    border: 1px solid #9A9A9A;
    border-bottom-width: 0;
    }

    .glossymenu a.menuitem{
    background: black url(".XOOPS_URL."/modules/{$MDIR}/class/ddaccordion/glossyback.gif) repeat-x bottom left;
    font: bold 14px 'Lucida Grande', 'Trebuchet MS', Verdana, Helvetica, sans-serif;
    color: white;
    display: block;
    position: relative; /*To help in the anchoring of the '.statusicon' icon image*/
    width: auto;
    padding: 4px 0;
    padding-left: 20px;
    text-decoration: none;
    }


    .glossymenu a.menuitem:visited, .glossymenu .menuitem:active{
    color: white;
    }

    .glossymenu a.menuitem .statusicon{ /*CSS for icon image that gets dynamically added to headers*/
    position: absolute;
    top: 5px;
    left: 5px;
    border: none;
    }

    .glossymenu a.menuitem:hover{
    background-image: url(".XOOPS_URL."/modules/{$MDIR}/class/ddaccordion/glossyback2.gif);
    }

    .glossymenu div.submenu{ /*DIV that contains each sub menu*/
    background: white;
    }

    .glossymenu div.submenu ul{ /*UL of each sub menu*/
    list-style-type: none;
    margin: 0;
    padding: 0;
    }

    .glossymenu div.submenu ul li{
    border-bottom: 1px solid blue;
    }

    .glossymenu div.submenu ul li a{
    display: block;
    font: normal 13px 'Lucida Grande', 'Trebuchet MS', Verdana, Helvetica, sans-serif;
    color: black;
    text-decoration: none;
    padding: 2px 0;
    padding-left: 10px;
    }

    .glossymenu div.submenu ul li a:hover{
    background: #DFDCCB;
    colorz: white;
    }

    </style>
  ";
  return $main;
}
}
################################################################################
#  	燈箱打包碼(內容,標題)
#
#
#
################################################################################
if(!function_exists("show_lytebox_html")){
function show_lytebox_html($content,$title){
  global $xoopsModule;
  # ---- 取得模組目錄名稱 ---------------
  $MDIR=$xoopsModule->getVar('dirname');
  # -------------------------------------
  $main="
       <html>
       <head>
         <meta http-equiv='content-type' content='text/html; charset=utf-8'>
         <link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/tadtools/bootstrap/css/bootstrap.css'>
         <link rel='stylesheet' type='text/css' media='screen' href='".XOOPS_URL."/modules/{$MDIR}/css/module.css'>
         <title>{$title}</title>
         </head>
         <body>
         <div style='text-align: center;'><h2>{$title}</h2></div>
         {$content}
        </body></html>
       ";
  return $main;
}
}
################################################################################
#  	燈箱打包碼(內容,標題)
#
#
#
################################################################################
if(!function_exists("fancybox_code")){
function fancybox_code(){
  $main="
  <style>
    li{list-style: none;} /* fancybox */  
  </style> 
	<script type='text/javascript' src='".XOOPS_URL."/modules/tadtools/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js'></script>
  <script type='text/javascript' language='javascript' src='".XOOPS_URL."/modules/tadtools/fancyBox/source/jquery.fancybox.js?v=2.1.4'></script>
  <link rel='stylesheet' href='".XOOPS_URL."/modules/tadtools/fancyBox/source/jquery.fancybox.css?v=2.1.4' type='text/css' media='screen' />
	<link rel='stylesheet' type='text/css' href='".XOOPS_URL."/modules/tadtools/fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5' />
	<script type='text/javascript' src='".XOOPS_URL."/modules/tadtools/fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5'></script>
	<link rel='stylesheet' type='text/css' href='".XOOPS_URL."/modules/tadtools/fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7' />
	<script type='text/javascript' src='".XOOPS_URL."/modules/tadtools/fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7'></script>
	<script type='text/javascript' src='".XOOPS_URL."/modules/tadtools/fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.5'></script>
  ";
  return $main;
}
}

################################################################################
#  	燈箱打包碼(內容,標題)
#
#
#
################################################################################
if(!function_exists("colorbox_code")){
function colorbox_code(){
  global $xoopsModule;
  # ---- 取得模組目錄名稱 ---------------
  $MDIR=$xoopsModule->getVar('dirname');
  # -------------------------------------
  $main="
		<link rel='stylesheet' href='".XOOPS_URL."/modules/{$MDIR}/class/colorbox/colorbox.css' />
		<script src='".XOOPS_URL."/modules/{$MDIR}/class/colorbox/jquery.colorbox.js'></script>
		<script src='".XOOPS_URL."/modules/{$MDIR}/class/colorbox/jquery.colorbox-zh-TW.js'></script>
  ";
  return $main;
}
}
//錯誤顯示方式
if(!function_exists("show_error")){
  function show_error($sql=""){
  	if(_TAD_NEWS_ERROR_LEVEL==1){
  		return mysql_error()."<p>$sql</p>";
  	}elseif(_TAD_NEWS_ERROR_LEVEL==2){
  		return mysql_error();
  	}elseif(_TAD_NEWS_ERROR_LEVEL==3){
  		return "sql error";
  	}
  	return;
  }
}
###############################################################################
# 轉西元 ，後面參數為分隔符號自訂
#
#
#
###############################################################################
function dateTo_ad($in_date, $in_txt="-"){
  $date=explode($in_txt,$in_date);
  $date[0]=$date[0]+1911;
  $date=$date[0].$in_txt.$date[1].$in_txt.$date[2];
  return $date;
} 
###############################################################################
# 轉民國，後面參數為分隔符號自訂
#  $in_date -> 使用者的時間戳記 xoops_getUserTimestamp(time())
#
#
###############################################################################
function dateTo_c($in_date, $in_txt="-"){
  if(!$in_date)return;
  $date=getdate($in_date);
  $year=str_pad($date['year']-1911,3,'0',STR_PAD_LEFT);   #取得年
  $mon=str_pad($date['mon'],2,'0',STR_PAD_LEFT);          #取得月 
  $mday=str_pad($date['mday'],2,'0',STR_PAD_LEFT);        #取得日   
  $date = $year.$in_txt.$mon.$in_txt.$mday; 
  return $date;
}
?>
