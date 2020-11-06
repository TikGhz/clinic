<?
	if($_POST[oid]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=order&file=edit_order&puid=$_POST[oid]';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
		
								 $sql="UPDATE purchaser_detail SET		Purd_Unit='$_POST[o_unit]', 
																							Purd_Cost_Price='$_POST[o_cost_price]', 
																							Purd_Price='$_POST[o_price]', 
																							Purd_Status='$_POST[o_status]'
																			WHERE Purd_ID='$_POST[oid]' 
																";
		if(mysql_query($sql) or die (mysql_error())){
			if($_POST[o_status]=="รับทั้งหมดแล้ว"){
				if($_POST[old_status]=="รับทั้งหมดแล้ว"){}
				else{
					$p_total=($_POST['o_unit']*$_POST['o_cost_price']);
					$detail="จัดซื้อ $_POST[d_name]";
					$sql1="INSERT INTO expenditure VALUES(		'',
																						'$_POST[u_id]', 
																						'$detail', 
																						'$p_total', 
																						'จัดซื้อ', 
																						'$add_time'
																				)";
					mysql_query($sql1) or die (mysql_error());
				}
			}
			$_SESSION[success]="แก้ไขข้อมูลสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=order&file=main_order';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถแก้ข้อมูลได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=order&file=edit_order&puid=$_POST[oid]';</script>";
		}

	}
?>