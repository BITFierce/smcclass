var xmlHttp; //定义一个XMLHttpRequest

//删除用户时调用的函数
function deleteuser(point)
{
	var tdNodes=point.parentNode.parentNode.childNodes;
	var inPutNode=tdNodes[0].childNodes;//
	var SurveyID=inPutNode[0].id;//
	
	xmlHttp=GetXmlHttpObject();//获得XMLHttpRequest实体
	if(xmlHttp==null)
	{
		alert ("您的浏览器不支持HTTP Request！");
		return ;
	}
	
	var url="deletesubmittime.php";
	url=url+"?SurveyID="+SurveyID;//
	url=url+"&sid="+Math.random();//末尾添加一个随机数防止浏览器读取本地缓存
	xmlHttp.onreadystatechange=stateChanged;//当xmlHttp的准备状态改变时调用对应函数
	xmlHttp.open("GET",url,true);//通过给定的 URL 打开 XMLHTTP 对象,使用GET方法
	xmlHttp.send(null);
}

function stateChanged()
{
	if(	xmlHttp.readyState==4||xmlHttp.readyState=="complete")//当HTTP请求完成（第四种状态时）
	{
		var returnText=xmlHttp.responseText;
					   
		if(returnText=="true")
		{
			alert ("删除成功！");
			location.reload(true);//重载页面，获得最新的用户列表 
		}
		else
			alert ("删除失败！");
	}
}

function GetXmlHttpObject()
{
var xmlHttp=null;
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