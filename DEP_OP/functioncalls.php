<?php error_reporting(E_ALL ^ E_NOTICE);?>
<?php
	session_start();	

	include'includeParameters.php';
	
	$a = $_REQUEST['view'];
	$b = $_REQUEST['insert'];
	$c = $_REQUEST['connect'];
	$d = $_REQUEST['action'];
	
	ophome();
	if(!$a && !$b && !$c && !$d)
	{
		showCalendar();
	}
	switch($a)
	{	
		case "viewWorkplan":
			showCalendar();
			break;	

        case "viewTeam":
            viewTeamList($dbo);
            break;
		
	}
	
	switch($b)
	{
		
		case "insTeam":
			teamForm($con);
			break;
			
		case "insWorkPlan":
			workPlanForm($con);
			break;
			
		case "insInspection":
			inspectionForm();
			break;
		
	}
	
	switch($c)
	{
		
		case "team":
			insTeam($con);
			break;
			
		case "workPlan":
			insWorkPlan($con);
			break;
		
	}
	
	switch($d)
	{
		
		case "logout":
			logout();
			break;
			
		
	}
	
	
	
?>