<?
	if($_POST[u_id]=="" || $_POST[p_id]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลทันตแพทย์ให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=appoint&file=edit_appoint&aid=$_POST[a_id]';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
		
						$sql="UPDATE appointment SET			User_ID='$_POST[u_id]', 
																				Pat_ID='$_POST[p_id]', 
																				App_Detail='$_POST[a_detail]', 
																				App_Time='$_POST[a_time]', 
																				App_Status='$_POST[a_status]', 
													WHERE App_ID='$_POST[a_id]' 
										";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="แก้ไขข้อมูลสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=appoint&file=edit_appoint&aid=$_POST[a_id]';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถแก้ข้อมูลได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=appoint&file=main_appoint&aid=$_POST[a_id]';</script>";
		}

	}
?>