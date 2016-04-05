<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
	try
	{

	include '../sql/sqlname.php';
	$connect=mysql_connect($sql_host,$sql_user,$sql_pass) or die('Could not connect: ' . mysql_error());
	mysql_select_db($sql_name, $connect);
	mysql_query("set names 'utf8'",$connect);
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="../css/AuditReport.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="../css/notice.css" media="screen" type="text/css" />
	<script src="../js/jquery-2.0.0.min.js" type="text/javascript"></script>
</head>

<body>

	<div class="container">
		
		<div class="head">
			<div></div>
			<span>报表审核</span>
		</div>
		
		<div class="type">
			<span>报表类型</span>
			<a class="typea" href="#" onclick="allReport();">全部</a>
			<a class="typea" href="#" onclick="passReport();">已审核</a>
			<a class="typea" href="#" onclick="unpassReport();">未审核</a>
		</div>
		
		<div class="title">
			<span style="width:300px;">序号</span>
			<span style="width:300px;">企业</span>
			<span style="width:200px;">调查期</span>
			<span style="width:100px;">状态</span>
		</div>
		
		<div class="content">
			<?php
				
				$sql = "select `CompanyNumber`, `CompanyName`, `CollectionTime`, `CheckLevel` from `dataacquisition`, `company`, `surveyperiod` where `dataacquisition`.`institutionNumber` = `company`.`CompanyNumber` and `dataacquisition`.`SurveyPeriodID` = `surveyperiod`.`SurveyID`;";
			    
				$result = mysql_query($sql, $connect);
				while ($res = mysql_fetch_assoc($result))
				{
					if ($res['CheckLevel'] != "0")
					{
						echo "<div class=\"cstyle\" onclick=\"location = 'ReportDetail.php?rid=".$res["CompanyNumber"]."';\">";
						echo "<span style=\"width:300px;\">".$res["CompanyNumber"]."</span>";
						echo "<span style=\"width:300px;\">".$res["CompanyName"]."</span>";
						echo "<span style=\"width:200px;\">".$res["CollectionTime"]."</span>";
						if ($res["CheckLevel"] == "1")
							echo "<span style=\"width:100px;\">"."未审核"."</span>";
						else if ($res["CheckLevel"] == "2")
							echo "<span style=\"width:100px;\">"."审核通过"."</span>";
						else if ($res["CheckLevel"] == "3")
							echo "<span style=\"width:100px;\">"."审核未通过"."</span>";
						echo "</div>";
					}
				}
				mysql_free_result($result);
			}
			catch(Exception $e)
			{
	      	  echo "<script>alert(\"出错了！错误信息：".$e."\");</script>";
			}
			?>
		</div>
	
	</div>
	
</body>

</html>
<script>
	function allReport()
	{
		$(".cstyle").each(function() {
			$(this).attr("style","display:block");
		});
	}
	function passReport()
	{
		$(".cstyle").each(function() {
			if ($("span:eq(3)",this).text() != "未审核")
			{
				$(this).attr("style","display:block");
			}
			else
			{
				$(this).attr("style","display:none");
			}
		});
	}
	function unpassReport()
	{
		$(".cstyle").each(function() {
			if ($("span:eq(3)",this).text() == "未审核")
			{
				$(this).attr("style","display:block");
			}
			else
			{
				$(this).attr("style","display:none");
			}
		});
	}
</script>