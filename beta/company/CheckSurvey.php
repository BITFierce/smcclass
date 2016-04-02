<?php
	if (isset($_COOKIE["sesID"]))
	{
		session_id($_COOKIE["sesID"]);
		session_start();
	}
	else {
		session_start();
		setcookie("sesID", session_id(), time() + 3600);
	}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/notice.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="../css/CompanyReference.css" media="screen" type="text/css" />
	<script src="../js/select.js"></script>
	<script src="../js/jquery-2.0.0.min.js"></script>
	<script>
		function todetail(point)
		{
			var SurveyPeriod=point.id;
			var InstitutionNumber=point.childNodes[1].id;
			var SurveyPeriodID=point.childNodes[3].id;
			
			//alert (InstitutionNumber+SurveyPeriodID);
			location.href="SurveyDetail.php?SurveyPeriod="+SurveyPeriod+"&InstitutionNumber="+InstitutionNumber+"&SurveyPeriodID="+SurveyPeriodID;
		}
	</script>
</head>
<body>
	<div class="container">
		
		<div class="head">
			<div></div>
			<span>已备案企业</span>
		</div>
		<div>
		</div>
		<div class="title">
						<span style="width:50px;">序号</span>
						<span style="width:400px;">调查期</span>
						<span >填报时间</span>
						<span >市级审核</span>
						<span >省级审核</span>
					</div>'
		<div class="content">
			<?php
				$connect=mysql_connect("localhost:3306","root","root") or die("不能连接数据库");
				//连接数据库
				mysql_query("set names 'utf8'",$connect);
				mysql_select_db("hrmdas",$connect) or die("选择数据库错误");
				//获取企业代码
				$sql="select * from `company` where CompanyUsername = '".$_SESSION['userName']."';";
				$result = mysql_query($sql,$connect);
				$row=mysql_fetch_array($result);
				$InstitutionNumber=$row['CompanyNumber'];
				//获取企业往期调查表
				$sql="select * from `dataacquisition` where InstitutionNumber = '".$InstitutionNumber."';";
				$result = mysql_query($sql,$connect);
				$rowint=1;
				while($row=mysql_fetch_array($result))
				{	
					$SurveyPeriodID=$row['SurveyPeriodID'];
					//调查期详细信息
					$sql1 = "select * from `surveyperiod` where SurveyID = ".$SurveyPeriodID.";";
					$result1 = mysql_query($sql1,$connect);
					$row1 = mysql_fetch_array($result1);
					$SurveyPeriod = $row1['Publisher']."-".$row1['SurveyTIME'];
					echo '<div class="cstyle" onclick="todetail(this)" id="'.$SurveyPeriod.'">
							<span style="width:50px;" id="'.$row['InstitutionNumber'].'">'.$rowint.'</span>
							<span style="width:400px;" id="'.$row['SurveyPeriodID'].'">'.$SurveyPeriod.'</span>
							<span>'.$row['CollectionTime'].'</span>';
					if($row['CityCheck']=='0')
						echo '<span>未审核</span>';
					else
						echo '<span>通过</span>';
					if($row['ProvinceCheck']=='0')
						echo '<span>未审核</span>';
					else
						echo '<span>通过</span>';
					echo "</div>";
					$rowint=$rowint+1;
				}
				mysql_close($connect);
			?>
		</div>
	</div>	
</body>
</html>