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
		<title>山东省人力资源市场数据采集系统</title>
		<link rel="stylesheet" href="/css/Detail.css" media="screen" type="text/css" />
		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
		<script type="text/javascript" src="/js/address.js"></script>
	</head>
<body>

<?php
	$CompanyCodeErr = $CompanyNameErr = $MainManageErr =$LinkManErr = $LinkAddressErr = $PhoneNumberErr = $PostCodeErr = $FaxErr = $EmailErr = "";
	$local = $CompanyCode = $CompanyName = $CompanyNature = $IndustryInvolved = $MainManage = $LinkMan = $LinkAddress = $PhoneNumber =$PostCode = $Fax =$Email ="";
	//连接数据库
	$connect=mysql_connect("localhost:3306","root","root")or die ("不能连接数据库");
	//强转一下数据库字符
	mysql_query("set names 'utf8'",$connect);
	mysql_select_db("hrmdas",$connect)or die("选择数据库失败");
	$sql="select *from company where CompanyUsername ='".$_SESSION['userName']."';";
	$result=mysql_query($sql,$connect); 
	$row=mysql_fetch_array($result);
	//判断结果集是否为空
	if(!empty($row))
	{
		//如果不为空，弹窗提示已经完善过

		echo "<script> alert ('您已完善过企业信息！');</script>";
		//返回界面
		echo "<html><head><meta http-equiv=\"Refresh\" content=\"0;url=../cover.html\"></head></html>";
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$local = $_POST["Addr1"].$_POST['Addr2'].$_POST['Addr3'];
		if (empty($_POST["CompanyCode"])) 
		{
			$CompanyCodeErr = "<b class='error'> * 请输入组织机构代码</b>";
		} else 
		{
			$CompanyCode = $_POST["CompanyCode"];
			if (!preg_match("/^.{1,9}$/",$CompanyCode))
			{
				$CompanyCodeErr = "<b class='error'> * 组织机构代码不能超过9位</b>";
			}
			if (!preg_match("/^[0-9a-zA-Z]*$/",$CompanyCode))
			{
				$CompanyCodeErr = "<b class='error'> * 组织机构代码只能包含字母或数字</b>";
			}
		}
		if (empty($_POST["CompanyName"])) 
		{
			$CompanyNameErr = "<b class='error'> * 请输入企业名称</b>";
		} else 
		{
			$CompanyName = $_POST["CompanyName"];
		}

		$CompanyNature = $_POST["CompanyNature"];

		$IndustryInvolved = $_POST["IndustryInvolved"];

		if (empty($_POST["MainManage"])) 
		{
			$MainManageErr = "<b class='error'> * 请输入主要经营业务</b>";
		} else 
		{
			$MainManage = $_POST["MainManage"];
		}
		if (empty($_POST["LinkMan"])) 
		{
			$LinkManErr = "<b class='error'> * 请输入主要联系人</b>";
		} else 
		{
			$LinkMan = $_POST["LinkMan"];
		}
		if (empty($_POST["LinkAddress"])) 
		{
			$LinkAddressErr = "<b class='error'> * 请输入联系地址</b>";
		} else 
		{
			$LinkAddress = $_POST["LinkAddress"];
		}
		if (empty($_POST["PhoneNumber"])) 
		{
			$PhoneNumberErr = "<b class='error'> * 请输入联系电话</b>";
		} else 
		{
			$PhoneNumber = $_POST["PhoneNumber"];
		}
		if (empty($_POST["PostCode"])) 
		{
			$PostCodeErr = "<b class='error'> * 请输入邮政编码</b>";
		} else 
		{
			$PostCode = $_POST["PostCode"];
			if (!preg_match("/^[0-9]{6}$/",$PostCode))
			{
				$PostCodeErr = "<b class='error'> * 邮编必须为6位数字</b>";
			}
		}		
		if (empty($_POST["Fax"])) 
		{
			$FaxErr = "<b class='error'> * 请输入传真</b>";
		} else 
		{
			$Fax = $_POST["Fax"];
		}
		if (empty($_POST["Email"])) 
		{
			$Email ='';
		} else 
		{
			$Email = $_POST["Email"];
			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$Email)) 
			{
				$EmailErr = "<b class='error'> * 请输入有效的Emali</b>";
			}
			
		}

		//判断是否可以提交到数据库
		if($CompanyCodeErr==''&&$CompanyNameErr==''&&$MainManageErr==''&&$LinkManErr==''&&$LinkAddressErr==''&&$PhoneNumberErr==''&&$PostCodeErr==''&&$FaxErr==''&&$EmailErr=='')
		{
			$sql_insert="INSERT INTO company (CompanyAddr, CompanyUsername, CompanyNumber, CompanyName ,CompanyProperty, CompanyIndustry, CompanyBusiness ,
			CompanyContact, CompanyContactAddr, CompanyPhone ,CompanyPostcode, CompanyFax, CompanyMail) 
			VALUES ('".$local."', '".$_SESSION['username']."', '".$CompanyCode."', '".$CompanyName."', '".$CompanyNature."', '".$IndustryInvolved.
			"', '".$MainManage."', '".$LinkMan."', '".$LinkAddress."', '".$PhoneNumber."', '".$PostCode.
			"', '".$Fax."', '".$Email."')";
			if(mysql_query($sql_insert,$connect))
				echo "<script>alert('提交成功！');</script>";
			else
				echo "<script>alert('提交失败！');</script>";
		}
	}
	//关闭数据库连接
	mysql_close($connect);
