<?
	if($_POST[tp_id]=="" || $_POST[tu_id]=="" ){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=treat&file=main_treat';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
		
		if ($_POST['t_appoint'] == false) {
			global $t_appoint;
			$t_appoint = "ไม่นัด";
    	} else if ($_POST['t_appoint'] == true) {
			global $t_appoint;
			$t_appoint = "นัด";
   		};
		
		$sql_treatment="INSERT INTO treatment VALUES(		'',
																						'$_POST[tp_id]', 
																						'$_POST[tu_id]', 
																						'$_POST[t_date]', 
																						'$_POST[t_symptoms]', 
																						'$_POST[t_examination]', 
																						'$_POST[t_diagnosis]', 
																						'$_POST[t_remedy]', 
																						'$_POST[t_dispensing]',
																						'$t_appoint' 
															)";
		if(mysql_query($sql_treatment) or die (mysql_error())){
			$sql_treatment1="INSERT INTO hist_treatment VALUES(		'',
																							'$_POST[tp_id]', 
																							'$_POST[tu_id]', 
																							'$_POST[t_date]', 
																							'$_POST[t_symptoms]', 
																							'$_POST[t_examination]', 
																							'$_POST[t_diagnosis]', 
																							'$_POST[t_remedy]', 
																							'$_POST[t_dispensing]',
																							'$t_appoint', 
																							'2'
																					)";
																					
			mysql_query($sql_treatment1) or die (mysql_error());
			
			$_SESSION[success]="เพิ่มข้อมูลการรักษาสำเร็จแล้ว";
			$sql_tm="DELETE FROM queue WHERE Que_ID='$_POST[qid]' AND Pat_ID='$_POST[pid]' AND Room_ID='$_POST[rid]' ";
			if(mysql_query($sql_tm) or die (mysql_error())){
				$_SESSION[success]="เพิ่มข้อมูลการรักษาและนำผู้ป่วยออกจากคิวสำเร็จแล้ว";
			}else{
				$_SESSION[error]="ไม่สามารถนำผู้ป่วยออกจากคิวได้";
			}
			echo "<script type='text/javascript'>window.location='index_panel.php?module=patient&file=check_patient';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถเพิ่มข้อมูลการรักษาได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=treat&file=main_treat';</script>";
		}
		
	}
?>