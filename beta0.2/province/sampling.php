<html>

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
	<link rel="stylesheet" href="../css/sampling.css" media="screen" type="text/css" />
	<?php
	include '../sql/sqlname.php';
	$con=mysql_connect($sql_host,$sql_user,$sql_pass);
	if (!$con)
		die('Could not connect: ' . mysql_error());
	mysql_select_db($sql_name, $con);
	
	$result=mysql_query('SELECT CompanyAddr,count(CompanyNumber) AS num FROM company GROUP BY CompanyAddr');
	$nums=array();
	while($row=mysql_fetch_array($result))
	{
		$nums[$row['CompanyAddr']]=$row['num'];
	}
	echo '
	<script>
		$(function () {
		$("#picture").highcharts({
				chart: {
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: "各市企业数量占比"
				},
				tooltip: {
					pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>"
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: "pointer",
						dataLabels: {
							enabled: true,
							color: "#000000",
							connectorColor: "#000000",
							format: "<b>{point.name}</b>: {point.percentage:.1f} %"
						}
					}
				},
				series: [{
					type: "pie",
					name: "Browser share",
					data: [';
					foreach($nums as $key => $value)
					echo '["'.$key.'",'.$value.']';
					echo '
					]
				}]
			});
		});
	</script>';
	?>
</head>

<body>
	<div class="container">
		
		<div class="head">
			<div></div>
			<span>取样分析</span>
		</div>
		<?php
		if(count($nums)>0)
		{
			echo '
			<div class="title">
				<div id="picture" style="min-width:700px;height:400px"></div>
			</div>';
		}
		else
		{
			echo '<p>目前没有企业数据！</p>';
		}
		?>
	</div>

</body>
</html>