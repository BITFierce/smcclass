<?php
	$SurveyTIME=$_GET['SurveyTIME'];
	$Publisher=$_GET['Publisher'];
	$SurveyID=$_GET['SurveyID'];
	//连接数据库
	$connect=mysql_connect("localhost:3306","root","root") or die("不能连接数据库");
	mysql_query("set names 'utf8'",$connect);
	mysql_select_db("hrmdas",$connect) or die("选择数据库错误");
	$sql="delete from `surveyperiod` where SurveyID = '".$SurveyID."';";
	$result = mysql_query($sql,$connect);
	if($SurveyID=='')
		$sql="insert into `surveyperiod` (Publisher, SurveyTIME) values('".$Publisher."', '".$SurveyTIME."');";
	else
		$sql="insert into `surveyperiod` (Publisher, SurveyID, SurveyTIME) values('".$Publisher."', '".$SurveyID."', '".$SurveyTIME."');";
	$result = mysql_query($sql,$connect);
	if($result=='true')
		echo "true";
	else
		echo "false";
	mysql_close($connect);
?>