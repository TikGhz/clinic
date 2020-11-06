<?
	session_start();
	include("include/connect.php");
	$sql="SELECT set_logo, set_title, set_description, set_keyword FROM setting";
	$result=mysql_query($sql) or die (mysql_error());
	list($set_logo, $set_title, $set_description, $set_keyword)=mysql_fetch_row($result);
	
	$sql_con="SELECT * FROM set_contact";
	$result_con=mysql_query($sql_con) or die (mysql_error());
	list($Address, $Email, $Telephone, $Facebook, $Google, $Twitter, $Instagram, $Youtube, $Map)=mysql_fetch_row($result_con);
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
        
        <div id="contact">
            <h1 class="head">Contact Us</h1>
            <div class="gray-line"></div>
            
            	<div class="col1">
                    <div class="contact-inn">
                        <span class="icon address-icon"></span>
                        <div>
                            <span class="purple-color">Address:</span>
                            <? echo $Address; ?>
                        </div>
                    </div>
                    <div class="clear height20"></div>
                    <div class="contact-inn">
                        <span class="icon email-icon"></span>
                        <div>
                            <span class="org-color">E-Mail:</span>
                            <? echo $Email; ?>
                        </div>
                    </div>
                    <div class="contact-inn">
                        <span class="icon tel-icon"></span>
                        <div>
                            <span class="green-color">Telephone:</span>
                            <? echo $Telephone; ?>
                        </div>
                    </div>
                </div>
                
                <div class="col2">
                    <div class="contact-inn">
                        <a href="<? echo $Facebook; ?>">
                        <span class="icon facebook-icon"></span>
                        <div>
                            <span class="facebook-color">Facebook</span>
                        </div>
                        </a>
                    </div>
                    <div class="contact-inn">
                        <a href="<? echo $Google; ?>">
                        <span class="icon google-icon"></span>
                        <div>
                            <span class="google-color">Google</span>
                        </div>
                        </a>
                    </div>
                    <div class="contact-inn">
                        <a href="<? echo $Twitter; ?>">
                        <span class="icon twitter-icon"></span>
                        <div>
                            <span class="twitter-color">Twitter</span>
                        </div>
                        </a>
                    </div>
                    <div class="contact-inn">
                        <a href="<? echo $Instagram; ?>">
                        <span class="icon instagram-icon"></span>
                        <div>
                            <span class="instagram-color">Instagram</span>
                        </div>
                        </a>
                    </div>
                    <div class="contact-inn">
                        <a href="<? echo $Youtube; ?>">
                        <span class="icon youtube-icon"></span>
                        <div>
                            <span class="youtube-color">Youtube</span>
                        </div>
                        </a>
                    </div>
                </div>
        		
                <div class="col3">
                    <div class="contact-inn">
                        <span class="icon contact-icon"></span>
                        <div>
                            <span class="contact-color">Contact Form</span>
                            กรุณากรอกข้อมูลอย่างครบถ้วน เพื่อความสะดวกในการติดต่อกลับ
                        </div>
                        <div class="clear height20"></div>
                        <? 	if($_SESSION[warning]!=""){ 
									echo "<span class='icon'></span><div style='color:red';>",$_SESSION[warning],"</div>"; 
									$_SESSION[warning]="";
								}
								if($_SESSION[success]!=""){ 
									echo "<span class='icon'></span><div style='color:red';>",$_SESSION[success],"</div>"; 
									$_SESSION[success]="";
								}
								if($_SESSION[error]!=""){ 
									echo "<span class='icon'></span><div style='color:red';>",$_SESSION[error],"</div>"; 
									$_SESSION[error]="";
								}
						?>
                        <form action="insert_contact.php" method="post" enctype="multipart/form-data">
                            <input type="text" name="name" value="" placeholder="Your name">
                            <input type="text" name="telephone" value="" placeholder="Telephone">
                            <input type="text" name="email" value="" placeholder="Email">
                            <input type="text" name="subject" value="" placeholder="Subject">
                            <textarea name="enquiry" placeholder="Message"></textarea>
                            <div class="clear"></div>
                            <div class="left"><input type="submit" value="ส่ง" style="background-color: #894754; color:#FFF;"></div>
                        </form>
                        
                    </div>
                </div>
        
        		<div class="clear height30"></div>
                <div class="contact-map-area">
                <iframe width="984" height="233" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<? echo $Map; ?>"></iframe>
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