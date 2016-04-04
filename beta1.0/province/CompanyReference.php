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
			var username=point.id;
			var companyName=point.childNodes[3].innerHTML;
			//alert (companyName);
			location.href="CompanyDetail.php?username="+username+"&companyName="+companyName;
		}
		function refresh()
		{
			 window.location.href="CompanyReference.php";
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
			
			<div class="query">
			<span>查询</span>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<input type="text" id="query" name="query"/>
			<input type="submit" class="ensure" value="确定"></input>
			<input type="button" class="ensure" value="显示全部" onclick="refresh()"></input>
			</form>
			</div>
		</div>
		<div class="title">
						<span style="width:50px;">序号</span>
						<span style="width:400px;">企业名称</span>
						<span >机构代码</span>
						<span >所属地区</span>
					</div>
		<div class="content">
			<?php
				$connect=mysql_connect("localhost:3306","root","root") or die("不能连接数据库");
				//连接数据库
				mysql_query("set names 'utf8'",$connect);
				mysql_select_db("hrmdas",$connect) or die("选择数据库错误");
				if ($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['query']!='') 
				{
					$sql="select * from `company` where CompanyName like '%".$_POST['query']."%';";
					$result = mysql_query($sql,$connect);
					$rowint=1;
					while($row=mysql_fetch_array($result))
					{	
						echo '<div class="cstyle" onclick="todetail(this)" id="'.$row['CompanyUserName'].'">
								<span style="width:50px;" >'.$rowint.'</span>
								<span style="width:400px;" id="'.$row['CompanyName'].'">'.$row['CompanyName'].'</span>
								<span>'.$row['CompanyNumber'].'</span>
								<span>'.$row['CompanyAddr'].'</span>
							</div>';
						$rowint=$rowint+1;
					}
				}
				else
				{
					$sql="select * from `company`";
					$result = mysql_query($sql,$connect);
					$rowint=1;
					while($row=mysql_fetch_array($result))
					{	
						echo '<div class="cstyle" onclick="todetail(this)" id="'.$row['CompanyUserName'].'">
								<span style="width:50px;" >'.$rowint.'</span>
								<span style="width:400px;" id="'.$row['CompanyName'].'">'.$row['CompanyName'].'</span>
								<span>'.$row['CompanyNumber'].'</span>
								<span>'.$row['CompanyAddr'].'</span>
							</div>';
						$rowint=$rowint+1;
					}
				}
				mysql_close($connect);
			?>
		</div>
	</div>	
</body>
</html>