<?php
	function date_picker($name, $startyear=NULL, $endyear=NULL)
	{
		if($startyear==NULL) 
		{
			$startyear = date("Y")- 2;
		}else
		{
			$startyear = date("Y")- $startyear;
		}
		if($endyear==NULL) 
		{
			$endyear=date("Y");
		}else
		{
			$endyear = date("Y")+ $endyear;
		}

		$months=array('','January','February','March','April','May','June','July','August', 'September','October','November','December');

		// Month dropdown
		$html="<div class=\"form-inline\"><select class=\"form-control\" name=\"".$name."Month\" id=\"".$name."Month\">";

		for($i=01;$i<=12;$i++)
		{
		   $html.="<option value='$i'>$months[$i]</option>";
		}
		$html.="</select> &nbsp&nbsp&nbsp";
	   
		// Day dropdown
		$html.="<select class=\"form-control\" name=\"".$name."Day\" id=\"".$name."Day\">";
		for($i=01;$i<=31;$i++)
		{
		   $html.="<option value='$i'>$i</option>";
		}
		$html.="</select> &nbsp&nbsp&nbsp";

		// Year dropdown
		$html.="<select class=\"form-control\" name=\"".$name."Year\" id=\"".$name."Year\">";

		for($i=$startyear;$i<=$endyear;$i++)
		{      
		  $html.="<option value='$i'>$i</option>";
		}
		$html.="</select></div></br> ";

		return $html;
	}
?>