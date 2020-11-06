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
    
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">

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
            <h1 class="head">Search</h1>
            <div class="gray-line"></div>
            <!-- ข้อมูลการค้นหา -->
            <form action="search_appoint.php" method="post">
				<div class="form-group input-group" style="width:100%; margin-top:15px;">
                <label style="color:#F6C;">ค้นหาใบนัด : </label>
					<input name="search_appoint" type="text" class="form-control" placeholder="ค้นหาได้จากบัตรประจำตัวประชาชนเท่านั้นค่ะ" style="padding:5px; width:80%; height:20px; line-height:20px; margin-left:5px;">
                    <input name="search" type="submit" class="btn btn-success" value="ค้นหาข้อมูล" style="margin-left:5px;">
				</div>
            </form>
            <?	if($_POST[search_appoint]!=""){	?>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$result_patient=mysql_query("SELECT Pat_ID FROM patient WHERE Pat_ID_Card='$_POST[search_appoint]' ");
								list($Pat_ID)=mysql_fetch_row($result_patient);
								$result_appoint=mysql_query("SELECT App_ID, User_ID, Pat_ID, App_Detail, App_Time, App_Status, App_Date FROM appointment WHERE Pat_ID='$Pat_ID' ORDER BY App_ID DESC");
							?>
                            <div class="text-center">
                            	<h3>ตารางเวลานัดหมาย</h3>
                                <h5>คลินิกเปิดเวลา 8:00น. ถึง 17:00น.</h5>
                            </div>
                                <table class="table table-striped table-bordered table-hover" style="border-left:0px;border-right:0px;">
                                    <thead style="border-bottom:1px solid #ddd;">
                                        <tr>
                                            <th class="text-center" width="5%" style="">ลำดับ</th>
                                            <th class="text-center" width="20%" style="">ทันตแพทย์</th>
                                            <th class="text-center" width="20%" style="">ผู้ป่วย</th>
                                            <th class="text-center" width="30%" style="">รายละเอียด</th>
                                            <th class="text-center" width="10%" style="">วันที่/เวลา</th>
                                            <th class="text-center" width="10%" style="">สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?	$i=mysql_num_rows($result_appoint);
								while(list($App_ID, $User_ID, $Pat_ID, $App_Detail, $App_Time, $App_Status, $App_Date)=mysql_fetch_row($result_appoint)){
									
									
									$sql_report_user="SELECT User_Name, User_Lastname FROM user WHERE User_ID='$User_ID' ";
									$result_report_user=mysql_query($sql_report_user) or die (mysql_error());
									list($User_Name, $User_Lastname)=mysql_fetch_row($result_report_user);
									
									$sql_report_patient="SELECT Pat_Name, Pat_Lastname FROM patient WHERE Pat_ID='$Pat_ID' ";
									$result_report_patient=mysql_query($sql_report_patient) or die (mysql_error());
									list($Pat_Name, $Pat_Lastname)=mysql_fetch_row($result_report_patient);
							?>
                                        <tr class="odd gradeX">
                                            <td class="text-center" style=""><? echo $i; ?></td>
                                            <td style=""><? echo $User_Name," ",$User_Lastname; ?></td>
                                            <td style=""><? echo $Pat_Name," ",$Pat_Lastname; ?></td>
                                            <td style=""><? echo $App_Detail ?></td>
                                            <td style="text-align:center;"><? echo $App_Time; ?></td>
                                            <td style="text-align:center;"><? echo $App_Status; ?></td>
                                        </tr>
							<?
								$i--;
								}
							?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
            <?	}	?>
        </div>
        
        <div id="footer">
        <span style="float:left;">Copyright © _________________________</span>
        <span style="float:right;">Computer Information System Department, Faculty of Business Administration and Liberal Arts</span><br>
        <span style="float:right;"> Rajamangala University of Technology Lanna Chiang Mai</span>
        </div>
    </div>
</body>
</html>