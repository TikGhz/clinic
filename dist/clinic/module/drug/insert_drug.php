<?
	if($_POST[d_name]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลเวชภัณฑ์ให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=drug&file=main_drug';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
		
			if($_GET[purchaser]=="yes"){
				$sql_purchaser="INSERT INTO purchaser VALUES(	'',
																							'$_POST[pu_business]', 
																							'$_POST[pu_name]', 
																							'$_POST[pu_lastname]', 
																							'$_POST[pu_address]', 
																							'$_POST[pu_tel]', 
																							'$_POST[pu_email]', 
																							'$_POST[pu_bankname]', 
																							'$_POST[pu_account]', 
																							'$_POST[pu_note]'
																						)";
				if(mysql_query($sql_purchaser) or die (mysql_error())){
					$a="yes";
				}
				else{
					$a="no";
				}
			}
			
			$sql_drug="INSERT INTO drug VALUES(	'',
																		'$_POST[d_name]', 
																		'$_POST[d_detail]', 
																		'$_POST[d_type_id]', 
																		'$_POST[d_unit]', 
																		'$_POST[d_cost_price]', 
																		'$_POST[d_price]', 
																		'$_POST[pu_id]', 
																		'$_SESSION[login_id]', 
																		'$add_time'
																	)";
			if(mysql_query($sql_drug) or die (mysql_error())){
				if($a=="yes"){
					$_SESSION[success]="เพิ่มข้อมูลเวชภัณฑ์ และ ผู้จัดซื้อใหม่สำเร็จแล้ว";
				}else{
					$_SESSION[success]="เพิ่มข้อมูลเวชภัณฑ์สำเร็จแล้ว";
				}
				echo "<script type='text/javascript'>window.location='index_panel.php?module=drug&file=main_drug';</script>";
			}
			else{
				if($a=="no"){
					$_SESSION[error]="ไม่สามารถเพิ่มข้อมูลเวชภัณฑ์ และข้อมูลผู้จัดซื้อได้";
				}else{
					$_SESSION[error]="ไม่สามารถเพิ่มข้อมูลเวชภัณฑ์";
				}
				echo "<script type='text/javascript'>window.location='index_panel.php?module=drug&file=main_drug';</script>";
			}
	}
?>