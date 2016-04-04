<?php
$sql_host='localhost:3306';
$sql_user='root';
$sql_pass='root';
$sql_name='hrmdas';

if(defined('SAE_MYSQL_HOST_M'))
{
	$sql_host=SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT;
	$sql_user=SAE_MYSQL_USER;
	$sql_pass=SAE_MYSQL_PASS;
	$sql_name=SAE_MYSQL_DB;
}
?>
