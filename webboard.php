<?
	session_start();
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

    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="src/bootstrap-wysihtml5.css" />
    <script src="lib/js/wysihtml5-0.3.0.js"></script>
    <script src="lib/js/jquery-1.7.2.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="src/bootstrap3-wysihtml5.js"></script>
    
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
            <h1 class="head">
            <a href="webboard.php" style="color: #894754;">Webboard</a>  
			<? if($_GET[topic_id]==""){?>
            <a href="webboard.php?topic=new" style="color: #894754; font-size:15px;">- ตั้งกระทู้ใหม่ </a>
			<? } ?></h1>
            <div class="gray-line"></div>
            <!-- บอร์ด -->
            <div class="box-body">
				<div class="panel panel-default">
					  <div class="panel-body">
                      <?	if($_GET[topic_id]=="" AND $_GET[topic]==""){?>
						<? //กระทู้ทั้งหมด
							$sql_topic="SELECT * FROM webboard_topic ORDER BY topic_id DESC LIMIT 0,20";
							$result_topic=mysql_query($sql_topic) or die (mysql_error());
						?>
						<table class="table table-striped table-blog">
							<thead>
								<tr>
                                    <th style="width:5%; text-align:center;">#</th>
                                    <th style="width:55%;">ชื่อกระทู้</th>
                                    <th style="width:10%; text-align:center;">ตอบกระทู้</th>
                                    <th style="width:20%; text-align:center;">ผู้ตั้งกระทู้</th>
                                    <th style="width:10%; text-align:center;">วันที่ตั้งกระทู้</th>
					  			</tr>
							</thead>
							<tbody>
                            <?
							while(list($topic_id, $topic_title, $topic_detail, $topic_date, $topic_user)=mysql_fetch_row($result_topic)){
								list($year1, $month1, $day1)=explode("-","$topic_date");
								$sql_reply="SELECT * FROM webboard_reply WHERE topic_id='$topic_id' ";
								$result_reply=mysql_query($sql_reply) or die (mysql_error());
								$num=mysql_num_rows($result_reply);
							?>
                                <tr>
                                    <td style="text-align:center;"><? echo $topic_id; ?></td>
                                    <td><a href="webboard.php?topic_id=<? echo $topic_id; ?>"><? echo $topic_title; ?></a></td>
                                    <td style="text-align:center;"><? echo $num; ?></td>
                                    <td style="text-align:center;"><? echo $topic_user; ?></td>
                                    <td style="text-align:center;"><? echo $day1,"/", $month1,"/", ($year1+543) ; ?></td>
                                </tr>
                            <?	}	?>
							</tbody>
						</table>
                      <?	} ?>
                      <?	if($_GET[topic_id]!=""){?>
						<? //ตอบกระทู้
							$sql_topic1="SELECT * FROM webboard_topic WHERE topic_id='$_GET[topic_id]'";
							$result_topic1=mysql_query($sql_topic1) or die (mysql_error());
							list($topic_id, $topic_title, $topic_detail, $topic_date, $topic_user)=mysql_fetch_row($result_topic1);
							list($year1, $month1, $day1)=explode("-","$topic_date");
						?>
						<table class="table table-striped table-blog">
							<thead>
								<tr>
                                    <th style="text-align:left; color: #894754; border-bottom: 2px solid #D3C69A;"><? echo $topic_title; ?> โดย <? echo $topic_user; ?></th>
                                    <th style="text-align:right; color: #894754; border-bottom: 2px solid #D3C69A;">เมื่อ <? echo $day1,"/", $month1,"/", ($year1+543) ; ?></th>
					  			</tr>
							</thead>
							<tbody>
                            	<tr>
                                    <td style="text-align:left; padding:20px; border:1px solid #D3C69A; color:#333;" colspan="3">
										<div style="color: #333; padding:5px;"><? echo $topic_detail; ?></div>
                                    </td>
                                </tr>
							<?
                                $sql_reply1="SELECT * FROM webboard_reply WHERE topic_id='$_GET[topic_id]' ";
                                $result_reply1=mysql_query($sql_reply1) or die (mysql_error());
								$num=1;
                                while(list($topic_id, $reply_id, $reply_detail, $reply_date, $reply_user)=mysql_fetch_row($result_reply1)){
									list($date1, $date2)=explode(" ","$reply_date");
									list($year1, $month1, $day1)=explode("-","$date1");
									list($hour1, $minute1, $seconds1)=explode(":","$date2");
                            ?>
                                <tr>
                                    <td style="text-align:left; padding:20px; border:1px solid #D3C69A; color:#333;" colspan="3">
										<span style="color: #F69;">ความคิดเห็นที่ : <? echo $reply_id; ?></span>
                                        <div class="gray-line"></div>
										<div style="color: #333; padding:5px;"><? echo $reply_detail; ?></div>
                                        <div class="gray-line"></div>
                                        <span style="color: #F60;">โดย : <? echo $reply_user; ?></span> 
                                        <span style="color: #93C;">เมื่อ : <? echo $day1,"/", $month1,"/", ($year1+543) ," ", $hour1,":", $minute1,":", $seconds1; ?></span>
                                    </td>
                                </tr>
                            <?
								$num++;
								}
                            ?>
							</tbody>
                            <tfoot>
                            	<tr>
                                    <td style="text-align:left; padding:20px; border:1px solid #D3C69A; color:#333;" colspan="3">
                                    <form action="insert_webboard.php" method="post">
                                    	<div style="color: #F69;">ตอบกระทู้ใหม่ </div>
                                        <div class="gray-line" style="margin-bottom:10px;"></div>
                                        <? if($_SESSION[login_status]=="valid_user"){?>
                                    	<input name="topic_id" type="hidden" value="<? echo $_GET[topic_id];?>">
                                        <input name="reply_num" type="hidden" value="<? echo $num;?>">
                                        <textarea name="reply_detail" class="textarea form-control" placeholder="..." style="width: 100%; height: 100px"></textarea>
										<div style="color: #333; padding:5px;"><? echo $reply_detail; ?></div>
                                        <div class="gray-line"></div>
                                        <input name="insert_reply" type="submit" class="btn btn-success" value="ส่งข้อความ">
                                        <span style="color: #F60;">
                                        	โดย : <input name="reply_user" type="text" class="form-control" placeholder="โปรดระบุ" style="display:inherit; width:200px;" readonly value="<? echo $_SESSION[login_name]; ?>">
                                        </span>
                                        <? }else{?>
                                        <div style="color: red;"><a href="index.php">กรุณาล็อคอินก่อนจะตอบค่ะ คลิกที่นี่</a></div>
                                        <? }	?>
                                    </form>
                                    </td>
                                </tr>
                            </tfoot>
						</table>
                      <?	}	?>
                      <?	if($_GET[topic]=="new"){?>
                      	<table class="table table-striped table-blog">
                      		<tfoot>
                            	<tr>
                                    <td style="text-align:left; padding:20px; border:1px solid #D3C69A; color:#333;" colspan="3">
                                    <form action="insert_webboard.php" method="post">
										<div style="color: #F69;">ตั้งกระทู้ใหม่ </div>
                                        <div class="gray-line" style="margin-bottom:10px;"></div>
                                        <? if($_SESSION[login_status]=="valid_user"){?>
                                        <input name="topic_title" type="text" class="form-control" placeholder="หัวข้อใหม่" style="margin-bottom:10px;">
                                        <textarea name="topic_detail" class="textarea form-control" placeholder="..." style="width: 100%; height: 100px"></textarea>
										<div style="color: #333; padding:5px;"><? echo $reply_detail; ?></div>
                                        <div class="gray-line"></div>
                                        <input name="insert_reply" type="submit" class="btn btn-success" value="ส่งหัวข้อ">
                                        <span style="color: #F60;">
                                        	โดย : <input name="topic_user" type="text" class="form-control" placeholder="โปรดระบุ" style="display:inherit; width:200px;" readonly value="<? echo $_SESSION[login_name]; ?>">
                                        </span>
                                        <? }else{?>
                                        <div style="color: red;"><a href="index.php">กรุณาล็อคอินก่อนจะตั้งกระทู้ค่ะ คลิกที่นี่</a></div>
                                        <? }	?>
                                    </form>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                      <?	}	?>
					  </div>
				</div>
				
			</div>
        </div>
        
        <div id="footer">
        <span style="float:left;">Copyright © _________________________</span>
        <span style="float:right;">Computer Information System Department, Faculty of Business Administration and Liberal Arts</span><br>
        <span style="float:right;"> Rajamangala University of Technology Lanna Chiang Mai</span>
        </div>
    </div>
    
<script>
    $('.textarea').wysihtml5();
</script>

<script type="text/javascript" charset="utf-8">
    $(prettyPrint);
</script>

</body>
</html>