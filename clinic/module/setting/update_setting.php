<? 
						$sql="UPDATE setting SET		set_logo='$_POST[logo]', 
																	set_title='$_POST[title]', 
																	set_description='$_POST[detail]', 
																	set_keyword='$_POST[keyword]', 
																	set_footer='$_POST[footers]', 
																	set_vat='$_POST[vatsys]'
										";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="อัพเดทตั้งค่าระบบสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=setting&file=edit_setting';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถอัพเดทตั้งค่าระบบได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=setting&file=edit_setting';</script>";
		}

?>