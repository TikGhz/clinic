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
        <li><center><h2><a href='index.php?module=webboard&file=add_topic_form'>เพิ่มกระทู้</a></h2></center></li>
        <li></li>
		</ul>
  </div>
    <!-- Start Content-->
    <div class="content_head_bottom">
<link rel="stylesheet" href="../css/styles.css">
<div style="width:80%; margin:0 auto 0 auto;">
<? 	
	
	$sql="SELECT * FROM webboard_topic ORDER BY topic_id DESC";
	$result=mysql_query($sql) or die(mysql_error());
		echo "<table border='1' width=100% align=center id=box-a>";	
			echo "<tr>";
			echo "	<th width=15%>หมายเลขกระทู้</th>
					<th>หัวข้อกระทู้</th>
					<th width=10%>ผู้ตั้งกระทู้</th>
					<th width=15%>วัน/เวลา</th>";
			echo "</tr>";
	while(list($tid,$ttitle,$tdetail,$tdate,$tuser,$tpic)=mysql_fetch_row($result)){
			echo "<tr>";
			echo "	<td>$tid</td>
					<td><a href='index.php?module=webboard&file=topic_detail&id=$tid'>$ttitle</a></td>
					<td>$tuser</td>
					<td>$tdate</td>";
			echo "</tr>";
	}
		echo "</table>";
?>
<? mysql_close();?>
</div>
    </div>
    <!-- End Content-->
</div>
<? } ?>