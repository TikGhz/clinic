<?
	if($_POST[p_id_card]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=form_patient';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
		$birthday=$_POST[p_year]."-".$_POST[p_day]."-".$_POST[p_month];
		$sql_patient="INSERT INTO patient VALUES(		'',
																	'$_POST[p_id_card]', 
																	'$_POST[p_gender]', 
																	'$_POST[p_title]', 
																	'$_POST[p_name]', 
																	'$_POST[p_lastname]', 
																	'$birthday', 
																	'$_POST[p_religion]', 
																	'$_POST[p_blood]', 
																	'$_POST[p_address]', 
																	'$_POST[p_tel]', 
																	'$_POST[p_career]', 
																	'0',
																	'$add_time'
															)";
															
		if($_POST[p_diseases_on]==""){	$_POST[p_diseases_on]	="ไม่มี";}
		if($_POST[p_symptoms]==""){	$_POST[p_symptoms]	="ไม่มี";}
		
		$sql_health="INSERT INTO patient_health VALUES(		'',
																						'$_POST[p_binge]', 
																						'$_POST[p_routinely]', 
																						'$_POST[p_intolerance]', 
																						'$_POST[p_diseases]', 
																						'$_POST[p_diseases_on]', 
																						'$_POST[p_symptoms]'
																				)";
																				
		if(mysql_query($sql_patient) or die (mysql_error())){
			mysql_query($sql_health) or die (mysql_error());
			$_SESSION[success]="เพิ่มข้อมูลผู้ป่วยสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=main_patient';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถเพิ่มข้อมูลผู้ป่วยได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=form_patient';</script>";
		}
		
	}
?>