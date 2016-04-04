<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../css/ReportDetail.css" media="screen" type="text/css" />
</head>

<body>
	
	<div class="container">
		<?php
			try
			{
				if (isset($_GET["rid"]))
				{
					$rid = $_GET["rid"];

					$root = "root";//数据库用户
					$password = "root";//数据库用户密码
					$database = "hrmdas";//数据库名
					$databaseURL = "localhost:3306";//数据库地址
					$connect = mysql_connect($databaseURL, $root, $password);
					mysql_query("set names 'utf8'",$connect);
					mysql_select_db($database, $connect);
					$sql = "select * from `dataacquisition`, `company`, `surveyperiod` where `dataacquisition`.`institutionNumber` = `company`.`CompanyNumber` and `dataacquisition`.`SurveyPeriodID` = `surveyperiod`.`SurveyID` and `InstitutionNumber` = '".$rid."';";
					$result = mysql_query($sql, $connect);
					$res = mysql_fetch_assoc($result);
				
			
		?>
		<div class="head">
			<div></div>
			<span><a href="report.php">审核报表</a></span>
			<span>&nbsp;>&nbsp;</span>
			<span><?php echo $res["CompanyName"]; ?></span>
		</div>
		
		<div class="title">
			<span style="width:150px;">数据项</span>
			<span>必填</span>
			<span style="width:500px;">内容</span>
		</div>
		
		<div class="content">
			<div class="cstyle">
				<span style="width:150px;">建档期就业人数</span>
				<span>是</span>
				<span style="width:500px;"><?php echo $res["FilingPeriodEmploymentNumber"]; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">调查期就业人数</span>
				<span>是</span>
				<span style="width:500px;"><?php echo $res["SurveyPeriodEmploymentNumber"]; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">其他原因</span>
				<span>是</span>
				<span style="width:500px;"><?php echo $res["OtherReason"]; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">就业人数减少类型</span>
				<span>否</span>
				<span style="width:500px;"><?php echo $res["EmploymentNumberReleaseType"]; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">主要原因</span>
				<span>否</span>
				<span style="width:500px;"><?php echo $res["FirstReason"]; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">主要原因说明</span>
				<span>否</span>
				<span style="width:500px;"><?php echo $res["FirstReason"]; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">次要原因</span>
				<span>否</span>
				<span style="width:500px;"><?php echo $res["SecondReason"]; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">次要原因说明</span>
				<span>否</span>
				<span style="width:500px;"><?php echo $res["SecondReason"]; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">第三原因</span>
				<span>否</span>
				<span style="width:500px;"><?php echo $res["ThirdReason"]; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">第三原因说明</span>
				<span>否</span>
				<span style="width:500px;"><?php echo $res["ThirdReason"]; ?></span>
			</div>
		</div>
		
		<span style="display:block; float:left; margin:10px;">
		注意：若调查期数据小于建档期数据，就业人数减少类型和就业人数减少主要原因及说明为必填项。
		</span>
		<form <?php echo 'action="ReportDetailPost.php?cid='.$res['CompanyNumber'].'"'; ?> method="post">
		<div class="r-foot">
			<input type="submit" id="unpass" name="unpass" value="审核不通过" />
			<input type="submit" id="pass" name="pass" value="审核通过" />
		</div>
		</form>
		<?php
				}
				else
				{
					echo '<script>alert("非法访问！");</script>';
				}
			}
			catch (Exception $e)
			{
				alert("出错了！错误信息：".$e);
			}
		?>
	</div>
	
</body>

</html>