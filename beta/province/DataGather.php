﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	<link rel="stylesheet" href="../css/DataGather.css" media="screen" type="text/css" />
	<script>
		$(function () {
			$("#picture").highcharts({
				title: {
					text: "企业汇总数据",
					x: -20 //center
				},
				subtitle: {
					text: "来自...",
					x: -20
				},
				xAxis: {
					categories: ["一月", "二月", "三月", "四月", "五月", "六月","七月", "八月", "九月", "十月", "十一月", "十二月"]
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
					data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 90.3, 18.3, 13.9, 9.6]
				}]
			});
		});
	</script>
</head>
	
<body>

	<div class="container">
	
		<div class="head">
			<div></div>
			<span>数据汇总</span>
		</div>
		
		<div class="title">
			<div id="picture" style="min-width:700px;height:400px"></div>
		</div>
	
	</div>
	
</body>

</html>