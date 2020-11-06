<?
	if($_POST[u_id]=="" || $_POST[rave_detail]=="" || $_POST[rave_price]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=revenue&file=form_revenue';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
		
		$sql="INSERT INTO revenue VALUES(			'',
																	'$_POST[u_id]', 
																	'0', 
																	'$_POST[rave_detail]', 
																	'$_POST[rave_price]', 
																	'3', 
																	'$add_time'
															)";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="เพิ่มข้อมูลสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=revenue&file=main_revenue';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถเพิ่มข้อมูลทันตแพทย์ได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=revenue&file=form_revenue';</script>";
		}

	}
?>