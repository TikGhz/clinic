<?
	if($_POST[u_idcard]=="" || $_POST[u_username]=="" || $_POST[u_password]=="" || $_POST[u_nickname]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='register.php';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");

		$sql="INSERT INTO user VALUES(			'',
																	'$_POST[u_idcard]', 
																	'$_POST[u_username]', 
																	'$_POST[u_password]', 
																	'', 
																	'', 
																	'', 
																	'', 
																	'$_POST[u_nickname]', 
																	'', 
																	'', 
																	'', 
																	'', 
																	'', 
																	'', 
																	'', 
																	'', 
																	'', 
																	'', 
																	'5'
															)";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="สมัครสมาชิกสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='register.php';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถสมัครสมาชิกได้";
			echo "<script type='text/javascript'>window.location='register.php';</script>";
		}

	}
?>