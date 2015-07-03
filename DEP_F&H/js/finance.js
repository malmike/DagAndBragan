function proveAjaxCompatible()
{
	var httpxml;
	try
	{
		// Firefox, Opera 8.0+, Safari
		httpxml=new XMLHttpRequest();
		return httpxml;
		
	}
	catch (e)
	{
		// Internet Explorer
		try
		{
			httpxml=new ActiveXObject("Msxml2.XMLHTTP");
			return httpxml;
		}
		catch (e)
		{
			try
			{
				httpxml=new ActiveXObject("Microsoft.XMLHTTP");
				return httpxml;
			}
			catch (e)
			{
				alert("Your browser does not support AJAX!");
				return false;
			}
		}
	}
}




function AjaxFunction()
{
	var httpxml = proveAjaxCompatible();
	
	function stateck() 
    {

		if(httpxml.readyState==4)
		{
			//alert(httpxml.responseText);
			var myarray = JSON.parse(httpxml.responseText);			
			
			// Remove the options from 2nd dropdown list 
			for(j=document.changeform.itemChoosen.options.length-1;j>=0;j--)
			{
				document.changeform.itemChoosen.remove(j);
			}
			if(itemType == "chem"){
				for (i=0;i<myarray.data.length;i++)
				{
					var optn = document.createElement("OPTION");
					optn.text = myarray.data[i].Name;
					optn.value = myarray.data[i].idChemicalsList;  // You can change this to subcategory 
					document.changeform.itemChoosen.options.add(optn);
				} 
			}
			if(itemType == "equip"){
				for (i=0;i<myarray.data.length;i++)
				{
					var optn = document.createElement("OPTION");
					optn.text = myarray.data[i].Name;
					optn.value = myarray.data[i].idEquipment;  // You can change this to subcategory 
					document.changeform.itemChoosen.options.add(optn);
				} 
			}
		}
    } // end of function stateck
	
	var url="EntryForms/dd.php";
	var itemType=document.getElementById('itemType').value;
	
	url=url+"?itemType="+itemType;
	url=url+"&sid="+Math.random();
	
	//alert(url);
	
	httpxml.onreadystatechange=stateck;
	
	//alert(url);
	httpxml.open("GET",url,true);
	httpxml.send(null);
  }
  
  
  
  
    
function purchaseOrderAjaxFunction()
{
	var httpxml = proveAjaxCompatible();
	
	function statech() 
    {
		if(httpxml.readyState==4)
		{
			//alert(httpxml.responseText);
			var myarray = JSON.parse(httpxml.responseText);			
			
			// Remove the options from 2nd dropdown list 
			for(j=document.changeform.purchaseOrder.options.length-1;j>=0;j--)
			{
				document.changeform.purchaseOrder.remove(j);
			}


			for (i=0;i<myarray.data.length;i++)
			{
				var optn = document.createElement("OPTION");
				optn.text = myarray.data[i].idPurchaseOrder;
				optn.value = myarray.data[i].idPurchaseOrder;  // You can change this to subcategory 
				document.changeform.purchaseOrder.options.add(optn);
			} 
		}
    } // end of function stateck
	
	var url="EntryForms/getPurchaseOrder.php";
	var dateRange=document.getElementById('dateRange').value;
	
	url=url+"?dateRange="+dateRange;
	url=url+"&sid="+Math.random();
	
	//alert(url);
	
	httpxml.onreadystatechange=statech;
	
	//alert(url);
	httpxml.open("GET",url,true);
	httpxml.send(null);
  }
  


  
  
function delivaryNoteAjaxFunction()
{
	var httpxml = proveAjaxCompatible();
	
	function statech() 
    {
		if(httpxml.readyState==4)
		{
			//alert(httpxml.responseText);
			var myarray = JSON.parse(httpxml.responseText);			
			
			// Remove the options from 2nd dropdown list 
			for(j=document.changeform.delivaryNote.options.length-1;j>=0;j--)
			{
				document.changeform.delivaryNote.remove(j);
			}


			for (i=0;i<myarray.data.length;i++)
			{
				var optn = document.createElement("OPTION");
				optn.text = myarray.data[i].idDelivaryNote;
				optn.value = myarray.data[i].idDelivaryNote;  // You can change this to subcategory 
				document.changeform.delivaryNote.options.add(optn);
			} 
		}
    } // end of function stateck
	
	var url="EntryForms/getDelivaryNote.php";
	var dateRange=document.getElementById('dateRange').value;
	
	url=url+"?dateRange="+dateRange;
	url=url+"&sid="+Math.random();
	
	//alert(url);
	
	httpxml.onreadystatechange=statech;
	
	//alert(url);
	httpxml.open("GET",url,true);
	httpxml.send(null);
  }
  
  
  
  
  
  function inventoryOutAjaxFunction()
{
	var httpxml = proveAjaxCompatible();
	
	function statech() 
    {
		if(httpxml.readyState==4)
		{
			//alert(httpxml.responseText);
			var myarray = JSON.parse(httpxml.responseText);			
			
			// Remove the options from 2nd dropdown list 
			for(j=document.changeform.team.options.length-1;j>=0;j--)
			{
				document.changeform.team.remove(j);
			}


			for (i=0;i<myarray.data.length;i++)
			{
				var optn = document.createElement("OPTION");
				optn.text = myarray.data[i].FName+" "+myarray.data[i].LName;
				optn.value = myarray.data[i].idTeam; // You can change this to subcategory 
				document.changeform.team.options.add(optn);
			} 
		}
    } // end of function stateck
	
	var url="EntryForms/getTeam.php";
	var dateRange=document.getElementById('dateRange').value;
	
	url=url+"?dateRange="+dateRange;
	url=url+"&sid="+Math.random();
	
	//alert(url);
	
	httpxml.onreadystatechange=statech;
	
	//alert(url);
	httpxml.open("GET",url,true);
	httpxml.send(null);
  }
  
  
  
  