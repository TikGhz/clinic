<?
	if($_SESSION[login_status]!="valid_user"){
		$_SESSION[warning]="กรุณาเข้าสู่ระบบใหม่อีกครั้งค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=drug&file=main_drug';</script>";
	}
	elseif($_GET[did]=="" || $_GET[did]=="1"){
		$_SESSION[warning]="กรุณาใส่ข้อมูล.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=drug&file=main_drug';</script>";
	}
	else{
			$sql="DELETE FROM drug WHERE Drug_ID='$_GET[did]'";
				
				if(mysql_query($sql) or die (mysql_error())){
					$_SESSION[success]="ลบข้อมูลเวชภัณฑ์เรียบร้อยแล้ว";
					mysql_close();
					echo "<script type='text/javascript'>window.location='index_panel.php?module=drug&file=main_drug';</script>";
				}
				else{
					$_SESSION[error]="ลบข้อมูลไม่สำเร็จ กรุณาตรวจสอบใหม่อีกครั้งค่ะ";
					mysql_close();
					echo "<script type='text/javascript'>window.location='index_panel.php?module=drug&file=main_drug';</script>";
				}
	}
?>