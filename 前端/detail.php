<?php session_start(); ?>
<html>
<head>
<title>山东省人力资源市场数据采集系统</title>
		<link rel="stylesheet" href="css/Detail.css" media="screen" type="text/css" />
		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/address.js"></script>
<style type="text/css">
#information {
	background-color:#f6f6f6;
	width:100%;
}
h2 {
	color:#484848;
}
.error 
{
	color:red;
}
</style>
</head>
<body>

<?php
	$localErr = $CompanyCodeErr = $CompanyNameErr = $CompanyNatureErr = $IndustryInvolvedErr = $MainManageErr 
	=$LinkManErr = $LinkAddressErr = $PhoneNumberErr = $PostCodeErr = $FaxErr = $EmailErr = "";
	$local = $CompanyCode = $CompanyName = $CompanyNature = $IndustryInvolved = $MainManage 
	= $LinkMan = $LinkAddress = $PhoneNumber =$PostCode = $Fax =$Email ="";
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
		echo "<script>alert('您已完善过企业信息！');</script>";
		//将信息填到表单中
		$local=$row['CompanyAddr'];
		$CompanyCode=$row['CompanyNumber'];
		$CompanyName=$row['CompanyName'];
		$CompanyNature=$row['CompanyProperty'];//性质
		$IndustryInvolved=$row['CompanyIndustry'];//所属行业
		$MainManage=$row['CompanyBusiness'];//经营
		$LinkMan=$row['CompanyContact'];
		$LinkAddress=$row['CompanyContactAddr'];
		$PhoneNumber=$row['CompanyPhone'];
		$PostCode=$row['CompanyPostcode'];
		$Fax=$row['CompanyFax'];
		$Email=$row['CompanyMail'];
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		if (empty($_POST["Local"])) 
		{
			$localErr = "<b class='error'> * 请输入地区</b>";
		} else 
		{
			$local = $_POST["Local"];
		}
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
		if (empty($_POST["CompanyNature"])) 
		{
			$CompanyNatureErr = "<b class='error'> * 请输入企业性质</b>";
		} else 
		{
			$CompanyNature = $_POST["CompanyNature"];
		}
		if (empty($_POST["IndustryInvolved"])) 
		{
			$IndustryInvolvedErr = "<b class='error'> * 请输入所属行业</b>";
		} else 
		{
			$IndustryInvolved = $_POST["IndustryInvolved"];
		}
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
		if($localErr!=''&&$CompanyCodeErr!=''&&$CompanyNameErr!=''&&$CompanyNatureErr!=''&&$IndustryInvolvedErr!=''&&$MainManageErr!=''&&$LinkManErr!=''
		&&$LinkAddressErr!=''&&$PhoneNumberErr!=''&&$PostCodeErr!=''&&$FaxErr!=''&&$EmailErr!='')
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
<h2>完善企业信息:</h2>

<table id="information" border="0" align="center">
<form name="LocalInput" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<tr>
 <td>
 *所属地区：
 <br />
<div>
市：<select id="addrCity"></select>
区/县/市：<select id="addrCounty"></select>
区域：<select id="addrArea"></select>

<script type="text/javascript">
addressInit('addrCity', 'addrCounty', 'addrArea');
</script>
</div>
 <!--
 <input type="text" name="Local" value="<?php echo $local?>"/>
 <?php echo $localErr ?>
 -->
 </td>
</tr>

<tr>
 <td>
 *组织机构代码：
 <br />
 <input type="text" name="CompanyCode" value="<?php echo $CompanyCode?>"/>
  <?php echo $CompanyCodeErr ?>
 </td>
</tr>

<tr>
 <td>
 *企业名称：
 <br />
 <input type="text" name="CompanyName" value="<?php echo $CompanyName?>"/>
 <?php echo $CompanyNameErr ?>
 </td>
</tr>

<tr>
 <td>
 *企业性质：
 <br />
   <select name="CompanyNature1" style="width:146px;">
   <option value="一级" <?php  
							if($CompanyNature=="一级") 
								echo "selected='selected'";										
						?> >一级</option>
   <option value="二级" <?php  
							if($CompanyNature=="二级") 
								echo "selected='selected'";										
						?> >二级</option>
   </select>
   <select name="CompanyNature2" style="width:146px;">
   <option value="一级" <?php  
							if($CompanyNature=="一级") 
								echo "selected='selected'";										
						?> >一级</option>
   <option value="二级" <?php  
							if($CompanyNature=="二级") 
								echo "selected='selected'";										
						?> >二级</option>
   </select>
 <?php echo $CompanyNatureErr ?>
 </td>
</tr>

<tr>
 <td>
 *所属行业：
 <br />
   <select name="IndustryInvolved1" style="width:146px;">
   <option value="一级" <?php  
							if($IndustryInvolved=="一级") 
								echo "selected='selected'";
						?> >一级</option>
   <option value="二级" <?php  
							if($IndustryInvolved=="二级") 
								echo "selected='selected'";
						?> >二级</option>
   </select>
   <select name="IndustryInvolved2" style="width:146px;">
   <option value="一级" <?php  
							if($IndustryInvolved=="一级") 
								echo "selected='selected'";
						?> >一级</option>
   <option value="二级" <?php  
							if($IndustryInvolved=="二级") 
								echo "selected='selected'";
						?> >二级</option>
   </select>
   <?php echo $IndustryInvolvedErr ?>
 </td>
</tr>

<tr>
 <td>
 *主要经营业务：
 <br />
 <input type="text" name="MainManage" value="<?php echo $MainManage?>"/>
 <?php echo $MainManageErr ?>
 </td>
</tr>

<tr>
 <td>
 *联系人：
 <br />
 <input type="text" name="LinkMan" value="<?php echo $LinkMan?>"/>
 <?php echo $LinkManErr ?>
 </td>
</tr>

<tr>
 <td>
 *联系地址：
 <br />
 <input type="text" name="LinkAddress" value="<?php echo $LinkAddress?>"/>
 <?php echo $LinkAddressErr ?>
 </td>
</tr>

<tr>
 <td>
 *邮政编码（6位）：
 <br />
 <input type="text" name="PostCode" value="<?php echo $PostCode?>"/>
 <?php echo $PostCodeErr ?>
 </td>
</tr>

<tr>
 <td>
 *联系电话：
 <br />
 <input type="text" name="PhoneNumber" value="<?php echo $PhoneNumber?>"/>
 <?php echo $PhoneNumberErr ?>
 </td>
</tr>

<tr>
 <td>
 *传真：
 <br />
 <input type="text" name="Fax" value="<?php echo $Fax?>"/>
 <?php echo $FaxErr ?>
 </td>
</tr>

<tr>
 <td>
 EMAIL(xxx@xxx.xxx)：
 <br />
 <input type="text" name="Email" value="<?php echo $Email?>"/>
 <?php echo $EmailErr ?>
 </td>
</tr>

<tr>
 <td>
 <input type="submit" value="提交"/>
 </td>
</tr>
 </form>
</table>

</body>
</html>