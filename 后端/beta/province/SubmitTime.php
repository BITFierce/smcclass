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
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="css/TimeAndUser.css" media="screen" type="text/css" />
		<link rel="stylesheet" href="css/UserManage.css" type="text/css"/>
		<script src="js/SubmitTimeAdmin/deletesubmittime.js" type="text/javascript"></script>
		<script src="js/SubmitTimeAdmin/commit.js" type="text/javascript"></script>
		<script type="text/javascript">
			function add(point){
				var table1=document.getElementById("mytable").insertRow(1);
				var addRow1=table1.insertCell(0);
				addRow1.innerHTML='<input type="text" id="" class="text" value="请输入时间"/>';
				var addRow3=table1.insertCell(1);
				addRow3.innerHTML='<input type="text" class="text" value="'+point.parentNode.id+'"/>';
				var addRow1=table1.insertCell(2);
				addRow1.innerHTML='<input id="buttonStyle" type="button" value="删除" onclick="deleteuser(this)"/> <input id="buttonStyle" type="button" value="提交修改" onclick=" return surechange(this)"/>';
			}
		</script>
		<style>
			#red{
				color:red;
			}
			input{
				border:0;
			}
		</style>
	</head>
	
	<body>
		<div class="head">
			<div></div>
			<span>上报时限管理</span>
		</div>
		<b id="red">使用说明：点击删除按钮将直接删除对应上报时限，修改和新增上报时限时，完成编辑后需要点击提交修改！</b>
		<form name="input" action="" method="post">
			<table width="100%" id="mytable" border="1" cellpadding="10" id="time" style="table-layout:fixed">
				<tr>
					<th>调查期时间</th>
					<th>修改人</th>
					<th>操作</th>
				</tr>
				<?php
					//连接数据库
					$connect=mysql_connect("localhost:3306","root","root") or die("不能连接数据库");
					mysql_query("set names 'utf8'",$connect);
					mysql_select_db("hrmdas",$connect) or die("选择数据库错误");
					$sql="select * from `goverment` where GovermentUsername='".$_SESSION['userName']."'";
					$result = mysql_query($sql,$connect);
					$row=mysql_fetch_array($result);
					$GovermentName=$row['GovermentName'];
					$sql="select * from `surveyperiod`";
					$result = mysql_query($sql,$connect);
					while($row=mysql_fetch_array($result))
					{
						echo '<tr><td><input type="text" id="'.$row['SurveyID'].'" class="text" value = "'.$row['SurveyTIME'].'" align="center"/></td>';
						echo '<td><input type="text" class="text" value = "'.$row['Publisher'].'" align="center"/></td>';
						echo '<td><input id="buttonStyle" type="button" value="删除" onclick="deleteuser(this)"/> <input id="buttonStyle" type="button" value="提交修改" onclick="return surechange(this)"/></td>
							  </tr>';
					}
					mysql_close($connect);
				?>
				<tr><td colspan="3" id="<?php echo $GovermentName;?>"align="center"><input id="buttonStyle" type="button" value="增加调查期" onclick="add(this)"></td></tr>
			</table>
		</form>
	</body>
</html>