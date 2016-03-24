<html>
<body>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
#Company {
	background-color:#f6f6f6;
	width:100%;
}
h2 {
	color:#6f6f6f;
}
.I {
	background-color:#ffffff;
}
#demand {
	background-color:#f6f6f6;
	height:60;
	font-size:18;
}
</style>
</head>

<h2>已备案的企业：</h2>

<form id="demand" name="Query" action="" method="post">
<br />
查询关键字：
<input type="text" name="InputQuery"  class='I'/>
<input type="submit" value="查询"/>
</form>


	<?php
		echo "<table id='Company' border='1' cellpadding='20'>
			 <tr>
			 <th>企业名称</th>
			 <th>组织机构代码</th>
			 <th>所属地区</th>
			 </tr>";
		$connect=mysql_connect("localhost:3306","root","root") or die("不能连接数据库");
		mysql_query("set names 'utf8'",$connect);
		mysql_select_db("hrmdas",$connect) or die("选择数据库错误");
		$sql="select `CompanyName`, `CompanyNumber`, `CompanyAddr` from `company`";
		$result = mysql_query($sql,$connect);
		while($row=mysql_fetch_array($result))
		{
			echo "<tr>
				<td><a href='CheckCompany.html' target='_blank'>".$row['CompanyName']."</a></td>
				<td>".$row['CompanyNumber']."</td>
				<td>".$row['CompanyAddr']."</td>
				</tr>";
		}
		echo "</table>";
		mysql_close($connect);
	?>

	
</table>

</body>
</html>