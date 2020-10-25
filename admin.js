var xHRObject;
if (window.XMLHttpRequest)
{
	xHRObject = new XMLHttpRequest();
}
else if (window.ActiveXObject)
{
	xHRObject = new ActiveXObject("Microsoft.XMLHTTP");
}

function refAssign(source, span, ref)
{
	var display = document.getElementById(span);
	xHRObject.open("POST", source, true);
	xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xHRObject.onreadystatechange = function()
	{
		if ((xHRObject.readyState == 4) && (xHRObject.status == 200))
		{
			var message = xHRObject.responseText;
			display.innerHTML = message;
		}
	};
	xHRObject.send("ref=" + ref);
}

function listRequest(source, span, hours)
{
	var display = document.getElementById(span);
	xHRObject.open("POST", source, true);
	xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xHRObject.onreadystatechange = function()
	{
		if ((xHRObject.readyState == 4) && (xHRObject.status == 200))
		{
			var message = xHRObject.responseText;
			display.innerHTML = message;
		}
	};
	xHRObject.send("hours=" + hours);
}