﻿<html>
<body>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>山东省人力资源市场数据采集系统</title>

<style type="text/css">
.I {
	background-color:#ffffff;
}
#demand {
	background-color:#f6f6f6;
	height:60;
	font-size:18;
}
#information {
	background-color:#f6f6f6;
	width:100%;
}
h2 {
	color:#484848;
}
</style>
</head>

<script>
function changePage()
{
	window.location.href="cover.html";
}
</script>

<h2>调查期：3月份至4月份</h2>

<form id="demand" name="Query" action="" method="post">
<br />
查询关键字:
<input type="text" name="InputQuery" class='I'/>
<input type="submit" value="查询"/>
</form>

<table id="information" border="0" align="center">
<tr>
 <td>
 <form name="FillingCount" action="" method="post">
 *建档期就业人数：
 <br />
 <input type="text" name="Filling"/>
 </form>
 </td>
</tr>

<tr>
 <td>
 <form name="SurveyingCount" action="" method="post">
 *调查期就业人数：
 <br />
 <input type="text" name="Survey"/>
 </form>
 </td>
</tr>

<tr>
 <td>
 <form name="OtherReason" action="" method="post">
 *其他原因：
 <br />
 <input type="text" name="Other"/>
 </form>
 </td>
</tr>

<tr>
 <td>
 <form name="ReduceType" action="" method="post">
 就业人数减少类型：
 <br />
 <input type="text" name="Reduce"/>
 </form>
 </td>
</tr>

<tr>
 <td>
 <form name="MainReason" action="" method="post">
 主要原因：
 <br />
 <input type="text" name="Main"/>
 </form>
 </td>
</tr>

<tr>
 <td>
 <form name="MainReasonInterpretion" action="" method="post">
 主要原因说明：
 <br />
 <input type="text" name="MainInterpretion"/>
 </form>
 </td>
</tr>

<tr>
 <td>
 <form name="SecondaryReason" action="" method="post">
 次要原因：
 <br />
 <input type="text" name="Secondary"/>
 </form>
 </td>
</tr>

<tr>
 <td>
 <form name="SecondaryReasonInterpretion" action="" method="post">
 次要原因说明：
 <br />
 <input type="text" name="SecondaryInterpretion"/>
 </form>
 </td>
</tr>

<tr>
 <td>
 <form name="ThirdReason" action="" method="post">
 第三原因：
 <br />
 <input type="text" name="Third"/>
 </form>
 </td>
</tr>

<tr>
 <td>
 <form name="ThridReasonInterpretion" action="" method="post">
 第三原因说明：
 <br />
 <input type="text" name="ThridInterpretion"/>
 </form>
 </td>
</tr>

<tr>
 <td>
 <form name="sure" action="" method="post">
 <input type="submit" value="提交"/>
 <input type="button" value="返回" onclick="changePage()"/>
 </td>
</tr>

</table>

</body>
</html>