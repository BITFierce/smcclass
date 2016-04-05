<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="../css/TimeAndUser.css" media="screen" type="text/css" />
		<link rel="stylesheet" href="../css/UserManage.css" type="text/css"/>
		<script src="../js/UserAdmin/deleteuser.js" type="text/javascript"></script>
		<script src="../js/UserAdmin/surechange.js" type="text/javascript"></script>
		<script type="text/javascript">
			function add(){
				var table1=document.getElementById("mytable").insertRow(1);
				var addRow1=table1.insertCell(0);
				addRow1.innerHTML='<input type="text" class="text" value="请输入用户名"/>';
				var addRow2=table1.insertCell(1);
				addRow2.innerHTML='<select> <option value="1">省用户</option><option value="3">市级用户</option><option value="2">企业用户</option></select>';
				var addRow3=table1.insertCell(2);
				addRow3.innerHTML='<input type="text" class="text" value="输入用户密码"/>';
				var addRow1=table1.insertCell(3);
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
			<span>用户信息管理</span>
		</div>
		<b id="red">使用说明：点击删除按钮将直接删除对应用户，修改和新增用户时，完成编辑后需要点击提交修改！</b>
		<form name="input" action="" method="post">
			<table width="100%" id="mytable" border="1" cellpadding="10" id="time" style="table-layout:fixed">
				<tr>
					<th>用户名</th>
					<th>用户类型</th>
					<th>用户密码</th>
					<th>操作</th>
				</tr>
				<?php
					//连接数据库
					include '../sql/sqlname.php';
					$connect=mysql_connect($sql_host,$sql_user,$sql_pass) or die('Could not connect: ' . mysql_error());
					mysql_select_db($sql_name, $connect);
					mysql_query("set names 'utf8'",$connect);
					$sql="select * from `user`";
					$result = mysql_query($sql,$connect);
					while($row=mysql_fetch_array($result))
					{
						echo '<tr><td><input type="text" class="text" id = "'.$row['UserName'].'" value = "'.$row['UserName'].'" align="center"/></td>';
						if($row['UserType']=='1')
							echo '<td><select> <option value="1" selected="selected">省用户</option><option value="3">市级用户</option><option value="2">企业用户</option></select></td>';
						else if($row['UserType']=='3')
							echo '<td><select> <option value="1">省用户</option><option value="3" selected="selected">市级用户</option><option value="2">企业用户</option></select></td>';
						else
							echo '<td><select> <option value="1">省用户</option><option value="3">市级用户</option><option value="2" selected="selected">企业用户</option></select></select></td>';
						echo '<td><input type="text" class="text" value="'.$row['UserPassword'].'" align="center"/></td>
							  <td><input id="buttonStyle" type="button" value="删除" onclick="deleteuser(this)"/> <input id="buttonStyle" type="button" value="提交修改" onclick="return surechange(this)"/></td>
							  </tr>';
					}
					mysql_close($connect);
				?>
				<tr><td colspan="4" align="center"><input id="buttonStyle" type="button" value="增加用户" onclick="add()"></td></tr>
			</table>
		</form>
	</body>
</html>