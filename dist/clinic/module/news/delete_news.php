<?
		if($_SESSION[login_type]=='1' || $_SESSION[login_type]=='2'){
			
			$sql="DELETE FROM news WHERE News_ID='$_GET[nid]'";
				
				if(mysql_query($sql) or die (mysql_error())){
					$_SESSION[success]="ลบข้อมูลข่าวประกาศเรียบร้อยแล้ว";
					mysql_close();
					echo "<script type='text/javascript'>window.location='index_panel.php?module=news&file=main_news';</script>";
				}
				else{
					$_SESSION[error]="ลบข้อมูลข่าวประกาศไม่สำเร็จ กรุณาตรวจสอบใหม่อีกครั้งค่ะ";
					mysql_close();
					echo "<script type='text/javascript'>window.location='index_panel.php?module=news&file=main_news';</script>";
				}
		}
?>