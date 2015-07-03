function AjaxFunction()
{
	var httpxml;
	try
	{
		// Firefox, Opera 8.0+, Safari
		httpxml=new XMLHttpRequest();
		
	}
	catch (e)
	{
		// Internet Explorer
		try
		{
			httpxml=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			try
			{
				httpxml=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e)
			{
				alert("Your browser does not support AJAX!");
				return false;
			}
		}
	}
	
	function stateck() 
    {

		if(httpxml.readyState==4)
		{
			//alert(httpxml.responseText);
			var myarray = JSON.parse(httpxml.responseText);			
			
			// Remove the options from 2nd dropdown list 
			for(j=document.changeform.clients.options.length-1;j>=0;j--)
			{
				document.changeform.clients.remove(j);
			}


			for (i=0;i<myarray.data.length;i++)
			{
				var optn = document.createElement("OPTION");
				optn.text = myarray.data[i].Name;
				optn.value = myarray.data[i].RefNo;  // You can change this to subcategory 
				document.changeform.clients.options.add(optn);

			} 
		}
    } // end of function stateck
	
	var url="EntryForms/dd.php";
	var dateRange=document.getElementById('dateRange').value;
	
	url=url+"?dateRange="+dateRange;
	url=url+"&sid="+Math.random();
	
	//alert(url);
	
	httpxml.onreadystatechange=stateck;
	
	//alert(url);
	httpxml.open("GET",url,true);
	httpxml.send(null);
  }