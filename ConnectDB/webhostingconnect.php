<?php /*error_reporting(E_ALL ^ E_NOTICE);*/?>

<?php

	$username = "cucch_15912814";
	$password = "MALmike21";
	$hostname = "sql110.cuccfree.com";
	$db = "cucch_15912814_dagandbragan";

	$con = mysqli_connect($hostname, $username, $password, $db);
	
	//check connection
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to the database.";
		mysqli_connect_errno();
	}
 
?>
    