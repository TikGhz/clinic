<?
	if($_POST[name]=="" || $_POST[telephone]=="" || $_POST[email]=="" || $_POST[subject]=="" || $_POST[enquiry]==""){//ตรวจสอบค่าว่างทั้งหมด
		session_start();
		$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='contact.php';</script>";
	}else{
		$sql="INSERT INTO contact VALUES(		'',
																	'$_POST[name]', 
																	'$_POST[telephone]', 
																	'$_POST[email]', 
																	'$_POST[subject]', 
																	'$_POST[enquiry]', 
															)";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="เพิ่มข้อมูลติดต่อสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='contact.php';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถเพิ่มข้อมูลติดต่อได้";
			echo "<script type='text/javascript'>window.location='contact.php';</script>";
		}

	}
?>