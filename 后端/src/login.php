﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start(); 
?>
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
</style>
</head>

<body>

<div id="login">
	<div id="login-nav">
		<ul>
			<li id="l1" class="li"><a class="selected" onclick="UserChange(0)" href="javascript:void(0)">省用户登录</a></li>
			<li id="l2" class="li"><a onclick="UserChange(1)" href="javascript:void(0)">企业用户登录</a></li>
		</ul>
	</div>
	<form id="login-container" name="Login" action="loginjudge.php" method="post">
        <table>
            <tr><th><input type="text" id="PID" name="PID" placeholder="用户名"/></th></tr>
            <tr><th><input type="password" id="psw" name="psw" placeholder="密码"/></th></tr>
			<tr><td><input type="hidden" id="usertype" name="usertype" value="1"/></td></tr>
			<?php
			if(isset($_SESSION['errotype']))
			{
					if($_SESSION['errotype']=='no-user')
						echo "<tr><td>请输入用户名</td></tr>";
					if($_SESSION['errotype']=='no-psw')
						echo "<tr><td>请输入密码</td></tr>";
					if($_SESSION['errotype']=='user-psw')
						echo "<tr><td>用户名密码错误</td></tr>";
					if($_SESSION['errotype']=='db-connect')
						echo "<tr><td>无法连接数据库，请联系管理员</td></tr>";	
					$_SESSION['errotype']='none';	
			}
			?>
            <tr><td><input id="button-login" height="50px" type="submit" value="登录"></td></tr>
        </table>
    </form>
	
</div>

<script type="text/javascript">
	function UserChange(a) {
		if(a == 0)
		{
			$("#l1 a").addClass("selected");
			$("#l2 a").removeClass("selected");
			document.getElementById('usertype').value ="1";
		}
		else{
			$("#l1 a").removeClass("selected");
			$("#l2 a").addClass("selected");
			document.getElementById('usertype').value ="2";
		}
	}
</script>

</body>

</html>