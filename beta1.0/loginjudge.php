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
	$root = "root";//数据库用户
	$password = "root";//数据库用户密码
	$database = "hrmdas";//数据库名
	$databaseURL = "localhost:3306";//数据库地址
	$sql = "select * from `user` where `UserName` = \"".$_POST["PID"]."\";";
    
	include 'sql/sqlname.php';
	$connect=mysql_connect($sql_host,$sql_user,$sql_pass);
	if (!$connect)
		die('Could not connect: ' . mysql_error());
	mysql_select_db($sql_name, $connect);

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
			if ($_POST["usertype"] == "1")
			{
				echo "<script>location = \"province/province.php\"</script>";
			}
			else if ($_POST["usertype"] == "2")
			{
				echo "<script>location = \"company/company.php\"</script>";
			}
			else if ($_POST["usertype"] == "3")
			{
				echo "<script>location = \"city/city.php\"</script>";
			}
		}
		else
		{
			echo "<script>location = \"login.php\"</script>";
		}
	}
	else
	{
		echo "<script>location = \"login.php\"</script>";
	}
?>