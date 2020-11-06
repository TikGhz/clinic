<?
	if($_POST[u_id]=="" || $_POST[work_time]=="" || $_POST[work_enter]=="" || $_POST[work_out]=="" || $_POST[work_color]==""){
		$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=work&file=edit_work&wid=$_POST[work_id]';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
		
						$sql="UPDATE work SET					User_ID='$_POST[u_id]', 
																				Work_Date='$_POST[work_time]', 
																				Work_Enter='$_POST[work_enter]', 
																				Work_Out='$_POST[work_out]', 
																				Work_Color='$_POST[work_color]'
													WHERE Work_ID='$_POST[work_id]' 
										";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="อัพเดทข้อมูลวัน/เวลาทำงานสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=work&file=main_work';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถอัพเดทข้อมูลวัน/เวลาทำงานได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=work&file=edit_work&wid=$_POST[work_id]';</script>";
		}

	}
?>