var xmlHttp;

function surechange(point)
{
	var tdNodes=point.parentNode.parentNode.childNodes;
	var inPutNode1=tdNodes[0].childNodes;//
	var inPutNode2=tdNodes[1].childNodes;//
	var inPutNode3=tdNodes[2].childNodes;//
	var username=inPutNode1[0].value;//获得用户名
	var userpassword=inPutNode3[0].value;
	var usertype=inPutNode2[0].value;
	
	//利用正则表达式判断修改内容是否合法
	var reg = /^[0-9a-zA-Z]+$/
	if((!reg.test(username))||(!reg.test(userpassword)))
	{
		alert ("修改内容不合法！用户名或用户密码只能为字母或数字！");
		return false;
	}
	xmlHttp=GetXmlHttpRequest();
	if(xmlHttp==null)
	{
		alert ("浏览器不支持HTTP REQUEST！");
	}
	
	var url="surechangeuser.php"
	url=url+"?username="+username;
	url=url+"&userpassword="+userpassword;
	url=url+"&usertype="+usertype;
	url=url+"&sid="+Math.random();//末尾添加随机数 防止读取缓存
	
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	return true;
}
function stateChanged()
{
	if(xmlHttp.readyState==4||xmlHttp.readyState=="complete")
	{
		var returnText=xmlHttp.responseText;		   
		if(returnText=="true")
		{
			alert ("修改成功！");
			location.reload(true);//重载页面，获得最新的用户列表 
		}
		else
			alert ("修改失败！");
	}
}
function GetXmlHttpRequest()
{
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}
