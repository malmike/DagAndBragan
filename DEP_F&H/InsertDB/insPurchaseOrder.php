<?php 
	session_start();
	function insPurchaseOrder($con)
	{
		
		$id = clean($con, $_POST['id']);
		$supplier = clean($con, $_POST['supplier']);
		$num = clean($con, $_POST['num']);
		$date = date('Y-m-d', strtotime("now"));
		
		$ins = mysqli_query($con, "INSERT INTO `purchaseorder`(`idPurchaseOrder`, `SupplierList_idSupplier`, `Date`) VALUES ('$id', '$supplier', '$date')");
		if(!$ins)
		{
			header("location: F&Hindex.php");
		}
		else
		{
			$_SESSION['id'] = $id;
			header("location: F&Hindex.php?insert=insPurchaseList");		
		}
		
	}
?>