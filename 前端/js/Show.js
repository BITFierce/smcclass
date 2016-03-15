var arrays = new Array("rule","sheet","inform");
var lastTagId = -1;
function Show(tagId)
{
    if (lastTagId == tagId)
    {
        lastTagId = -1;
        document.getElementById(tagId).parentNode.style.backgroundColor = "RGB(0,0,0)"; 
        document.getElementById(tagId).style.display = "none";
    }
    else
    {
        for (var i = 0; i < arrays.length; i++)
        { 
            if (arrays[i] == tagId) { 
                document.getElementById(arrays[i]).parentNode.style.backgroundColor = "RGB(0,0,0)"; 
                document.getElementById(arrays[i]).style.display = "block"; 
            } 
            else { 
                document.getElementById(arrays[i]).parentNode.style.backgroundColor = "RGB(0,0,0)"; 
                document.getElementById(arrays[i]).style.display = "none"; 
            } 
        }
        lastTagId = tagId;
    }
}
