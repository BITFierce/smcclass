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
		$username=$_GET['username'];
		$companyName=$_GET['companyName'];
		//echo "<script> alert ('".$username."');</script>";
		//建立数据连接
		$connect=mysql_connect("localhost:3306","root","root")or die ("不能连接数据库");
		//强转一下数据库字符
		mysql_query("set names 'utf8'",$connect);
		mysql_select_db("hrmdas",$connect)or die("选择数据库失败");
		$sql="select *from company where CompanyUsername ='".$username."';";
		$result=mysql_query($sql,$connect); 
		$row=mysql_fetch_array($result);
		$CompanyAddr=$row['CompanyAddr'];
		$CompanyNumber=$row['CompanyNumber'];
		$CompanyProperty=$row['CompanyProperty'];
		$CompanyIndustry=$row['CompanyIndustry'];
		$CompanyBusiness=$row['CompanyBusiness'];
		$CompanyContact=$row['CompanyContact'];
		$CompanyContactAddr=$row['CompanyContactAddr'];
		$CompanyPostcode=$row['CompanyPostcode'];
		$CompanyPhone=$row['CompanyPhone'];
		$CompanyFax=$row['CompanyFax'];
		$CompanyMail=$row['CompanyMail'];
	?>
	<div class="container">
		
		<div class="head">
			<div></div>
			<span><a href="CompanyReference.php">已备案企业</a></span>
			<span>&nbsp;>&nbsp;</span>
			<span><?php echo $companyName; ?></span>
		</div>
		
		<div class="title">
			<span style="width:150px;">数据项</span>
			<span style="width:500px;">内容</span>
		</div>
		
		<div class="content">
			<div class="cstyle">
				<span style="width:150px;">所属地区</span>
				<span style="width:500px;"><?php echo $CompanyAddr; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">组织机构代码</span>
				<span style="width:500px;"><?php echo $CompanyNumber; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">企业名称</span>
				<span style="width:500px;"><?php echo $username; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">企业性质</span>
				<span style="width:500px;"><?php echo $CompanyProperty; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">所属行业</span>
				<span style="width:500px;"><?php echo $CompanyIndustry; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">主要经营业务</span>
				<span style="width:500px;"><?php echo $CompanyBusiness; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">联系人</span>
				<span style="width:500px;"><?php echo $CompanyContact; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">联系地址</span>
				<span style="width:500px;"><?php echo $CompanyContactAddr; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">邮政编码</span>
				<span style="width:500px;"><?php echo $CompanyPostcode; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">联系电话</span>
				<span style="width:500px;"><?php echo $CompanyPhone; ?></span>
			</div>
			<div class="cstyle">
				<span style="width:150px;">传真</span>
				<span style="width:500px;"><?php echo $CompanyFax; ?></span>
			</div>
			<div class="cstyle" style="margin-bottom:20px;">
				<span style="width:150px;">Email</span>
				<span style="width:500px;"><?php echo $CompanyMail; ?></span>
			</div>
		</div>
		
	</div>

</body>

</html>