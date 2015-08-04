<?php /*error_reporting(E_ALL ^ E_NOTICE);*/?>

<?php

	$username = "root";
	$password = "root";
	$hostname = "localhost";
	$db = "dagandbragan";

	$con = mysqli_connect($hostname, $username, $password, $db);
	
	//check connection
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to the database.";
		mysqli_connect_errno();
	}
	
	try {
		$dbo = new PDO('mysql:host='.$hostname.';dbname='.$db, $username, $password);
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
 
?>
    