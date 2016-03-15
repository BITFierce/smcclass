var arrays = new Array("rule","sheet","inform"); 
function Show(tagId) { 
for (var i = 0; i < arrays.length; i++) { 
if (arrays[i] == tagId) { 
document.getElementById(arrays[i]).parentNode.style.backgroundColor = "RGB(0,0,0)"; 
document.getElementById(arrays[i]).style.display = "block"; 
} 
else { 
document.getElementById(arrays[i]).parentNode.style.backgroundColor = "RGB(0,0,0)"; 
document.getElementById(arrays[i]).style.display = "none"; 
} 
} 
} 