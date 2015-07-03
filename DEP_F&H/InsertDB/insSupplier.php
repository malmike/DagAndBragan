<?php 

	function insSupplier($con)
	{
		
		$id = clean($con, $_POST['id']);
		$sname = clean($con, $_POST['sname']);
		$cname = clean($con, $_POST['cname']);
		$position = clean($con, $_POST['position']);
		$email = clean($con, $_POST['email']);
		$phone = clean($con, $_POST['phone']);
		$ophone = clean($con, $_POST['ophone']);
		
		$ins = mysqli_query($con, "INSERT INTO `supplierlist`(`idSupplier`, `Name`, `ContactPerson`, `Address`, `Email`, `PhoneNumber`, `OtherPhone`) VALUES ('$id', '$sname', '$cname', '$position', '$email','$phone','$ophone')");
		if(!$ins)
		{
			header("location: F&Hindex.php?view=viewSuppliers");
		}
		else
		{
			header("location: F&Hindex.php?view=viewSuppliers");
		}
	}
	
?>
	