<?php error_reporting(E_ALL ^ E_NOTICE);?>
<?php

	session_start();
	
	include'includeParameters.php';


	$a = $_REQUEST['action'];
	$b = $_REQUEST['connect'];
	
	if(!$a && !$b && !$_SESSION['SESS_MEMBER_ID'])
	{
		$i = 1;
		home($i);
		login();
	}else
	{
		switch($_SESSION['SESS_DEPARTMERNT'])
		{
			case "S&M":
				header("location: DEP_S&M/S&Mindex.php");
				break;
					
			case "OP":
				header("location: DEP_OP/OPindex.php");
				break;

			case "F&H":
				header("location: DEP_F&H/F&Hindex.php");
				break;
		}

		switch($a)
		{
			case "login":
				header("location: index.php");
				break;
				
			case "register":
				$i = 2;
				home($i);
				EmployeeRegistrationForm();
				break;
		}
			
		switch($b)
		{	
			case "login":
				autheticate($con);
				break;
				
			case "emp":
				insEmployee($con);
				break;
				
		}			
	}
?>
