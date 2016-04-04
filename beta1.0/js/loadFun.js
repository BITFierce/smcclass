function loadFun(){
var array = document.getElementsByTagName("ul").item(0).childNodes;
for(var i= 0 ; i < array.length ; i ++){
var childnodes = array[i].childNodes;
for(var j = 0 ; j < childnodes.length ; j ++){
if(childnodes[j].tagName == "UL"){
childnodes[j].style.display="none";
}
}
}
}