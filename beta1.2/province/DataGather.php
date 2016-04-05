<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="../js/highcharts.js"></script>
	<script type="text/javascript" src="../js/exporting.js"></script>
	<link rel="stylesheet" href="../css/notice.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="../css/trend.css" media="screen" type="text/css" />
	<?php
	include '../sql/sqlname.php';
	$con=mysql_connect($sql_host,$sql_user,$sql_pass);
	if (!$con)
		die('Could not connect: ' . mysql_error());
	mysql_select_db($sql_name, $con);
	mysql_query("set names 'utf8'",$con);
	
	$result=mysql_query('SELECT DISTINCT SurveyStartTime,sum(FilingPeriodEmploymentNumber) AS FileNum,sum(SurveyPeriodEmploymentNumber) AS SurveyNum '.
						'FROM dataacquisition INNER JOIN (SELECT SurveyID,SurveyStartTime FROM surveyperiod ORDER BY SurveyStartTime LIMIT 12) AS surveyperiod ON dataacquisition.SurveyPeriodID=surveyperiod.SurveyID '.
						'GROUP BY SurveyID');

	$dates=array();
	$deltaNum=array();
	$beginNum=null;
	$prevNum;
	while($row=mysql_fetch_array($result))
	{
		$fileNum=$row['FileNum'];
		$surveyNum=$row['SurveyNum'];
		if($beginNum==null)
		{
			$beginNum=$fileNum;
			$prevNum=$fileNum;
		}
		$dates[]=$row['SurveyStartTime'];
		$deltaNum[]=$surveyNum-$prevNum;
		$prevNum=$surveyNum;
	}
	// select 
	
	
	if(count($dates)>0)
	{
		echo '<script>
			$(function () {
				$("#picture").highcharts({
					title: {
						text: "企业岗位变动情况",
						x: -20
					},
					xAxis: {
						categories: [';
		foreach($dates as $date)
			echo '"'.$date.'",';
		echo ']
					},
					yAxis: {
						title: {
							text: "百分比(%)"
						},
						plotLines: [{
							value: 0,
							width: 1,
							color: "#808080"
						}]
					},
					tooltip: {
						valueSuffix: "%"
					},
					legend: {
						layout: "vertical",
						align: "right",
						verticalAlign: "middle",
						borderWidth: 0
					},
					series: [{
						name: "岗位变动数量占比",
						data: [';
		foreach($deltaNum as $delta)
			echo (100*$delta/($prevNum-$beginNum)).',';
		echo ']
					}]
				});
			});
		</script>';
	}
	?>
</head>
	
<body>

	<div class="container">
	
		<div class="head">
			<div></div>
			<span>趋势分析</span>
		</div>
		
		<?php
		if(count($dates)>0)
		{
			echo '<div class="title"><div id="picture" style="min-width:700px;height:400px"></div></div>';
		}
		else
		{
			echo '<p>目前没有调查期！</p>';
		}
	
		?>
	</div>
	
</body>

</html>