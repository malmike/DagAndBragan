<?php 
	session_start();
	function insPurchaseItem($con)
	{
		
		$id = clean($con, $_POST['id']);
		$itemChoosen = clean($con, $_POST['itemChoosen']);
		$quantity = clean($con, $_POST['quantity']);
		$itemType = clean($con, $_POST['itemType']);
		
		echo $id."</br>";
		echo $itemChoosen."</br>";
		echo $quantity."</br>";
		echo $itemType."</br>";
		
		
		if($itemType == "chem")
		{
			$ins = mysqli_query($con, "INSERT INTO `purchaselist`(`PurchaseOrder_idPurchaseOrder`, `ItemType`, `ChemicalsList_idChemicalsList`, `Quantity`) VALUES ('$id', '$itemType', '$itemChoosen', '$quantity')");
		}
		
		else if($itemType == "equip")
		{
			$ins = mysqli_query($con, "INSERT INTO `purchaselist`(`PurchaseOrder_idPurchaseOrder`, `ItemType`, `Equipment&PPE_idEquipment&PPE`, `Quantity`) VALUES ('$id', '$itemType', '$itemChoosen', '$quantity')");
		}
		
		if(!$ins)
		{
			//header("location: F&Hindex.php");
		}
		else
		{
			if ( isset( $_POST['add'] ) )
			{
				header("location: F&Hindex.php?insert=insPurchaseList");
			}
			else if ( isset( $_POST['finish'] ) )
			{
				$id = $_SESSION['id'];
				$_SESSION['id'] = "";
				header("location: F&Hindex.php?view=viewPurchaseOrder&id={$id}");
			}
				
		}
		
	}
?>