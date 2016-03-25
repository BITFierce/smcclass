<?php
	session_start();
	$root = "root";//数据库用户
	$password = "root";//数据库用户密码
	$database = "hrmdas";//数据库名
	$databaseURL = "localhost:3306";//数据库地址
	$sql = "select * from `user` where `UserName` = \"".$_POST["PID"]."\";";
    
	$connect = mysql_connect($databaseURL, $root, $password);
	mysql_select_db($database, $connect);
	$result = mysql_query($sql, $connect);
	$news = mysql_fetch_assoc($result);
	mysql_free_result($result);
	$_SESSION["errorType"] = "P";
	if ($news != "")
	{
		if ($news["UserName"] == $_POST["PID"] && $news["UserPassword"] == $_POST["psw"] && $news["UserType"] == $_POST["usertype"])
		{
			$_SESSION["userName"] = $_POST["PID"];
			$_SESSION["userType"] = $_POST["usertype"];
			$_SESSION["errorType"] = "N";
			$_SESSION["username"] = $_POST["PID"];
			$_SESSION["usertype"] = $_POST["usertype"];
			$_SESSION["errortype"] = "N";
			echo "<html><head><meta http-equiv=\"Refresh\" content=\"0;url=province.php\"></head></html>";
		}
		else
		{
			echo "<html><head><meta http-equiv=\"Refresh\" content=\"0;url=login.php\"></head></html>";
		}
	}
	else
	{
		echo "<html><head><meta http-equiv=\"Refresh\" content=\"0;url=login.php\"></head></html>";
	}
?>