<?
	include("include/connect.php");
	$sql="SELECT set_logo, set_title, set_description, set_keyword FROM setting";
	$result=mysql_query($sql) or die (mysql_error());
	list($set_logo, $set_title, $set_description, $set_keyword)=mysql_fetch_row($result);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<? echo $set_description?>">
	<link href="images/<? echo $set_logo; ?>" rel="shortcut icon" type="image/x-icon" />
    <title><? echo $set_title; ?></title>
    
	<!-- MetisMenu CSS -->
	<link href="css/style.css" rel="stylesheet">

</head>

<body>
	<div id="bg_header">
	</div>
    
	<div id="container">
    
		<div id="header">
        	<div id="header_top">
            </div>
            <div id="header_center">
            	<div id="logo">
            		<img src="image/logo.png" width="243" height="51">
            	</div>
                <div id="nav">
                	<ul>
                    	<li><a href="index.php"><div class="nav_manu nav_th">หน้าแรก</div><span class="nav_eng">MAIN</span></a></li>
                    	<li><a href="about.php"><div class="nav_manu nav_th">เกี่ยวกับ</div><span class="nav_eng">ABOUT</span></a></li>
                    	<li><a href="service.php"><div class="nav_manu nav_th">บริการ</div><span class="nav_eng">SERVICE</span></a></li>
                    	<li><a href="contact.php"><div class="nav_manu nav_th">ติดต่อ</div><span class="nav_eng">CONTACT US</span></a></li>
                    	<li><a href="webboard.php"><div class="nav_manu nav_th">เว็บบอร์ด</div><span class="nav_eng">WEBBOARD</span></a></li>
                    </ul>
                </div>
            </div>
            <div id="header_bottom">
            </div>
		</div>
        
        <div id="about">
      <?	$sql_news="SELECT * FROM news WHERE news_id='$_GET[news_id]' ";	
				$result_news=mysql_query($sql_news) or die (mysql_error());
				list($News_ID	, $News_Title, $News_Detail, $News_Image, $News_Date)=mysql_fetch_row($result_news);
		?>
            <h1 class="head">News</h1>
            <div class="gray-line"></div>
            <!-- ข้อมูลเกี่ยวกับข่าว-->
            <img src="2147490512/<? echo $News_Image;?>" width="200" style="float:left; padding:10px;">
            <div style="padding-top:10px;"><h3><? echo $News_Title; ?></h3><? echo $News_Detail; ?></div>
            <div class="gray-line"></div>
            <div style="text-align:right;">เมื่อ <? echo $News_Date; ?></div>
        </div>
        
        <div id="footer">
        <span style="float:left;">Copyright © _________________________</span>
        <span style="float:right;">Computer Information System Department, Faculty of Business Administration and Liberal Arts</span><br>
        <span style="float:right;"> Rajamangala University of Technology Lanna Chiang Mai</span>
        </div>
    </div>
</body>
</html>