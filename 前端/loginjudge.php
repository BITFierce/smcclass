<?php 
session_start(); 
?>
<html>
<body>
	<?php
		if($_POST["PID"]==""){
			echo "请输入用户名";
		}
		else if($_POST["psw"]==""){
			echo "请输入密码";
		}
		else{
			$connect=mysql_connect("localhost:3306","root","root") or die("不能连接数据库");
			mysql_select_db("test",$connect) or die("选择数据库错误");
			$sql="select * from user where username = '".$_POST["PID"]."' and passwoed = '".$_POST["psw"]."';";
			$result = mysql_query($sql,$connect);
			print_r($result);
			$news=mysql_fetch_assoc($result);
			mysql_free_result($result);
			//mysql_close($connect);
			if($news['username']==$_POST['PID']&&$news['passwoed']==$_POST['psw']){
				//设置用户名到session里
				$_SESSION['username']=$_POST['PID'];
				$_SESSION['usertype']=$_POST['usertype'];
				$_SESSION['errotype']='none';	
				//重定向浏览器 
				header("Location: /province.php"); 
				//确保重定向后，后续代码不会被执行 
				exit;
			}
			else{
				//返回登陆页面
				header("Location: /login.php");
				$_SESSION['errotype']="user-psw";
			}
		}
	?>
</body>
</html>