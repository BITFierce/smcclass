﻿<?php
	$SurveyTIME=$_GET['SurveyTIME'];
	$Publisher=$_GET['Publisher'];
	$SurveyID=$_GET['SurveyID'];
	//连接数据库
	include '../sql/sqlname.php';
	$connect=mysql_connect($sql_host,$sql_user,$sql_pass) or die('Could not connect: ' . mysql_error());
	mysql_select_db($sql_name, $connect);
	mysql_query("set names 'utf8'",$connect);
	$sql="delete from `surveyperiod` where SurveyID = '".$SurveyID."';";
	$result = mysql_query($sql,$connect);
	if($SurveyID=='')
		$sql="insert into `surveyperiod` (Publisher, SurveyStartTime) values('".$Publisher."', '".$SurveyTIME."');";
	else
		$sql="insert into `surveyperiod` (Publisher, SurveyID, SurveyStartTime) values('".$Publisher."', '".$SurveyID."', '".$SurveyTIME."');";
	$result = mysql_query($sql,$connect);
	if($result=='true')
		echo "true";
	else
		echo "false";
	mysql_close($connect);
?>