﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

<?php
	try
	{
		$root = "root";//数据库用户
		$password = "root";//数据库用户密码
		$database = "hrmdas";//数据库名
		$databaseURL = "localhost:3306";//数据库地址

		$connect = mysql_connect($databaseURL, $root, $password);
		mysql_query("set names 'utf8'",$connect);
		mysql_select_db($database, $connect);
?>

<script>
	function allNotice()
	{
		$(".cstyle").each(function() {
			$(this).attr("style","display:block");
		});
	}
	function proNotice()
	{
		$(".cstyle").each(function() {
			if ($("span:eq(2)",this).text() == "省级")
			{
				$(this).attr("style","display:block");
			}
			else
			{
				$(this).attr("style","display:none");
			}
		});
	}
	function entNotice()
	{
		$(".cstyle").each(function() {
			if ($("span:eq(2)",this).text() == "企业级")
			{
				$(this).attr("style","display:block");
			}
			else
			{
				$(this).attr("style","display:none");
			}
		});
	}
	function citNotice()
	{
		$(".cstyle").each(function() {
			if ($("span:eq(2)",this).text() == "市级")
			{
				$(this).attr("style","display:block");
			}
			else
			{
				$(this).attr("style","display:none");
			}
		});
	}
</script>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../css/notice.css" media="screen" type="text/css" />
	<script src="../js/jquery-2.0.0.min.js" type="text/javascript"></script>
	
</head>
<?php
	if (isset($_GET["nid"]))
	{
		try
		{
			$root = "root";//数据库用户
			$password = "root";//数据库用户密码
			$database = "hrmdas";//数据库名
			$databaseURL = "localhost:3306";//数据库地址

			$connect = mysql_connect($databaseURL, $root, $password);
			mysql_query("set names 'utf8'",$connect);
			mysql_select_db($database, $connect);
			$sql = "delete from `notice` where `NoticeID`=".$_GET["nid"].";";
			$result = mysql_query($sql, $connect);
            echo "<script>alert(\"删除成功！\");</script>";
            echo "<script>location=\"notice.php\"</script>";
		}
		catch (Exception $e)
		{
            echo "<script>alert(\"出错了！错误信息：".$e."\");</script>";
		}
	}
?>
<body>

	<div class="container">
	
		<div class="head">
			<div></div>
			<span>通知列表</span>
		</div>
		
		<div class="type">
			<span>通知类型</span>
			<a class="typea" href="#" onclick="allNotice();">全部通知</a>
			<a class="typea" href="#" onclick="proNotice();">省通知</a>
			<a class="typea" href="#" onclick="entNotice();">企业通知</a>
			<a class="typea" href="#" onclick="citNotice();">市通知</a>
		</div>
		
		<div class="title">
			<span>序号</span>
			<span style="width:300px;">通知标题</span>
			<span style="width:100px;">类型</span>
			<span style="width:200px;">作者</span>
			<span style="width:100px;">发布时间</span>
		</div>
		
		<div class="content">
		<?php
			
			$sql = "select `Author`, `NoticeID`, `Title`, `Type`,`Time` from `notice`";
		    
			$result = mysql_query($sql, $connect);
			while ($news = mysql_fetch_assoc($result))
			{
				echo "<div class=\"cstyle\" onclick=\"location = 'NoticeDetail.php?nid=".$news["NoticeID"]."';\">";
				echo "<span>".$news["NoticeID"]."</span>";
				echo "<span style=\"width:300px;\">".$news["Title"]."</span>";
				if ($news["Type"] == "1")
					echo "<span style=\"width:100px;\">"."省级"."</span>";
				else if ($news["Type"] == "2")
					echo "<span style=\"width:100px;\">"."企业级"."</span>";
				else if ($news["Type"] == "3")
					echo "<span style=\"width:100px;\">"."市级"."</span>";
				echo "<span style=\"width:200px;\">".$news["Author"]."</span>";
				echo "<span style=\"width:100px;\">".$news["Time"]."</span>";
				if (strstr($news["Author"],"市用户") != false)
				{
					echo "<a href=\"notice.php?nid=".$news["NoticeID"]."\">删除</a>";
					echo "<a href=\"EditNotice.php?nid=".$news["NoticeID"]."\">修改</a>";
				}
				echo "</div>";
			}
			mysql_free_result($result);
		}
		catch(Exception $e)
		{
      	  echo "<script>alert(\"出错了！错误信息：".$e."\");</script>";
		}
		?>
		</div>
	
	</div>

</body>

</html>