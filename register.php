<?
	include("include/connect.php");
	$sql="SELECT set_logo, set_title, set_description, set_keyword FROM setting";
	$result=mysql_query($sql) or die (mysql_error());
	list($set_logo, $set_title, $set_description, $set_keyword)=mysql_fetch_row($result);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<? echo $set_description?>">
	<link href="images/<? echo $set_logo; ?>" rel="shortcut icon" type="image/x-icon" />
    <title><? echo $set_title; ?></title>
    
	<!-- MetisMenu CSS -->
	<link href="css/style.css" rel="stylesheet">
	
    <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css" />
    
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
	<style type="text/css">
		.input-group .form-control {
			width: 95%;
			margin-bottom: 0;
		}
		.form-control {
			display: inline;
			width: 100%;
			padding: 5px 5px;
			font-size: 14px;
			color: #555555;
			vertical-align: middle;
			background-color: #ffffff;
			border: 1px solid #cccccc;
			border-radius: 4px;
			-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
			-webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
			transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
		}
	</style>
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
            <h1 class="head">Register</h1>
            <div class="gray-line" style="margin-bottom:15px;"></div>
            <!-- ข้อมูลการสมัครสมาชิกใหม่ -->
<div class="row">
                            
                            	<form role="form" method="post" action="insert_user.php" enctype="multipart/form-data" data-toggle="validator">
                                <div class="col-lg-6">
                                	<div class="well">
                                    	<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <input type="text" class="form-control" name="u_idcard" placeholder="รหัสบัตรประชาชน 13 หลัก" data-aslength="13"  required>
                                        </div>
                                        
                                    	<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="u_username" placeholder="ชื่อผู้ใช้ มากกว่า 5 ตัวอักษร" data-minlength="5"required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="text" class="form-control" name="u_password" placeholder="รหัสผ่าน มากกว่า 5 ตัวอักษร" data-minlength="5" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="u_nickname" placeholder="ชื่อเล่น" required>
                                        </div>
                                        
									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                	<div class="well">
                                        <div class="form-group">
                                        	<input type="hidden" name="u_type_id" value="3">
                                            <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
                                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                        </div>
                                    </div>
                                </div>
                                
                                </form>
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
        </div>
        
        <div id="footer">
        <span style="float:left;">Copyright © _________________________</span>
        <span style="float:right;">Computer Information System Department, Faculty of Business Administration and Liberal Arts</span><br>
        <span style="float:right;"> Rajamangala University of Technology Lanna Chiang Mai</span>
        </div>
    </div>
    <script>
	if($("#p_diseases1").prop('checked')){
		$("#symptoms").prop('disabled', true);
		$("#mySel2").prop('disabled', true);
	}
	function onenable(){
		$("#symptoms").prop('disabled', true);
		$("#mySel2").prop('disabled', true);
	}
	function offenable(){
		$("#symptoms").prop('disabled', false);
		$("#mySel2").prop('disabled', false);
	}
	</script>
    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>
	<!-- Validator -->
    <script type="text/javascript" src="js/validator.js"></script>
</body>
</html>