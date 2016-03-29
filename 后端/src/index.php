<!DOCTYPE html>
<html>
<body>
<?php
	$con=mysql_connect("localhost:3306","root","root");
	if(!$con)
	{
		die('could not connect:'.mysql_error());
	}
	mysql_select_db("db_telbookdb", $con);
	mysql_query("INSERT INTO tb_telbook (no,name,tel) 
	VALUES (1, 'Peter', '18810298211')");
	mysql_close($con);
?>
</body>
</html>
