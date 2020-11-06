<?
	if($_POST[drug_id]=="" || $_POST[pur_id]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลเวชภัณฑ์ให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=order&file=form_order';</script>";
	}else{	$add_time=date("Y-m-d : H:i:s");
				$sql_purchaser_detail="INSERT INTO purchaser_detail VALUES(	'',
																												'$_POST[pur_id]', 
																												'$_POST[drug_id]', 
																												'$_POST[pu_unit]', 
																												'$_POST[pu_cost_price]', 
																												'$_POST[pu_price]', 
																												'รอดำเนินการ', 
																												'$_SESSION[login_id]',
																												'$add_time'
																											)";
				if(mysql_query($sql_purchaser_detail) or die (mysql_error())){
					$_SESSION[success]="เพิ่มข้อมูลเวชภัณฑ์ และ ผู้จัดซื้อสำหรับการจัดซื้อสำเร็จแล้ว";
					echo "<script type='text/javascript'>window.location='index_panel.php?module=order&file=main_order';</script>";
				}
				else{
					$_SESSION[error]="ไม่สามารถเพิ่มข้อมูลการจัดซื้อได้";
					echo "<script type='text/javascript'>window.location='index_panel.php?module=order&file=form_order';</script>";
				}
	}
?>