<?
session_start();
echo "<meta charset='utf-8'>";
	if($_SESSION['login_status']!="valid_user"){
		echo "คุณไม่มีสิทธิ์การใช้งานในหน้านี้ <a href='form_login.php'>Login</a>";
	}
	else{
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ระบบเว็บบอร์ด</title>
</head>

<body>
<?

	if($_POST[tid]=="" || $_POST[num]=="" || $_POST[reply_title]=="" || $_POST[reply_detail]=="" || $_POST[login_name]==""){
		echo "กรุณากรอกข้อมูลให้ครบ <a href='add_topic_form.php'>Login</a>";
	}
	$add_time=date("Y-m-d : H:i:s");
	$sql="INSERT INTO webboard_reply VALUES('$_POST[tid]','$_POST[num]','$_POST[reply_title]','$_POST[reply_detail]','$add_time','$_SESSION[login_name]')";
	if(mysql_query($sql) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว')</script>";
		echo "<script language='javascript'>document.location=document.referrer;</script>";
	}
	else{echo "<script language='javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
	}
	mysql_free_result();
	mysql_close();

?>
</body>
</html>
<? } ?>