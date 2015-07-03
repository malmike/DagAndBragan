<?php 
	session_start();
	function insDelivaryNote($con)
	{
		
		$id = clean($con, $_POST['id']);
		$purchaseOrder = clean($con, $_POST['purchaseOrder']);
		$date = date('Y-m-d', strtotime("now"));
		
		$ins = mysqli_query($con, "INSERT INTO `delivarynote`(`idDelivaryNote`, `PurchaseOrder_idPurchaseOrder`, `Date`) VALUES ('$id', '$purchaseOrder', '$date')");
		if(!$ins)
		{
			header("location: F&Hindex.php");
		}
		else
		{
			$_SESSION['id'] = $id;
			header("location: F&Hindex.php?insert=insDelivaryNoteItem");		
		}
		
	}
?>