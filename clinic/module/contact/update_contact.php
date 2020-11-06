<?
						$sql="UPDATE set_contact SET		Address='$_POST[Address]', 
																			Email='$_POST[Email]', 
																			Telephone='$_POST[Telephone]', 
																			Facebook='$_POST[Facebook]', 
																			Google='$_POST[Google]', 
																			Twitter='$_POST[Twitter]', 
																			Instagram='$_POST[Instagram]', 
																			Youtube='$_POST[Youtube]', 
																			Map='$_POST[Map]'
										";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="อัพเดทตั้งค่าการติดต่อสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=contact&file=main_contact';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถอัพเดทตั้งค่าการติดต่อได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=contact&file=edit_contact';</script>";
		}

?>