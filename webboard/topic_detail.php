<?
echo "<meta charset='utf-8'>";
	if($_SESSION['login_status']!="valid_user"){
		echo "คุณไม่มีสิทธิ์การใช้งานในหน้านี้ <a href='form_login.php'>Login</a>";
	}
	else{
?>
<div id="content_head">
	<div class="content_head_top">
		<h2>Webboard Computer Information System</h2>
    </div>
    <div class="content_head_center">
		<ul>
        <li><center><h2>  <a href="index.php?module=webboard&file=list_topic">กระทู้ทั้งหมด</a> : <a href="index.php?module=webboard&file=add_topic_form">ตั้งกระทู้ใหม่</a></h2></center></li>
        <li></li>
		</ul>
  </div>
    <!-- Start Content-->
    <div class="content_head_bottom">
<link rel="stylesheet" href="../css/styles.css">
<div style="width:80%; margin:0 auto 0 auto;">
<div style="width:80%;margin:0 auto 0 auto;line-height:30px;">
<?	
	$sql="SELECT * FROM webboard_topic WHERE topic_id=$_GET[id]";
	$result=mysql_query($sql)or die(mysql_error());
	if(mysql_num_rows($result)==1){
	while(list($tid,$ttitle,$tdetail,$tdate,$tuser,$tpic)=mysql_fetch_row($result)){
	if($_SESSION['login_status']=="valid_user" && $_SESSION['login_type']==admin){
		$a="<form name='form1' method='post' action='index.php?module=webboard&file=delete_topic'>
			<input name='topic_id' type='hidden' value='$tid'>
  			<input type='submit' name='Submit1' id='Submit1' value='ลบ'>
			</form>";
		$c="<div style='text-align:right;margin-top:-30px;'>$a</div>";
	}
	else{
		$a="";
		$c="";
	}
	echo "<div style='background-color:#0CF;'>";
		echo "<div style=';padding:10px;'><div style=';padding:10px;background-color:#09F;'>หมายเลขกระทู้ : ",$tid," $c
		</div></div>";
		echo "<div style='margin:0px 0px 20px 25px;'>";
			echo "หัวข้อกระทู้ : ",$ttitle,"<br>";
			echo "รายละเอียด : ",$tdetail,"<br>";
			echo "ผู้โพส : ",$tuser,"<br>";
			echo "วัน/เวลา : ",$tdate,"<br>";
			echo "<br>";
			$ttitle1=$ttitle;
		echo "</div>";
	echo "</div>";
	}

	$sql1="SELECT * FROM webboard_reply WHERE topic_id=$_GET[id]";
	$result1=mysql_query($sql1)or die(mysql_error());
		$num=1;
	while(list($tid,$rid,$rtitle,$rdetail,$rdate,$ruser)=mysql_fetch_row($result1)){

	if($_SESSION['login_status']=="valid_user" && $_SESSION['login_type']==admin){
		$b="<form name='form1' method='post' action='index.php?module=webboard&file=delete_topic'>
			<input name='topic_id1' type='hidden' value='$tid'>
			<input name='topic_id_detail' type='hidden' value='$rid'>
  			<input type='submit' name='Submit1' id='Submit1' value='ลบ'>
			</form>";
		$d="<div style='text-align:right;margin-top:-30px;'>$b</div>";
	}
	else{
		$b="";
		$d="";
	}
	echo "<div style='background-color:#3F6;margin:0px 0px 0px 30px;'>";
	
		echo "<div style=';padding:10px;'>
		<div style='padding:10px;background-color:#396;text-align:left;'>หัวข้อกระทู้ - ตอบกลับ : $rtitle
		$d
		</div>
		</div>";
		
		echo "<div style='margin:0px 0px 20px 25px;'>";

			echo "รายละเอียด : ",$rdetail,"<br>";
			echo "ผู้โพส : ",$ruser,"<br>";
			echo "วัน/เวลา : ",$rdate,"<br>";
			$num++;
		echo "</div>";
	echo "</div>";
	}

?>

<form name="form1" method="post" action="index.php?module=webboard&file=add_reply">
  <p>หัวข้อ : 
  	<input name="tid" type="hidden" size="55" value="<? echo $_GET['id'];?>">
    <input name="num" type="hidden" size="55" value="<? echo $num;?>">
    <input name="reply_title" type="text" id="textfield" value="<? echo $ttitle1;?>" size="55">
  </p>
  <p>รายละเอียด : 
    <textarea name="reply_detail" cols="50" rows="5" id="reply_detail"></textarea>
  </p>
  <p>
    <input type="submit" name="button" id="button" value="ตอบกระทู้">
    <input type="reset" name="button2" id="button2" value="ยกเลิก">
  </p>
</form>
<? }else{ 
		echo "<script language='javascript'>alert('ในระบบไม่มีกระทู้ที่ท่านร้องขอ กรุณาทำรายการใหม่อีกครั้ง')</script>";
		echo "<script language='javascript'>window.location='index.php?module=webboard&file=list_topic'</script>";
}
mysql_close();?>
</div>
</body>
</html>
<? } ?>