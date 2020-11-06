<?
	if($_POST[d_id]=="" || $_POST[d_name]=="" || $_POST[d_type_id]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=drug&file=edit_drug&did=$_POST[d_id]';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
		
						$sql="UPDATE drug SET			Drug_Name='$_POST[d_name]', 
																	Drug_Detail='$_POST[d_detail]', 
																	Drug_Type_ID='$_POST[d_type_id]', 
																	Drug_Unit='$_POST[d_unit]', 
																	Drug_Cost_Price='$_POST[d_cprice]', 
																	Drug_Price='$_POST[d_price]', 
													WHERE Drug_ID='$_POST[d_id]' 
										";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="แก้ไขข้อมูลสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=drug&file=edit_drug&did=$_POST[d_id]';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถแก้ข้อมูลได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=drug&file=edit_drug&did=$_POST[d_id]';</script>";
		}

	}
?>