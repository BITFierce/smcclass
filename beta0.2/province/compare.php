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
	<link rel="stylesheet" href="../css/compare.css" media="screen" type="text/css" />
	<?php
	include '../sql/sqlname.php';
	$con=mysql_connect($sql_host,$sql_user,$sql_pass);
	if (!$con)
		die('Could not connect: ' . mysql_error());
	mysql_select_db($sql_name, $con);
	
	mysql_query("set names 'utf8'",$con);
	$result=mysql_query('SELECT SurveyID,SurveyStartTime FROM surveyperiod LIMIT 24');
	$surveys=array();
	while($row=mysql_fetch_array($result))
	{
		$surveys[$row['SurveyID']]=$row['SurveyStartTime'];
	}
	
	$s1=null;
	$s2=null;
	if(array_key_exists('s1', $_GET) && array_key_exists('s2', $_GET))
	{
		$s1=$_GET['s1'];
		$s2=$_GET['s2'];
	
		$mode=1;
		if(array_key_exists('mode', $_GET))
			$mode=intval($_GET['mode']);
		
		$modestr=($mode==1?'CompanyAddr':$mode==2?'CompanyProperty':'CompanyIndustry');
		
		$type=1;
		if(array_key_exists('type', $_GET))
			$mode=intval($_GET['type']);
		
		if($type==1)$data1[]=$row['CompanyNum'];
		else if($type==2)$data1[]=$row['FileNum'];
		else if($type==3)$data1[]=$row['SurveyNum'];
		else $data1[]=$row['FileNum']-$row['SurveyNum'];
		
		$result=mysql_query('SELECT * FROM ((SELECT '.$modestr.',count(DISTINCT CompanyNumber) AS CompanyNum,sum(FilingPeriodEmploymentNumber) AS FileNum,sum(SurveyPeriodEmploymentNumber) AS SurveyNum '.
							'FROM company INNER JOIN dataacquisition WHERE SurveyPeriodID=1 GROUP BY '.$modestr.') AS s1 '. 
							'INNER JOIN (SELECT '.$modestr.',count(DISTINCT CompanyNumber) AS CompanyNum,sum(FilingPeriodEmploymentNumber) AS FileNum,sum(SurveyPeriodEmploymentNumber) AS SurveyNum '.
							'FROM company INNER JOIN dataacquisition WHERE SurveyPeriodID=1 GROUP BY '.$modestr.') AS s2 ON s1.'.$modestr.'=s2.'.$modestr.')');
		
		$data1=array();
		$data2=array();
		$names=array();
		while($row=mysql_fetch_array($result))
		{
			$names[]=$row[$modestr];
			if($type==1)$data1[]=$row['s1.CompanyNum'];
			else if($type==2)$data1[]=$row['s1.FileNum'];
			else if($type==3)$data1[]=$row['s1.SurveyNum'];
			else $data1[]=$row['s1.FileNum']-$row['s1.SurveyNum'];
			if($type==1)$data2[]=$row['s2.CompanyNum'];
			else if($type==2)$data2[]=$row['s2.FileNum'];
			else if($type==3)$data2[]=$row['s2.SurveyNum'];
			else $data2[]=$row['s2.FileNum']-$row['s2.SurveyNum'];
		}
	
	echo '<script>
		$(function () {
		$("#picture").highcharts({
				xAxis: {
					categories: ['.$surveys[$s1].','.$surveys[$s2].']
				},
				yAxis: {
					title: {
						text: "数量"
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: "#808080"
					}]
				},
				tooltip: {
					valueSuffix: ""
				},
				legend: {
					layout: "vertical",
					align: "right",
					verticalAlign: "middle",
					borderWidth: 0
				},
				series: [';
				for($i=0;$i<count($names);++$i)
					echo '{name:"'.$names[$i].'",data:['.$data1[$i].','.$data1[$i].']},';
				echo ']
			});
		} );
	</script>
	<script>
	$(function () {
			$("#hist").highcharts({
				chart: {
					type: "column"
				},
				xAxis: {
					categories: ['.$surveys[$s1].','.$surveys[$s2].']
				},
				yAxis: {
					min: 0,
					title: {
						text: "数量"
					}
				},
				plotOptions: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
				series: [';
				for($i=0;$i<count($names);++$i)
					echo '{name:"'.$names[$i].'",data:['.$data1[$i].','.$data1[$i].']},';
				echo ']
			});
		});
	</script>';
	
		
	}
	?>
	<script>
		function choose(sel){
			if(sel.value=="1"){
				document.getElementById("pictureAndtable").style.display="block";
				document.getElementById("hist").style.display="none";
			}
			else if(sel.value=="2"){
				document.getElementById("pictureAndtable").style.display="none";
				document.getElementById("hist").style.display="block";
			}
		}
	</script>
</head>
	
<body>

	<div class="container">
	
		<div class="head">
			<div></div>
			<span>对比分析</span>
		</div>
		
		<?php
		
		if(count($surveys)==0)
		{
			echo '<p>目前没有调查期！</p>';
		}
		else
		{
			echo '
			<div class="title">
				<span style="width:80%;">调查期企业岗位变动情况</span>
				<span>
					<select id="chose" onchange="choose(this);">
						<option value="1">折线图与表格显示</option>
						<option value="2">柱状图显示</option>
					</select>
				</span>
			</div>
			
			<div class="title">
				<form name="chooseSurvey" action="" method="get">
					<span>选择调查期</span>
					<span>
						<select name="s1" style="width: 100px;">';
							foreach($surveys as $key => $value)
								echo '<option value="'.$key.'">'.$value.'</option>';
							echo '
						</select>
					</span>
					<span style="width: 20px;">和</span>
					<span>
						<select name="s2" style="width: 100px;">';
							foreach($surveys as $key => $value)
								echo '<option value="'.$key.'">'.$value.'</option>';
							echo '
						</select>
					</span>
					<span style="width: 20px;"></span>
					<span>选择分析方式:</span>
					<span>
						<select name="mode" style="width: 100px;">
							<option value="1">地区</option>
							<option value="2">企业性质</option>
							<option value="3">行业</option>
						</select>
					</span>
					<span>选择分析指标:</span>
					<span>
						<select name="type" style="width: 100px;">
							<option value="1">企业总数</option>
							<option value="2">建档期总岗位数</option>
							<option value="3">调查期总岗位数</option>
							<option value="4">岗位变化总数</option>
						</select>
					</span>
					<span>
						<input type="submit" id="ensure" value="确定"></input>
					</span>
				</form>
			</div>';
			
			if($s1!=null)
			{
				echo '
				<div id="pictureAndtable" style="display: block;">
					<div id="picture" style="width:45%;height:380px;"></div>
					<div id="table" style="width:45%;height: 400px;">
						<table id="mytable" border="1" style="table-layout:fixed">
							<tr>
								<th>比较项目</th>
								<th>'.$surveys[$s1].'</th>
								<th>'.$surveys[$s2].'</th>
							</tr>';
							for($i=0;$i<count($names);++$i)
								echo '<tr><th>'.$names[$i].'</th><td>'.$data1[$i].'</td><td>'.$data1[$i].'</td></tr>';
							echo '
						</table>
					</div>	
				</div>
				<div id="hist" style="width:100%;height:400px;display:none"></div>';
			}
		
		}
		?>
	</div>

</body>

</html>