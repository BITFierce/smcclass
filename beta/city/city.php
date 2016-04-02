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
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>山东省人力资源市场数据采集系统</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/province.css" media="screen" type="text/css" />
	<script src="../js/loadFun.js" type="text/javascript"></script>
	<script src="../js/Show.js" type="text/javascript"></script>
	<script src="../js/jquery-2.0.0.min.js" type="text/javascript"></script>
	<script>
		function resize(){
			$("#mainbody").width(window.innerWidth - $("#menu").width() - 22);
		}
	</script>
</head>

<body onload="loadFun()">
	
	<div id="header">
		<div id="logo"></div>
		<span id="title">山东省人力资源市场数据采集系统</span>
		<span id="name"><a style="text-decoration:none; color:#fff;" href="#" onclick="exit()">当前用户：
		<?php
			if(isset($_SESSION['userName']))
				echo $_SESSION['userName']."（市级）";
			else
				echo "<a href='../login.php'>登陆</a>";
		?></a></span>
	</div>
	
	<a style="text-decoration:none; color:#fff;" href="../login.php?md=e"><div id="exit">退出登录</div></a>
	
	<script type="text/javascript">
		function exit(){
			$("#exit").slideToggle();
		}
	</script>
	
	<div id="menu">
		
		<div id="menu_container">
			<ul id="accordion" class="accordion">
				<li id="l0">
					<div class="link" onclick="change(0)"><i class="fa fa-university"></i>企业管理<i class="fa fa-chevron-down"></i></div>
					<ul class="submenu" id="u0">
					<li><a href="CompanyReference.html" target="inform">企业备案查询</a></li>
					</ul>
				</li>
				<li id="l1">
					<div class="link" onclick="change(1)"><i class="fa fa-table"></i>报表管理<i class="fa fa-chevron-down"></i></div>
					<ul class="submenu" id="u1">
					<li><a href="AuditReport.html" target="inform">审核报表</a></li>
					<li><a href="DataGather.html" target="inform">数据汇总</a></li>
					</ul>
				</li>
				<li id="l2">
					<div class="link" onclick="change(2)"><i class="fa fa-bar-chart"></i>数据分析<i class="fa fa-chevron-down"></i></div>
					<ul class="submenu" id="u2">
					<li><a href="sampling.html" target="inform">取样分析</a></li>
					<li><a href="compare.html" target="inform">对比分析</a></li>
					<li><a href="trend.html" target="inform">趋势分析</a></li>
					</ul>
				</li>
				<li id="l3">
					<div class="link" onclick="change(3)"><i class="fa fa-bell-o"></i>通知管理<i class="fa fa-chevron-down"></i></div>
					<ul class="submenu" id="u3">
					<li><a href="notice.php" target="inform">查看通知</a></li>
					<li><a href="PublishNotice.php" target="inform">发布通知</a></li>
					</ul>
				</li>
			</ul>
		</div>
		
	</div>
	
	<div id="mainbody">
		<iframe id="main" src="../cover.html" width="100%" height="100%" frameborder="0" name="inform" align="right"></iframe>
	</div>
	
	<!--
	<div id="footer">copyright ShangDong</div>
	-->
</body>
</html>
