<?
	if($_GET[rid]=="" || $_GET[pid]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=select_doctor&pid=$_GET[pid]';</script>";
	}else{
		$sql="INSERT INTO queue VALUES(		'',
																	'$_GET[pid]', 
																	'$_GET[rid]'
															)";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="เพิ่มคิวผู้ป่วยสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=main_quere';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถเพิ่มคิวผู้ป่วยได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=select_doctor&pid=$_GET[pid]';</script>";
		}
	}
?>