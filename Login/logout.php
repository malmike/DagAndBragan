<?php
	function logout()
	{
		//Start session
		session_start();
		
		//Unset the variables stored in session
		unset($_SESSION['SESS_MEMBER_ID']);
		unset($_SESSION['SESS_FIRST_NAME']);
		unset($_SESSION['SESS_LAST_NAME']);
		unset($_SESSION['SESS_DEPARTMERNT']);
		unset($_SESSION['SESS_POSITION']);
		
		header("location: ../index.php");
	}
?>