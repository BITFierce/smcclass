<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	if (isset($_COOKIE["sesID"]))
	{
		session_id($_COOKIE["sesID"]);
		session_start();
	}
	else {
		session_start();
		setcookie("sesID", session_id(), time() + 3600);
	}
	if (isset($_GET["md"]))
	{
		if ($_GET["md"]=="e")
		{
			if (isset($_SESSION["userName"])) unset($_SESSION["userName"]);
			if (isset($_SESSION["userType"])) unset($_SESSION["userType"]);
			if (isset($_SESSION["errorType"])) unset($_SESSION["errorType"]);
			if (isset($_SESSION["username"])) unset($_SESSION["username"]);
			if (isset($_SESSION["usertype"])) unset($_SESSION["usertype"]);
			if (isset($_SESSION["errortype"])) unset($_SESSION["errortype"]);
		}
	}
?>
<script type="text/javascript">
	function isInput()
	{
		if (document.getElementById("PID").value == "" || document.getElementById("psw").value == "")
		{
			alert("用户名或密码不能为空！");
			return false;
		}
		return true;
	}
	function info()
	{
		alert("可能的原因：\n1.无法连接数据库\n2.用户名或密码错误\n3.用户类型选择错误");
	}
	function UserChange(a) {
		if(a == 0)
		{
			$("#l1 a").addClass("selected");
			$("#l2 a").removeClass("selected");
			$("#l3 a").removeClass("selected");
			document.getElementById('usertype').value ="1";
		}
		else if (a == 1){
			$("#l1 a").removeClass("selected");
			$("#l2 a").addClass("selected");
			$("#l3 a").removeClass("selected");
			document.getElementById('usertype').value ="2";
		}
		else if (a == 2){
			$("#l1 a").removeClass("selected");
			$("#l2 a").removeClass("selected");
			$("#l3 a").addClass("selected");
			document.getElementById('usertype').value ="3";
		}
	}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"  type="text/css" href="css/login.css" />
<script language="javascript"  charset="utf-8" src="js/jquery-2.0.0.min.js"></script>
<title>山东省人力资源市场数据采集系统</title>
<style type="text/css">
	.selected{
		border-bottom:2px solid #dd433e;
	}
	body{
		background-size:100%;
	}
</style>
</head>

<body background="img/bg_login.png">

<div id="login">
	<div id="login-nav">
		<ul>
			<li id="l1" class="li"><a class="selected" onclick="UserChange(0)" href="javascript:void(0)">省用户登录</a></li>
			<li id="l2" class="li"><a onclick="UserChange(1)" href="javascript:void(0)">企业用户登录</a></li>
			<li id="l3" class="li"><a onclick="UserChange(2)" href="javascript:void(0)">市用户登录</a></li>
		</ul>
	</div>
	<form id="login-container" name="Login" action="loginjudge.php" method="post">
        <table>
            <tr><th><input type="text" id="PID" name="PID" placeholder="用户名"/></th></tr>
            <tr><th><input type="password" id="psw" name="psw" placeholder="密码"/></th></tr>
			<tr><td><input type="hidden" id="usertype" name="usertype" value="1"/></td></tr>
            <?php
				if (isset($_SESSION["errorType"]))
				{
					if ($_SESSION["errorType"] == "P")
						echo "<tr><td>登陆失败 <a href=\"#\" onclick=\"info();\">错误信息</div></td></tr>";
					$_SESSION["errorType"]="N";
				}
			?>
            <tr><td><input id="button-login" height="50px" type="submit" value="登录" onclick="return isInput();"></td></tr>
        </table>
    </form>

</div>

</body>

</html>