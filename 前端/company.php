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
?>
<html>

<head>
	<title>山东省人力资源市场数据采集系统</title>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="js/loadFun.js" type="text/javascript"></script>
	<script src="js/Show.js" type="text/javascript"></script>
	<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>
	<script>
	function exit(){
			$("#exit").slideToggle();
		}
	function resize(){
		$("#mainbody").width(window.innerWidth - $("#menu").width() - 22);
	}
	</script>
</head>

<body onload="loadFun()" onResize="resize()">

<div id="container">
	<div id="header">
        <div id="logo"></div>
		<span id="title">山东省人力资源市场数据采集系统</span>
		<span id="name"><a style="text-decoration:none; color:#fff;" href="#" onclick="exit()">当前用户：
		<?php
			if(isset($_SESSION['userName']))
				echo $_SESSION['userName']."（企业）";
			else
				echo "<a href='login.php'>登陆</a>";
		?>
		</a></span>
	</div>
	
	<a style="text-decoration:none; color:#fff;" href="login.php"><div id="exit">退出登录</div></a>

	<div id="menu">

	<div id="menu_container">
		<ul id="accordion" class="accordion">
			<li id="l0">
				<div class="link" onclick="change(0)"><i class="fa fa-university"></i>企业信息<i class="fa fa-chevron-down"></i></div>
				<ul class="submenu" id="u0">
					<li><a href="detail.php" target="inform">完善企业信息</a></li>
				</ul>
			</li>
			<li id="l1">
				<div class="link" onclick="change(1)"><i class="fa fa-table"></i>人力资源表格<i class="fa fa-chevron-down"></i></div>
				<ul class="submenu" id="u1">
					<li><a href="Survey.html" target="inform">填写调查期表格</a></li>
					<li><a href="CheckSurvey.html" target="inform">已提交的调查期信息</a></li>
				</ul>
			</li>
			<li id="l2">
				<div class="link" onclick="change(2)"><i class="fa fa-bell-o"></i>通知管理<i class="fa fa-chevron-down"></i></div>
				<ul class="submenu" id="u2">
				<li><a href="inform.html" target="inform">查看通知</a></li>
				</ul>
			</li>
		</ul>
	</div>

</div>

<div id="mainbody">
	<iframe id="main" src="cover.html" width="100%" height="100%" frameborder="0" name="inform" align="right"></iframe>
</div>

<!--
<div id="footer">
山东省人力资源
</div>

-->

</div>

</body>
</html>