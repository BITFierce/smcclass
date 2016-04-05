var xmlHttp;

function surechange(point)
{
	var tdNodes=point.parentNode.parentNode.childNodes;
	var inPutNode1=tdNodes[0].childNodes;//
	var inPutNode2=tdNodes[1].childNodes;//
	var SurveyTIME=inPutNode1[0].value;//
	var SurveyID=inPutNode1[0].id;
	var Publisher=inPutNode2[0].value;
	
	//利用正则表达式判断修改内容是否合法
	var reg = /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/
	if((!reg.test(SurveyTIME)))
	{
		alert ("修改内容不合法！调查期时间格式为****-**-**！");
		return false;
	}
	xmlHttp=GetXmlHttpRequest();
	if(xmlHttp==null)
	{
		alert ("浏览器不支持HTTP REQUEST！");
	}
	
	var url="commitsubmittime.php"
	url=url+"?SurveyTIME="+SurveyTIME;
	url=url+"&Publisher="+Publisher;
	url=url+"&SurveyID="+SurveyID;
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
