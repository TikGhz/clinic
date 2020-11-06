<?
	if($_POST[d_tid]=="" || $_POST[d_tname]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลเวชภัณฑ์ให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=drug_type&file=main_drug_type';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
			$sql_drug_type="UPDATE drug_type SET		Drug_Type_Name='$_POST[d_tname]' WHERE Drug_Type_ID='$_POST[d_tid]' ";
			
			if(mysql_query($sql_drug_type) or die (mysql_error())){
				$_SESSION[success]="แก้ไขข้อมูลประเภทของเวชภัณฑ์สำเร็จแล้ว";
				echo "<script type='text/javascript'>window.location='index_panel.php?module=drug_type&file=main_drug_type';</script>";
			}
			else{
				$_SESSION[error]="ไม่สามารถแก้ไขข้อมูลประเภทของเวชภัณฑ์ได้";
				echo "<script type='text/javascript'>window.location='index_panel.php?module=drug_type&file=main_drug_type';</script>";
			}
	}
?>