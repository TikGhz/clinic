<?
	if($_POST[p_id_card]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=edit_patient&pid=$_POST[pid]';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
		$birthday=$_POST[p_year]."-".$_POST[p_day]."-".$_POST[p_month];
						$sql="UPDATE patient SET		Pat_ID_Card='$_POST[p_id_card]', 
																	Pat_Gender='$_POST[p_gender]', 
																	Pat_Title='$_POST[p_title]', 
																	Pat_Name='$_POST[p_name]', 
																	Pat_Lastname='$_POST[p_lastname]',
																	Pat_Birthday='$birthday', 
																	Pat_Religion='$_POST[p_religion]', 
																	Pat_Blood='$_POST[p_blood]', 
																	Pat_Address='$_POST[p_address]', 
																	Pat_Tel='$_POST[p_tel]', 
																	Pat_Career='$_POST[p_career]'
																	
										WHERE Pat_ID='$_POST[pid]' 
								";
										
						$sql_health="UPDATE patient_health SET		Pat_Binge='$_POST[p_binge]', 
																						Pat_Routinely='$_POST[p_routinely]', 
																						Pat_Intolerance='$_POST[p_intolerance]', 
																						Pat_Diseases='$_POST[p_diseases]', 
																						Pat_Diseases_ON='$_POST[p_diseases_on]',
																						Pat_Symptoms='$_POST[p_symptoms]'
																	
													WHERE Pat_ID='$_POST[pid]' 
											";
		if(mysql_query($sql) or die (mysql_error())){
			if(mysql_query($sql_health) or die (mysql_error())){
				$_SESSION[success]="แก้ไขข้อมูลทั่วไปและข้อมูลสุขภาพสำเร็จแล้ว";
			}else{
				$_SESSION[success]="แก้ไขข้อมูลทั่วไปสำเร็จแล้ว";
			}
			echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=show_patient&pid=$_POST[pid]';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถแก้ข้อมูลได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=edit_patient&pid=$_POST[pid]';</script>";
		}

	}
?>