<?php
	$SurveyID=$_GET['SurveyID'];
	//�������ݿ�
	$connect=mysql_connect("localhost:3306","root","root") or die("�����������ݿ�");
	mysql_query("set names 'utf8'",$connect);
	mysql_select_db("hrmdas",$connect) or die("ѡ�����ݿ����");
	$sql="delete from `surveyperiod` where SurveyID = '".$SurveyID."';";
	$result = mysql_query($sql,$connect);
	if($result=='true')
		echo "true";
	else
		echo "false";
	mysql_close($connect);
?>