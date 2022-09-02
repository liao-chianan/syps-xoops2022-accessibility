<?php
//made by lcn 2014
//edit by lcn 20220815


$schoolname='雙園國小';
$schooladdr='[108]臺北市萬華區莒光路315號';
$schoolnum='(02)23061893';
$schoolfax='(02)23064375';
$schoolmail='mailus@syps.tp.edu.tw';

echo '<html lang="zh-TW"><head>
<meta charset="UTF-8">
<title>'.$schoolname.'-不支援Javascript時之替代頁面</title>
</head>';


require 'mainfile.php';
echo '<h1>'.$schoolname.'網站</h1>';
echo "<h2>本頁面為使用者使用環境不支援JavaScript時之替代頁面</h2><br>";
echo '<span style="font-size: 1.1rem;font-weight: bold;">網站選單</span><br>';
header("Content-Type:text/html; charset=utf-8");


    $dbhost = XOOPS_DB_HOST;	
    $dbuser = XOOPS_DB_USER;
    $dbpass = XOOPS_DB_PASS;
    $dbname = XOOPS_DB_NAME;
	//echo $dbhost;
	//echo $dbuser;
	//echo $dbpass;
	//echo $dbname;

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);//連接xoops資料庫
    mysqli_query( $conn, "SET NAMES 'utf8'");//設定語系
    //mysql_select_db($dbname);
    $sql = "SELECT * FROM  xx_tad_themes_menu  WHERE status=1 order by position";//查詢
        $result = mysqli_query($conn, $sql) or die('MySQL query error');
        $num_rows_i = mysqli_num_rows($result); //查得列數

        echo '<table style="border: 1px solid;"><tr style="font-size:0.9rem;">';

        while($row = mysqli_fetch_array($result)){//印出資料
           if($row['of_level']==0) echo '<td style="vertical-align: top;padding: 10px;">';

           if(strlen($row['itemurl'])<=4)
           {
           echo "::".$row['itemname']."<br>";
           }
           else
           {
                echo "<a href=".$row['itemurl']." title=".$row['itemname']."[另開新視窗] alt=".$row['itemname']." target=_blank >[".$row['itemname']."]</a><br>";
                };
        }
      echo "</tr></table>";
	 echo '<br><br>';
	 echo '<span style="font-size: 1.1rem;font-weight: bold;">本站消息</span><br>';
	 $newsql = "select * from xx_tad_news ORDER BY  `start_day` DESC LIMIT 0 , 50";//查詢
	 $newresult = mysqli_query($conn, $newsql) or die('MySQL query error');
	 while($newrow = mysqli_fetch_array($newresult)){//印出資料	
	   echo "<br>";		
        echo '<span style="font-size: 0.9rem;">'.substr($newrow['start_day'], 0,10).'</span>';
	   echo $newrow['tag'];
        echo ' <span style="font-size: 0.9rem;"><a href=/modules/tadnews/index.php?nsn='.$newrow['nsn'].' target=_blank title='.$newrow['news_title'].'[另開新視窗]>'.$newrow['news_title'].'</span></a>';
	 }
	 echo '<br><br><br><span style="font-size: 1.1rem;font-weight: bold;">聯絡方式</span><br>';
      echo '<br>地址:'.$schooladdr.'<br>連絡電話:'.$schoolnum.'<br>傳真號碼:'.$schoolfax.'<br>服務信箱:'.$schoolmail;
	  
//釋放記憶體並關閉連線
mysqli_free_result($result);
mysqli_free_result($newresult);
mysqli_close($conn);

echo '</html>';
?>
