<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../css/ReportDetail.css" media="screen" type="text/css" />
</head>

<body>
	<?php
		$SurveyPeriod=$_GET['SurveyPeriod'];
		$InstitutionNumber=$_GET['InstitutionNumber'];
		$SurveyPeriodID=$_GET['SurveyPeriodID'];
		//echo "<script> alert ('".$username."');</script>";
		//建立数据连接
		$connect=mysql_connect("localhost:3306","root","root")or die ("不能连接数据库");
		//强转一下数据库字符
		mysql_query("set names 'utf8'",$connect);
		mysql_select_db("hrmdas",$connect)or die("选择数据库失败");
		$sql="select * from `dataacquisition` where InstitutionNumber ='".$InstitutionNumber."' and SurveyPeriodID =".$SurveyPeriodID.";";
		$result=mysql_query($sql,$connect); 
		$row=mysql_fetch_array($result);
		$InstitutionNumber=$row['InstitutionNumber'];
		$FilingPeriodEmploymentNumber=$row['FilingPeriodEmploymentNumber'];
		$SurveyPeriodEmploymentNumber=$row['SurveyPeriodEmploymentNumber'];
		$OtherReason=$row['OtherReason'];
		$EmploymentNumberReleaseType=$row['EmploymentNumberReleaseType'];
		$FirstReason=$row['FirstReason'];
		$SecondReason=$row['SecondReason'];
		$ThirdReason=$row['ThirdReason'];
		
		if($row['CheckLevel']==0)
		{	
			$CityCheck=$row='未审核';
			$ProvinceCheck='未审核';
		}
		else if($row['CheckLevel']==1)
		{	
			$CityCheck=$row='通过';
			$ProvinceCheck='未审核';
		}
		else if($row['CheckLevel']==2)
		{	
			$CityCheck=$row='通过';
			$ProvinceCheck='通过';
		}
		else
		{	
			$CityCheck=$row='未通过';
			$ProvinceCheck='未通过';
		}
	?>
	<div class="container">
		
		<div class="head">
			<div></div>
			<span><a href="CheckSurvey.php">往期调查表</a></span>
			<span>&nbsp;>&nbsp;</span>
			<span><?php echo $SurveyPeriod; ?></span>
		</div>
		
		<div class="title">
			<span style="width:150px;">数据项</span>
			<span style="width:500px;">内容</span>
		</div>
		
		<div class="content">
			<div class="cstyle">
				<span style="width:150px;">企业代码</span>
				<span style="width:500px;"><?php echo $InstitutionNumber; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">建档人数</span>
				<span style="width:500px;"><?php echo $FilingPeriodEmploymentNumber; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">调查期人数</span>
				<span style="width:500px;"><?php echo $SurveyPeriodEmploymentNumber; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">其他原因</span>
				<span style="width:500px;"><?php echo $OtherReason; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">人数减少类型</span>
				<span style="width:500px;"><?php echo $EmploymentNumberReleaseType; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">主要原因</span>
				<span style="width:500px;"><?php echo $FirstReason; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">次要原因</span>
				<span style="width:500px;"><?php echo $SecondReason; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">次要原因</span>
				<span style="width:500px;"><?php echo $ThirdReason; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">市级审核</span>
				<span style="width:500px;"><?php echo $CityCheck?>
				</span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">省级审核</span>
				<span style="width:500px;"><?php echo $ProvinceCheck ?>
				</span>
			</div>
		</div>
		
	</div>

</body>

</html>