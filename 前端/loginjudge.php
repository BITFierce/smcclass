<?php 
session_start(); 
?>
<html>
<body>
	<?php
		if($_POST["PID"]==""){
			echo "�������û���";
		}
		else if($_POST["psw"]==""){
			echo "����������";
		}
		else{
			$connect=mysql_connect("localhost:3306","root","root") or die("�����������ݿ�");
			mysql_select_db("test",$connect) or die("ѡ�����ݿ����");
			$sql="select * from user where username = '".$_POST["PID"]."' and passwoed = '".$_POST["psw"]."';";
			$result = mysql_query($sql,$connect);
			print_r($result);
			$news=mysql_fetch_assoc($result);
			mysql_free_result($result);
			//mysql_close($connect);
			if($news['username']==$_POST['PID']&&$news['passwoed']==$_POST['psw']){
				//�����û�����session��
				$_SESSION['username']=$_POST['PID'];
				$_SESSION['usertype']=$_POST['usertype'];
				$_SESSION['errotype']='none';	
				//�ض�������� 
				header("Location: /province.php"); 
				//ȷ���ض���󣬺������벻�ᱻִ�� 
				exit;
			}
			else{
				//���ص�½ҳ��
				header("Location: /login.php");
				$_SESSION['errotype']="user-psw";
			}
		}
	?>
</body>
</html>