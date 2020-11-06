<?
session_start();
echo "<meta charset='utf-8'>";

if(empty($_POST[username]) || empty($_POST[username])){
	echo "กลับไปกรอกข้อมูลด้วยนะ";
}
else{
	
	$sql="SELECT username,password,user_type FROM user WHERE username='$_POST[username]' AND password='$_POST[password]'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	list($user,$pass,$user_type)=mysql_fetch_row($result);
	
	if($user==$_POST[username] && $pass==$_POST[password]){
		$_SESSION[login_status]="valid_user";
		$_SESSION[login_type]=$user_type;
		$_SESSION[login_name]=$user;
		if($user_type=='admin'){
			echo "<script type='text/javascript'>window.location='list_topic.php'</script>";
		}
		elseif($user_type=='member'){
			echo "<script type='text/javascript'>window.location='list_topic.php'</script>";
		}
		else{
			echo "<script type='text/javascript'>window.location='list_topic.php'</script>";
		}
	}
	else{
		echo "ล็อคอินไม่สำเร็จ";
	}
}
mysql_free_result($result);
mysql_close();
?>