?>
		<div id="container">
			<div class="head">
				<div></div>
				<span>完善企业信息</span>
			</div>
			<form id="table" class="tform" name="table" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<table>
					<tr>
						<td>*所属地区:</td>
						<td>
							市：<select id="nature1" name="Addr1"></select>
							区/县/市：<select id="nature2" name="Addr2"></select>
							区域：<select id="nature3" name="Addr3"></select>
							<script>
								addressInit('nature1', 'nature2', 'nature3');
							</script>
						</td>
					</tr>
					<tr>
						<td>*组织机构代码</td>
						<td><input type="text" id="organization" name="CompanyCode" value="<?php echo $CompanyCode?>"/><?php echo $CompanyCodeErr ?></td>
					</tr>
					<tr>
						<td>*企业名称</td>
						<td><input type="text" id="name" name="CompanyName" value="<?php echo $CompanyName?>"/><?php echo $CompanyNameErr ?></td>
					</tr>
					<tr>
						<td>*企业性质</td>
						<td>
							<select id="nature1" name="CompanyNature">
								<option value="国有企业">国有企业</option>
								<option value="集体企业">集体企业</option>
								<option value="联营企业">联营企业</option>
								<option value="股份合作制企业">股份合作制企业</option>
								<option value="私营企业">私营企业</option>
								<option value="个体户">个体户</option>
								<option value="合伙企业">合伙企业</option>
								<option value="有限责任公司">有限责任公司</option>
								<option value="股份有限公司">股份有限公司</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>*所属行业</td>
						<td>
							<select id="industry1" name="IndustryInvolved">
								<option value="农，林，牧，鱼业">农，林，牧，鱼业</option>
								<option value="采矿业">采矿业</option>
								<option value="制造业">制造业</option>
								<option value="电力，燃气及水的生产和供应业">电力，燃气及水的生产和供应业</option>
								<option value="建筑业">建筑业</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>*主要经营业务</td>
						<td><input type="text" id="work" name="MainManage" value="<?php echo $MainManage?>"/><?php echo $MainManageErr ?></td>
					</tr>
					<tr>
						<td>*联系人</td>
						<td><input type="text" id="linker" name="LinkMan" value="<?php echo $LinkMan?>"/><?php echo $LinkManErr ?></td>
					</tr>
					<tr>
						<td>*联系地址</td>
						<td><input type="text" id="address" name="LinkAddress" value="<?php echo $LinkAddress?>"/><?php echo $LinkAddressErr ?></td>
					</tr>
					<tr>
						<td>*联系电话</td>
						<td><input type="text" id="PhoneNumber" name="PhoneNumber" value="<?php echo $PhoneNumber?>"/><?php echo $PhoneNumberErr ?></td>
					</tr>
					<tr>
						<td>*邮政编码</td>
						<td><input type="text" id="code" name="PostCode" value="<?php echo $PostCode?>"/><?php echo $PostCodeErr ?></td>
					</tr>
					<tr>
						<td>*传真</td>
						<td><input type="text" id="Fax" name="Fax" value="<?php echo $Fax?>"/><?php echo $FaxErr ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" id="email" name="Email" value="<?php echo $Email?>"/><?php echo $EmailErr ?></td>
					</tr>
				</table>
				<div class="i-footer">
					<input style="width:80px;" type="submit" id="done" name="done" value="完成"/>
				</div>
			</form>
			

			
		</div>
		

</body>
</html>