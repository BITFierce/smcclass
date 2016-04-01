<?php
	$username=$_GET['username'];
	$userpassword=$_GET['userpassword'];
	$usertype=$_GET['usertype'];
	//连接数据库
	$connect=mysql_connect("localhost:3306","root","root") or die("不能连接数据库");
	mysql_query("set names 'utf8'",$connect);
	mysql_select_db("hrmdas",$connect) or die("选择数据库错误");
	$sql="delete from `user` where UserName = '".$username."';";
	$result = mysql_query($sql,$connect);
	$sql="insert into `user` (UserName, UserPassword, UserType) values('".$username."', '".$userpassword."', '".$usertype."');";
	$result = mysql_query($sql,$connect);
	if($result=='true')
		echo "true";
	else
		echo "false";
	mysql_close($connect);
?>