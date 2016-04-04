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
		<title>山东省人力资源市场数据采集系统</title>
		<link rel="stylesheet" href="../css/Survey.css" media="screen" type="text/css" />
		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
	</head>
<body>



<script>
function changePage()
{
	window.location.href="../cover.html";
}
function isInput()
{
	if(document.getElementById("start").value==''||document.getElementById("now").value==''||document.getElementById("Other").value=='')
	{
		alert("带*的为必填！");
		return false;
	}	
	if (parseInt(document.getElementById("start").value) > parseInt(document.getElementById("now").value))
	{
		if(document.getElementById("explain1").value=='')
		{
			alert("主要原因说明不能为空！");
			return false;
		}
	}

	return true;
}
</script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$FilingPeriodEmploymentNumber=(int)$_POST['start'];
	$SurveyPeriodEmploymentNumber=(int)$_POST['now'];
	$OtherReason=$_POST['Other'];
	$EmploymentNumberReleaseType=$_POST['ReduceType'];
	$FirstReason=$_POST['Main'].$_POST['explain1'];
	$SecondReason=$_POST['two'].$_POST['explain2'];
	$ThirdReason=$_POST['three'].$_POST['explain3'];
	$time = time();
	$CollectionTime=date("y-m-d",$time);
	$SurveyPeriodID=(int)$_POST['SurveyPeriodID'];
	
	include '../sql/sqlname.php';
    $connect=mysql_connect($sql_host,$sql_user,$sql_pass);
    if (!$connect)
      die('Could not connect: ' . mysql_error());
    mysql_select_db($sql_name, $connect);
	//强转一下数据库字符
	mysql_query("set names 'utf8'",$connect);
	//获得对应的企业代码
	$sql="select * from `company` where CompanyUsername='".$_SESSION['username']."';";
	$result=mysql_query($sql,$connect);
	$row=mysql_fetch_array($result);
	$InstitutionNumber=$row['CompanyNumber'];
	$sql_insert="INSERT INTO `dataacquisition` (`InstitutionNumber`, `FilingPeriodEmploymentNumber`, `SurveyPeriodEmploymentNumber`, `OtherReason`, `EmploymentNumberReleaseType`, `FirstReason`, `SecondReason`, `ThirdReason`, `CollectionTime`, `SurveyPeriodID`, `CheckLevel`) VALUES('".$InstitutionNumber."', ".$FilingPeriodEmploymentNumber.", ".$SurveyPeriodEmploymentNumber.", '".$OtherReason."','".$EmploymentNumberReleaseType."', '".$FirstReason."', '".$SecondReason."','".$ThirdReason."', '".$CollectionTime."', ".$SurveyPeriodID." ,0)";
	if(mysql_query($sql_insert,$connect))
	{
		echo "<script>alert('提交成功！');</script>";
		echo "<html><head><meta http-equiv=\"Refresh\" content=\"0;url=survey.php\"></head></html>";
	}
	else
		echo "<script>alert('提交失败！');</script>";
	mysql_close($connect);
}
?>
		<div id="container">
		<div class="head">
			<div></div>
			<span>数据填报</span>
		</div>
		<form class="sform" name="InputSurvey" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<table>
				<tr>
					<td>*调查期</td>
					<td><select name="SurveyPeriodID">
					<?php 
						//连接数据库
						include '../sql/sqlname.php';
						$connect=mysql_connect($sql_host,$sql_user,$sql_pass);
						if (!$connect)
						  die('Could not connect: ' . mysql_error());
						mysql_select_db($sql_name, $connect);
						//获得调查期选项
						$sql="select * from `surveyperiod`";
						$result=mysql_query($sql,$connect);
						while($row=mysql_fetch_array($result))
						{
							echo "<option value='".$row['SurveyID']."'>".$row['SurveyStartTime']."-".$row['Publisher']."</option>";
						}
						mysql_close($connect);
					?>
					</select></td>
				</tr>
				<tr>
					<td>*建档期就业人数</td>
					<td><input type="text" id="start" name="start"/></td>
				</tr>
				<tr>
					<td>*调查期就业人数</td>
					<td><input type="text" id="now" name="now"/></td>
				</tr>
				<tr>
					<td>*其他原因</td>
					<td>
						<select id="Other" name="Other">
							<option value="产业结构调整">产业结构调整</option>
							<option value="重大技术改革">重大技术改革</option>
							<option value="节能减排">节能减排</option>
							<option value="淘汰落后产能">淘汰落后产能</option>
							<option value="订单不足">订单不足</option>
							<option value="原材料涨价">原材料涨价</option>
							<option value="工资,社保等工用成本上升">工资,社保等工用成本上升</option>
							<option value="自然减员">自然减员</option>
							<option value="经营资金困难">经营资金困难</option>
							<option value="税收政策变化">税收政策变化</option>
							<option value="季节性用工">季节性用工</option>
							<option value="其他">其他</option>
							<option value="自行离职">自行离职</option>
							<option value="工作调动">工作调动</option>
							<option value="企业内部调剂">企业内部调剂</option>
							<option value="劳动关系转移">劳动关系转移</option>
							<option value="劳务派遣">劳务派遣</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>就业人数减少类型</td>
					<td>
						<select id="ReduceType" name="ReduceType">
							<option value="关闭破产">关闭破产</option>
							<option value="停业整顿">停业整顿</option>
							<option value="经济性裁员">经济性裁员</option>
							<option value="业务转移">业务转移</option>
							<option value="自然减员">自然减员</option>
							<option value="正常解除或终止劳动合同">正常解除或终止劳动合同</option>
							<option value="国际因素变化影响">国际因素变化影响</option>
							<option value="自然灾害">自然灾害</option>
							<option value="重大事件影响">重大事件影响</option>
							<option value="其他">其他</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>主要原因</td>
					<td>
						<select id="Main" name="Main">
							<option value="产业结构调整">产业结构调整</option>
							<option value="重大技术改革">重大技术改革</option>
							<option value="节能减排">节能减排</option>
							<option value="淘汰落后产能">淘汰落后产能</option>
							<option value="订单不足">订单不足</option>
							<option value="原材料涨价">原材料涨价</option>
							<option value="工资,社保等工用成本上升">工资,社保等工用成本上升</option>
							<option value="自然减员">自然减员</option>
							<option value="经营资金困难">经营资金困难</option>
							<option value="税收政策变化">税收政策变化</option>
							<option value="季节性用工">季节性用工</option>
							<option value="其他">其他</option>
							<option value="自行离职">自行离职</option>
							<option value="工作调动">工作调动</option>
							<option value="企业内部调剂">企业内部调剂</option>
							<option value="劳动关系转移">劳动关系转移</option>
							<option value="劳务派遣">劳务派遣</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>主要原因说明</td>
					<td><input type="text" id="explain1" name="explain1"/></td>
				</tr>
				<tr>
					<td>次要原因</td>
					<td>
						<select id="two" name="two">
							<option value="产业结构调整">产业结构调整</option>
							<option value="重大技术改革">重大技术改革</option>
							<option value="节能减排">节能减排</option>
							<option value="淘汰落后产能">淘汰落后产能</option>
							<option value="订单不足">订单不足</option>
							<option value="原材料涨价">原材料涨价</option>
							<option value="工资,社保等工用成本上升">工资,社保等工用成本上升</option>
							<option value="自然减员">自然减员</option>
							<option value="经营资金困难">经营资金困难</option>
							<option value="税收政策变化">税收政策变化</option>
							<option value="季节性用工">季节性用工</option>
							<option value="其他">其他</option>
							<option value="自行离职">自行离职</option>
							<option value="工作调动">工作调动</option>
							<option value="企业内部调剂">企业内部调剂</option>
							<option value="劳动关系转移">劳动关系转移</option>
							<option value="劳务派遣">劳务派遣</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>次要原因说明</td>
					<td><input type="text" id="explain2" name="explain2"/></td>
				</tr>
				<tr>
					<td>第三原因</td>
					<td>
						<select id="three" name="three">
							<option value="产业结构调整">产业结构调整</option>
							<option value="重大技术改革">重大技术改革</option>
							<option value="节能减排">节能减排</option>
							<option value="淘汰落后产能">淘汰落后产能</option>
							<option value="订单不足">订单不足</option>
							<option value="原材料涨价">原材料涨价</option>
							<option value="工资,社保等工用成本上升">工资,社保等工用成本上升</option>
							<option value="自然减员">自然减员</option>
							<option value="经营资金困难">经营资金困难</option>
							<option value="税收政策变化">税收政策变化</option>
							<option value="季节性用工">季节性用工</option>
							<option value="其他">其他</option>
							<option value="自行离职">自行离职</option>
							<option value="工作调动">工作调动</option>
							<option value="企业内部调剂">企业内部调剂</option>
							<option value="劳动关系转移">劳动关系转移</option>
							<option value="劳务派遣">劳务派遣</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>第三原因说明</td>
					<td><input type="text" id="explain3" name="explain3"/></td>
				</tr>
			</table>
			<div class="i-footer">
				<input style="width:80px;" type="submit" id="done" name="done" onclick="return isInput()" value="提交"/>
			</div>
		</form>
		</div>

</body>
</html>