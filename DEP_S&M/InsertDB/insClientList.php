<?php 

	function insClientList($con)
	{
		
		$id = clean($con, $_POST['id']);
		$sname = clean($con, $_POST['sname']);
		$newDate = date('Y-m-d', strtotime("now"));	
		$type = clean($con, $_POST['type']);
		$cname = clean($con, $_POST['cname']);
		$position = clean($con, $_POST['position']);
		$email = clean($con, $_POST['email']);
		$phone = clean($con, $_POST['phone']);
		$ophone = clean($con, $_POST['ophone']);
		
		$ins = mysqli_query($con, "INSERT INTO `clientinformation`(`RefNo`, `Name`, `Date`, `Contact Person`, `Physical Address`, `Mobile Number`, `Phone Number`, `Email`, `ClientType`) VALUES ('$id', '$sname', '$newDate', '$cname', '$position', '$phone','$ophone', '$email', '$type')");
		if(!$ins)
		{
			header("location: S&Mindex.php?view=viewClientList");
		}
		else
		{
			header("location: S&Mindex.php?view=viewClientList");
		}
	}
	
?>
	