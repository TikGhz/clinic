<?
	if($_SESSION[login_status]!="valid_user"){
		$_SESSION[warning]="กรุณาเข้าสู่ระบบใหม่อีกครั้งค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=doctor&file=main_doctor';</script>";
	}
	elseif($_SESSION[login_type]!='1'){
		$_SESSION[warning]="ระดับสิทธิ์ของคุณไม่สามารถใช้งานในส่วนนี้ได้ค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=doctor&file=main_doctor';</script>";
	}
	elseif($_GET[uid]=="" || $_GET[uid]=="1"){
		$_SESSION[warning]="กรุณาใส่ข้อมูล.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=doctor&file=main_doctor';</script>";
	}
	else{
		if($_SESSION[login_type]=='1'){
			
			$sql="DELETE FROM user WHERE User_ID='$_GET[uid]'";
				
				if(mysql_query($sql) or die (mysql_error())){
					$_SESSION[success]="ลบข้อมูลทันตแพทย์เรียบร้อยแล้ว";
					mysql_close();
					echo "<script type='text/javascript'>window.location='index_panel.php?module=doctor&file=main_doctor';</script>";
				}
				else{
					$_SESSION[error]="ลบข้อมูลทันตแพทย์ไม่สำเร็จ กรุณาตรวจสอบใหม่อีกครั้งค่ะ";
					mysql_close();
					echo "<script type='text/javascript'>window.location='index_panel.php?module=doctor&file=main_doctor';</script>";
				}
			mysql_free_result();
			mysql_close();
		}
	}
?>