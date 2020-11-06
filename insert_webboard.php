<? session_start(); ?>
<meta charset="utf-8">
<?

if($_POST[insert_reply]=="ส่งหัวข้อ"){
	if($_POST[topic_title]=="" || $_POST[topic_detail]=="" || $_POST[topic_user]==""){
			$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ";
			echo "<script type='text/javascript'>window.location='webboard.php?topic=new';</script>";
	}
	else{
		include("include/connect.php");
		$add_time=date("Y-m-d : H:i:s");
		$sql_topic="INSERT INTO webboard_topic VALUES(		'', 
																						'$_POST[topic_title]', 
																						'$_POST[topic_detail]', 
																						'$add_time',
																						'$_POST[topic_user]'
																				)";
		if(mysql_query($sql_topic) or die (mysql_error())){
			$_SESSION[success]="ตั้งกระทู้เรียบร้อยแล้วค่ะ";
			echo "<script type='text/javascript'>window.location='webboard.php';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถตั้งกระทู้ได้ค่ะ";
			echo "<script type='text/javascript'>window.location='webboard.php?topic=new';</script>";
		}
	}
}

if($_POST[insert_reply]=="ส่งข้อความ"){
	if($_POST[topic_id]=="" || $_POST[reply_num]=="" || $_POST[reply_detail]=="" || $_POST[reply_user]==""){
			$_SESSION[warning]="กรุณากรอกข้อมูลให้ครบด้วยค่ะ";
			echo "<script type='text/javascript'>window.location='webboard.php?topic_id=$_POST[topic_id]';</script>";
	}
	else{
		include("include/connect.php");
		$add_time=date("Y-m-d : H:i:s");
		$sql_reply="INSERT INTO webboard_reply VALUES(		'$_POST[topic_id]', 
																						'$_POST[reply_num]', 
																						'$_POST[reply_detail]', 
																						'$add_time',
																						'$_POST[reply_user]'
																				)";
		if(mysql_query($sql_reply) or die (mysql_error())){
			$_SESSION[success]="ตอบกระทู้เรียบร้อยแล้วค่ะ";
			echo "<script type='text/javascript'>window.location='webboard.php?topic_id=$_POST[topic_id]';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถตอบกระทู้ได้ค่ะ";
			echo "<script type='text/javascript'>window.location='webboard.php?topic_id=$_POST[topic_id]';</script>";
		}
	}
}
?>