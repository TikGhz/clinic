<?
	if($_POST[u_id]=="" || $_POST[work_time]=="" || $_POST[work_enter]=="" || $_POST[work_out]=="" || $_POST[work_color]==""){
		$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=work&file=form_work';</script>";
	}else{
		$add_time=date("Y-m-d H:i:s");
		
		$sql="INSERT INTO work VALUES(		'',
																		'$_POST[u_id]', 
																		'$_POST[work_time]', 
																		'$_POST[work_enter]', 
																		'$_POST[work_out]', 
																		'$_POST[work_color]'
																)";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="เพิ่มข้อมูลวัน/เวลาทำงานสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=work&file=main_work';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถเพิ่มข้อมูลวัน/เวลาทำงานได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=work&file=form_work';</script>";
		}

	}
?>