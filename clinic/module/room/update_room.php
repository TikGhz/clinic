<?
	if($_POST[rid]==""){//ตรวจสอบค่าว่างทั้งหมด
		if($_GET[ut]==doctor){
			$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=check_patient';</script>";
		}else{
			$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=room&file=main_room';</script>";
		}
	}else{
						if($_POST[uid]==""){ $_POST[uid]="0"; $_POST[r_status]="ว่าง";}
		
						$sql="UPDATE room SET		Room_Status='$_POST[r_status]', 
																	User_ID='$_POST[uid]'
																	
										WHERE Room_ID='$_POST[rid]' 
						";

		if(mysql_query($sql) or die (mysql_error())){
			if($_GET[us]==doctor){
				$_SESSION[success]="ออกจากห้องสำเร็จแล้ว";
				echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=check_patient';</script>";
			}elseif($_GET[ut]==doctor){
				$_SESSION[success]="เข้าห้องสำเร็จแล้ว";
				echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=check_patient';</script>";
			}else{
				$_SESSION[success]="อัพเดทข้อมูลห้องสำเร็จแล้ว";
				echo "<script type='text/javascript'>window.location='index_panel.php?module=room&file=main_room';</script>";
			}
		}
		else{
			if($_GET[ut]==doctor){
				$_SESSION[error]="ไม่สามารถเข้าห้องได้";
				echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=check_patient';</script>";
			}else{
				$_SESSION[error]="ไม่สามารถอัพเดทข้อมูลได้";
				echo "<script type='text/javascript'>window.location='index_panel.php?module=room&file=main_room';</script>";
			}
		}

	}
?>