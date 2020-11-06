<?
	if($_SESSION[login_status]!="valid_user"){
		$_SESSION[warning]="กรุณาเข้าสู่ระบบใหม่อีกครั้งค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=employee&file=main_employee';</script>";
	}
	elseif($_SESSION[login_type]!='1'){
		$_SESSION[warning]="ระดับสิทธิ์ของคุณไม่สามารถใช้งานในส่วนนี้ได้ค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=employee&file=main_employee';</script>";
	}
	elseif($_GET[uid]=="" || $_GET[uid]=="1"){
		$_SESSION[warning]="กรุณาใส่ข้อมูล.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=employee&file=main_employee';</script>";
	}
	else{
		if($_SESSION[login_type]=='1'){
			
			$sql="DELETE FROM user WHERE User_ID='$_GET[uid]'";
				
				if(mysql_query($sql) or die (mysql_error())){
					$_SESSION[success]="ลบข้อมูลพนักงานเรียบร้อยแล้ว";
					mysql_close();
					echo "<script type='text/javascript'>window.location='index_panel.php?module=employee&file=main_employee';</script>";
				}
				else{
					$_SESSION[error]="ลบข้อมูลพนักงานไม่สำเร็จ กรุณาตรวจสอบใหม่อีกครั้งค่ะ";
					mysql_close();
					echo "<script type='text/javascript'>window.location='index_panel.php?module=employee&file=main_employee';</script>";
				}
			mysql_free_result();
			mysql_close();
		}
	}
?>