<?
session_start();
echo "<meta charset='utf-8'>";
	if($_SESSION['login_status']!="valid_user" || $_SESSION['login_type']!=admin){
		echo "คุณไม่มีสิทธิ์การใช้งานในหน้านี้ <a href='form_login.php'>Login</a>";
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<?
	
	$tid=$_POST['topic_id'];
	$tid1=$_POST['topic_id1'];
	$rid=$_POST['topic_id_detail'];
	if($tid){	
		$sql1="SELECT * FROM webboard_reply WHERE topic_id='$tid' ";
		$result1=mysql_query($sql1)or die(mysql_error());
			while(list($a,$b)=mysql_fetch_row($result1)){
				$sql2="DELETE FROM webboard_reply WHERE topic_id='$a' AND reply_id='$b'";
				mysql_query($sql2) or die (mysql_error());
			}
		$sql="DELETE FROM webboard_topic WHERE topic_id='$tid' ";
		mysql_query($sql) or die (mysql_error());
		echo "<script language='javascript'>alert('ระบบได้ทำการลบหัวข้อกระทู้เรียบร้อยแล้ว')</script>";
		echo "<script type='text/javascript'>window.location='index.php?module=webboard&file=list_topic';</script>";
	}
	else{
		$sql="DELETE FROM webboard_reply WHERE topic_id='$tid1' AND reply_id='$rid' ";
		mysql_query($sql) or die (mysql_error());
		echo "<script language='javascript'>alert('ระบบได้ทำการลบคอมเม้นในกระทู้เรียบร้อยแล้ว')</script>";
		echo "<script language='javascript'>document.location=document.referrer;</script>";
	}
	mysql_close();
?>
</body>
</html>