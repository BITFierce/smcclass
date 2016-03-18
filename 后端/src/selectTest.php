<html>
<body>
<?php
	$con=mysql_connect("localhost:3306","root","root");
	if(!$con)
	{
		die('could not connect:'.mysql_error());
	}
	mysql_select_db("db_telbookdb", $con);
	$result=mysql_query("select * from tb_telbook");
	while($row = mysql_fetch_array($result))
	{
		echo $row['name'] . " " . $row['tel'];
		echo "<br />";
	}
	mysql_close($con);
?>
</body>
</html>