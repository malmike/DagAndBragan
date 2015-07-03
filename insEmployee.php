<?php 

	function insEmployee($con)
	{
		
		$id = clean($con, $_POST['id']);
		$fname = clean($con, $_POST['fname']);
		$lname = clean($con, $_POST['lname']);
		$phone = clean($con, $_POST['phone']);
		$ophone = clean($con, $_POST['ophone']);
		$email = clean($con, $_POST['email']);
		$department = clean($con, $_POST['department']);
		$position = clean($con, $_POST['position']);
		$password = clean($con, $_POST['password']);
		
		/*echo "1. ".clean($con, $_POST['id'])."<br/>";
		echo "2. ".clean($con, $_POST['fname'])."<br/>";
		echo "3. ".clean($con, $_POST['lname'])."<br/>";
		echo "4. ".clean($con, $_POST['phone'])."<br/>";
		echo "5. ".clean($con, $_POST['ophone'])."<br/>";
		echo "6. ".clean($con, $_POST['email'])."<br/>";
		echo "7. ".clean($con, $_POST['department'])."<br/>";
		echo "8. ".clean($con, $_POST['position'])."<br/>";
		echo "9. ".clean($con, $_POST['password'])."<br/>";*/
		
		$ins = mysqli_query($con, "INSERT INTO `employee`(`idEmployee`, `FName`, `LName`, `Mobile Number`, `Phone Number`, `Email`, `Department`, `Position`, `Password`) VALUES ('$id','$fname', '$lname', '$phone','$ophone','$email', '$department', '$position','".md5($password)."')");
		if(!$ins)
		{
			echo "<p>Sorry!!! Something went wrong. Press <a href='index.php?action=register'>here</a> to refill the login form</p>";
		}
		else
		{
			header("location: index.php");
		}
	}
?>