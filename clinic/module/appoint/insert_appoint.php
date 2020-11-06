<?
	if($_POST[u_id]=="" || $_POST[p_id]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลใบนัดให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=appoint&file=form_appoint';</script>";
	}else{
		$add_time=date("Y-m-d H:i:s");
		
		$sql="INSERT INTO appointment VALUES(	'',
																		'$_POST[u_id]', 
																		'$_POST[p_id]', 
																		'$_POST[a_detail]', 
																		'$_POST[a_time]', 
																		'$_POST[a_status]',
																		'$add_time'
																)";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="เพิ่มข้อมูลใบนัดสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=appoint&file=main_appoint';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถเพิ่มข้อมูลใบนัดได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=appoint&file=form_appoint';</script>";
		}

	}
?>