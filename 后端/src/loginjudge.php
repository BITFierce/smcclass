<?php 
session_start(); 
?>
<html>
<body>
	<?php
		if($_POST["PID"]==""){
			//返回登陆页面
				header("Location: /login.php");
				$_SESSION['errotype']="no-user";
		}
		else if($_POST["psw"]==""){
			//返回登陆页面
				header("Location: /login.php");
				$_SESSION['errotype']="no-psw";
		}
		else{
			$connect=mysql_connect("localhost:3306","root","root") or die("不能连接数据库");
			mysql_select_db("hrmdas",$connect) or die("选择数据库错误");
			$sql="select * from user where UserName = '".$_POST["PID"]."' and UserPassword = '".$_POST["psw"]."' and UserType = '".$_POST["usertype"]."';";
			$result = mysql_query($sql,$connect);
			print_r($result);
			$news=mysql_fetch_assoc($result);
			mysql_free_result($result);
			//echo $news['UserName'].$news['UserPassword'].$news['UserType'];
			//mysql_close($connect);
			
			if($news['UserName']==$_POST['PID']&&$news['UserPassword']==$_POST['psw']&&$news['UserType']==$_POST['usertype']){
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