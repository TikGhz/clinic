<?
	if($_POST[u_id]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=salary&file=form_salary';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
		
		$result_user=mysql_query("SELECT User_Salary FROM user WHERE User_ID='$_POST[u_id]' ");
		list($User_Salary)=mysql_fetch_row($result_user);
		$total_salary=$User_Salary+(($_POST[Sal_OT_Hour]*$_POST[Sal_OT_Price])-$_POST[Sal_Decreas]);
		$sql="INSERT INTO salary VALUES(		'',
																	'$_POST[u_id]', 
																	'$User_Salary', 
																	'$_POST[Sal_OT_Hour]', 
																	'$_POST[Sal_OT_Price]', 
																	'$_POST[Sal_Decreas]', 
																	'$_POST[Sal_Status]', 
																	'$add_time'
															)";
		if(mysql_query($sql) or die (mysql_error())){
			$sql1="INSERT INTO expenditure VALUES(		'',
																				'$_POST[u_id]', 
																				'เงินเดือน', 
																				'$total_salary', 
																				'เงินเดือน', 
																				'$add_time'
																		)";
			mysql_query($sql1) or die (mysql_error());
			$_SESSION[success]="เพิ่มข้อมูลสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=salary&file=main_salary';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถเพิ่มข้อมูลทันตแพทย์ได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=salary&file=form_salary';</script>";
		}

	}
?>