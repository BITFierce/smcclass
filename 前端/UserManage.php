<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css">
			h2 {
				color:#484848;
			}
			input.text{
				border-style:none;
			}
		</style>
		
		<script type="text/javascript">
			function add(){
				var table1=document.getElementById("mytable").insertRow(1);
				var addRow1=table1.insertCell(0);
				addRow1.innerHTML='<input type="text" class="text" value="请输入用户名"/>';
				var addRow2=table1.insertCell(1);
				addRow2.innerHTML='<select> <option value="1">省用户</option><option value="2">企业用户</option>"</select>';
				var addRow3=table1.insertCell(2);
				addRow3.innerHTML='<input type="text" class="text" value="输入用户密码"/>';
				var addRow1=table1.insertCell(3);
				addRow1.innerHTML='<input type="button" value="删除" onclick="<?php ?>"/> <input type="button" value="提交修改" onclick="sure(this)"/>';
			}
		</script>
	</head>
	
	<body>
		<h2>用户信息管理：</h2>
		<form name="input" action="" method="post">
			<table width="100%" id="mytable" border="1" cellpadding="10" id="time" style="table-layout:fixed">
				<tr>
					<th>用户名</th>
					<th>用户类型</th>
					<th>用户密码</th>
					<th>操作</th>
				</tr>
				<tr>
				<td><input type="text" class="text" value="ZTL" align="center"/></td>
				<td><select> <option value="1" selected="selected">省用户</option><option value="2">企业用户</option>"</select></td>
				<td><input type="text" class="text" value="123456" align="center"/></td>
				<td><input type="button" value="删除" onclick="del(this)"/> <input type="button" value="提交修改" onclick="sure(this)"/></td>
				</tr>
				<tr><td colspan="4" align="center"><input type="button" value="增加用户" onclick="add()"></td></tr>
			</table>
		</form>
	</body>
</html>