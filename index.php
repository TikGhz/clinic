<?
	session_start();
	include("include/connect.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>คลีนิคทันตกรรมทันตแพทย์ทองฉัตร</title>
    
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
        
        <div id="main">
   	  <div id="service_quick">
            	<h5>SERVICE <span style="color:#FC0;">QUICK LINK</span></h5>
            	<ul style="padding-top:10px;">
                	<li><a href="register.php">สมัครสมาชิกใหม่</a></li>
                	<li><a href="search_appoint.php">ค้นหาใบนัด</a></li>
                	<li><a href="table_work.php">ตารางการทำงาน</a></li>
                	<li><a href="http://www.colgate.co.th/app/CP/TH/TH/OC/Information/Articles/Oral-and-Dental-Health-Basics/Oral-Hygiene.cvsp">ความรู้เกี่ยวกับช่องปาก</a></li>
                	<li><a href="http://www.colgate.co.th/app/CP/TH/TH/OC/Information/Popular-Topics.cvsp">คำถามที่พบบ่อย</a></li>
                </ul>
        	<img src="image/promotion.png" width="215" height="110" style="position:absolute; margin-top:10px;">
        </div>
            
            <div id="login">
            <?	if($_SESSION[login_status]!="valid_user"){	?>
            	<form action="check_signin.php" method="post">
                	<div style="padding:4px; display:block; margin-left:55px; margin-top:30px; font-size:15px; font-weight:600;">MEMBER LOGIN</div>
                    <div style="padding:4px; display:block; margin-left:55px; margin-top:10px; position:absolute; font-size:12px;">ID</div>
                    <div style="padding:4px; display:block; margin-left:55px; margin-top:45px; position:absolute; font-size:12px;">PASS</div>
                	<input name="username" type="text" style="padding:4px; display:block; border:1px solid #ddd; margin-left:100px; margin-top:10px;">
                    <input name="password" type="password" style="padding:4px; display:block; border:1px solid #ddd; margin-left:100px; margin-top:10px;">
                    <input name="signin" type="submit" value="เข้าสู่ระบบ" style="padding:4px; display:block; border:1px solid #ddd; margin-left:213px; margin-top:17px;">
                </form>
            <?	}else{	?>
            	<form action="logout.php" method="post">
					<div style="padding:4px; display:block; margin-left:55px; margin-top:30px; font-size:15px; font-weight:600;">MEMBER ZONE</div>
                    <div style="padding:4px; display:block; margin-left:55px; margin-top:10px; position:absolute; font-size:12px;">ID : <? echo $_SESSION[login_name];?></div>
                    <div style="padding:4px; display:block; margin-left:55px; margin-top:45px; position:absolute; font-size:12px;">Name : <? echo $_SESSION[login_nickname]; ?></div>
                    <input name="logout" type="submit" value="ออกจากระบบ" style="padding:4px; display:block; border:1px solid #ddd; margin-left:213px; margin-top:95px;">
					<?	if($_SESSION[login_type]==1 || $_SESSION[login_type]==2 || $_SESSION[login_type]==3 || $_SESSION[login_type]==4){	?>
					<a href="clinic/index_panel.php?module=dashboard&file=main_dashboard">
                    <input type="button" value="เข้าหลังบ้าน" style="padding:4px; display:block; border:1px solid #ddd; margin-left:133px; margin-top:-28.5px;">
                    </a>
					<? }	?>

            	</form>
			<?	} ?>
            </div>
            
            <div id="content">
            	<h5 style="border-bottom:1px solid #d9d9d9; padding:7px; padding-left:0px;">
                	<span style="border:1px solid #d9d9d9; border-bottom:1px solid #FFF;  padding:7px; "> ข่าวประกาศ </span>
                </h5>
                <ul>
                <?
					$sql="SELECT * FROM news ORDER BY News_ID DESC LIMIT 0,4";
					$result=mysql_query($sql) or die (mysql_error());
					while(list($News_ID, $News_Title, $News_Detail, $News_Image ,$News_Date)=mysql_fetch_row($result)){
						list($day1, $time1)=explode(" ","$News_Date");
						list($y, $m, $d)=explode("-","$day1");
				?>
                	<li><a href="news.php?news_id=<? echo $News_ID; ?>"><? echo $News_Title; ?> <span style="float:right;"><? echo $d,"-",$m,"-",($y+543);?></span></a></li>
                <?
					}
				?>
                	<div class="gray-line"></div>
                	<li><a href="news.php"><span style="float:right;">ดูทั้งหมด</span></a></li>
                </ul>
            </div>
            
        </div>
        
        <div id="footer">
        <span style="float:left;">Copyright © _________________________</span>
        <span style="float:right;">Computer Information System Department, Faculty of Business Administration and Liberal Arts</span><br>
        <span style="float:right;"> Rajamangala University of Technology Lanna Chiang Mai</span>
        </div>
    </div>
</body>
</html>