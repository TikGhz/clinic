<?
	if($_POST[d_tname]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลเวชภัณฑ์ให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=drug_type&file=main_drug_type';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
			$sql_drug_type="INSERT INTO drug_type VALUES(	'',
																						'$_POST[d_tname]', 
																					)";
			if(mysql_query($sql_drug_type) or die (mysql_error())){
				$_SESSION[success]="เพิ่มข้อมูลเวชภัณฑ์สำเร็จแล้ว";
				echo "<script type='text/javascript'>window.location='index_panel.php?module=drug_type&file=main_drug_type';</script>";
			}
			else{
				$_SESSION[error]="ไม่สามารถเพิ่มข้อมูลเวชภัณฑ์";
				echo "<script type='text/javascript'>window.location='index_panel.php?module=drug_type&file=main_drug_type';</script>";
			}
	}
?>