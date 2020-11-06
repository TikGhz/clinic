<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ระบบเว็บบอร์ด</title>
<style type="text/css">
#login{
	background-image:url(../images/login-form.png);
	background-repeat: no-repeat;
	width:800px;
	height:600px;
	margin-left:auto;
	margin-right:auto;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(../images/bglogin-form.png);
}
#form_login{
	padding-top:299px;
	padding-left:179px;
	float:left;
}
input{
border: none; background-color:transparent; font: 15pt AngsanaUPC;
}
</style>
</head>

<body>
  <div id="login">
    	<div id="form_login">
        <form action="check_user.php" method="post" enctype="multipart/form-data" name="form1">
        <table width="500" border="0">
  			<tr>
    		<td width="185"><input type="text" name="username" id="username" size="22"></td>
    		<td width="185"><input type="password" name="password" id="password" size="22"></td>
    		<td><input type="image" name="Submit" value="Submit" src="../images/go.png" alt="Button" onClick="submit" style="position:fixed;top:170px;"></td>
  			</tr>
		</table>
		</form>
        </div>
	</div>
</body>
</html>