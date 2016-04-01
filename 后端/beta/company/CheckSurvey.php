<html>
<body>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
h2 {
	color:#484848;
}
.I {
	background-color:#ffffff;
}
#demand {
	background-color:#f6f6f6;
	height:60;
	font-size:18;
}
</style>
</head>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="css/notice.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="css/CompanyReference.css" media="screen" type="text/css" />
</head>

	<br />
	<div class="container">
		
		<div class="head">
			<div></div>
			<span>已提交的调查期表格</span>
		</div>
		<div class="query">
		
			<span>查询</span>
			<input type="text" id="query" name="query"/>
			<input type="button" id="ensure" value="确定"></input>
			<input type="button" id="ensure" value="显示全部"></input>
		</div>
	</div>


<?php
	echo "<table border='1' cellpadding='5' width='100%'>
		<tr>
		<th>表格名称</td>
		<th>调查期</td>
		</tr>";
	//连接数据库
	$connect=mysql_connect("localhost:3306","root","root") or die("不能连接数据库");
	mysql_query("set names 'utf8'",$connect);
	mysql_select_db("hrmdas",$connect) or die("选择数据库错误");
	$sql="select `CompanyName`, `CompanyNumber`, `CompanyAddr` from `company`";//TODO:有待更新
	$result = mysql_query($sql,$connect);
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>
			<td><a href='CheckCompany.html' target='_blank'>".$row['CompanyName']."</a></td>
			<td>".$row['CompanyNumber']."</td>
			<td>".$row['CompanyAddr']."</td>
			</tr>";
	}
	echo "</table>";
	mysql_close($connect);
?>	 
<!--<table border="1" cellpadding="5" width="100%">
	<tr>
		<th>表格名称</td>
		<th>调查期</td>
	</tr>
	<tr>
		<td align="center"><a href="CheckEachSurvey.html" target="_blank">1月到2月人力资源调查表</a></td>
		<td align="center">1月份到2月份</td>
	</tr>
	<tr>
		<td align="center"><a href="CheckEachSurvey.html" target="_blank">2月到3月人力资源调查表</a></td>
		<td align="center">2月份到3月份</td>
	</tr>
	<tr>
		<td align="center">&nbsp;</td>
		<td align="center">&nbsp;</td>
	</tr>
</table>
-->
</body>
</html>