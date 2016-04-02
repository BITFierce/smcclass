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
	<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../css/NoticeDetail.css" media="screen" type="text/css" />
</head>

<body>
	
	<div class="container">
		<?php
			try
			{
				$nid = $_GET["nid"];

				$root = "root";//数据库用户
				$password = "root";//数据库用户密码
				$database = "hrmdas";//数据库名
				$databaseURL = "localhost:3306";//数据库地址
				$sql = "select * from `notice` where `NoticeID`=".$nid;
			    
				$connect = mysql_connect($databaseURL, $root, $password);
				mysql_query("set names 'utf8'",$connect);
				mysql_select_db($database, $connect);
				$result = mysql_query($sql, $connect);
				$res = mysql_fetch_assoc($result);
				echo "<div class=\"head\">
				<div></div>
				<span><a href=\"notice.php\">通知列表</a></span>
				<span>&nbsp;>&nbsp;</span>
				<span>".$res["Title"]."</span>
				</div>
				<div class=\"middle\">
				<div class=\"title\">
				<span style=\"font-size:25px; height:35px;\">".$res["Title"]."</span>
				<span style=\"font-size:14px; height:15px;\">";
				if ($res["Type"] == "1")
				{
					echo "省级 ";
				}
				else if ($res["Type"] == "2")
				{
					echo "企业级 ";
				}
				else if ($res["Type"] == "3")
				{
					echo "市级 ";
				}
				echo "作者：".$res["Author"];
				echo "</span>
				</div>
				<div class=\"content\" style=\"text-align:center; font:20px;\">".
				$res["Text"]."
				</div>
				<div class=\"time\">
				".$res["Time"]."
				</div>
				</div>";
			}
			catch (Exception $e)
			{
				alert("出错了！错误信息：".$e);
			}
		?>
		
		
	</div>
	
</body>

</html>