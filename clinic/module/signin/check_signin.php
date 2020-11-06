<?
	echo "<meta charset='utf-8'>";
	if(empty($_POST[username]) || empty($_POST[password])){
		echo "ข้อมูลไม่ถูกต้องค่ะ กรุณากลับไปกรอกใหม่ค่ะ !!";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	else{
		$sql_user="SELECT User_ID, User_Username, User_Password, User_Nickame, User_Type_ID FROM user WHERE User_Username='$_POST[username]' AND User_Password='$_POST[password]'";
		$result_user=mysql_query($sql_user);
		$num_user=mysql_num_rows($result_user);
		list($user_id, $user_username, $user_password, $user_nickame, $user_type_id)=mysql_fetch_row($result_user);
	
		if($user_username==$_POST[username] && $user_password==$_POST[password]){
			$_SESSION[login_id]=$user_id;
			$_SESSION[login_name]=$user_username;
			$_SESSION[login_nickname]=$user_nickame;
			$_SESSION[login_type]=$user_type_id;
			$_SESSION[login_status]="valid_user";
			
			mysql_free_result($result_user);
			mysql_close();
			
			if($_SESSION[login_type]==1 || $_SESSION[login_type]==2 || $_SESSION[login_type]==3 || $_SESSION[login_type]==4 || $_SESSION[login_type]==5){
				echo "<script type='text/javascript'>window.location='index_panel.php?module=dashboard&file=main_dashboard'</script>";
			}else{ 
				echo "<script type='text/javascript'>window.location='../index.php'</script>";
			}
		}
		else{
			echo "ขออภัยค่ะ ท่านทำการเข้าสู่ระบบไม่ถูกต้อง กรุณากลับไปกรอกข้อมูลใหม่";
			echo "<script type='text/javascript'>document.location=document.referrer;</script>";
		}
	}
?>