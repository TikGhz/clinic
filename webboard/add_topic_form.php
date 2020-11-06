<?
session_start();
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
        <li><center><h2><a href='index.php?module=webboard&file=add_topic_form'>ตั้งกระทู้ใหม่</a></h2></center></li>
        <li></li>
		</ul>
  </div>
    <!-- Start Content-->
    <div class="content_head_bottom">
<link rel="stylesheet" href="../css/styles.css">
<div style="width:80%; margin:0 auto 0 auto;">
<form name="form1" method="post" action="index.php?module=webboard&file=add_topic">
  <p>หัวข้อกระทู้ :</p>
  <p>
    <input name="topic_title" type="text" id="topic_title" size="100">
  </p>
  <p>รายละเอียด :</p>
  <p>
    <textarea name="topic_detail" cols="100" rows="10" id="topic_detail"></textarea>
  </p>
  <p>ผู้ตั้งกระทู้ : <? echo $_SESSION[login_name]?></p>

  <p>
    <input type="submit" name="button" id="button" value="ตั้งกระทู้">
    <input type="reset" name="button2" id="button2" value="ยกเลิก">
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
<? } ?>