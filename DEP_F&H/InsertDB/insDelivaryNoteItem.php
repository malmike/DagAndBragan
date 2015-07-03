<?php 
	session_start();
	function insDelivaryNoteItem($con)
	{
		
		$id = clean($con, $_POST['id']);
		$itemChoosen = clean($con, $_POST['itemChoosen']);
		$quantity = clean($con, $_POST['quantity']);
		$quantityRejected = clean($con, $_POST['quantityRejected']);
		$itemType = clean($con, $_POST['itemType']);
		
		echo $id."</br>";
		echo $itemChoosen."</br>";
		echo $quantity."</br>";
		echo $quantityRejected."</br>";
		echo $itemType."</br>";
		
		$qry ="SELECT `idInventory`, `Quantity` FROM `inventory` WHERE `idInventory`='$itemChoosen'";
		$result=mysqli_query($con, $qry);
		if(mysqli_num_rows($result) == 1) 
		{
			$row = mysqli_fetch_assoc($result);	
			$quan = $quantity+$row['Quantity'];
			$query = "UPDATE `inventory` SET `Quantity`='$quan' WHERE `idInventory`='$row[idInventory]'";
			mysqli_query($con, $query);
		}else if($itemType=="chem")
		{
			mysqli_query($con, "INSERT INTO `inventory`(`idInventory`, `Type`, `ChemicalsList_idChemicalsList`, `Quantity`) VALUES ('$itemChoosen', '$itemType', '$itemChoosen', '$quantity')");
		
		}else if($itemType=="equip")
		{
			mysqli_query($con, "INSERT INTO `inventory`(`idInventory`, `Type`, `Equipment&PPE_idEquipment&PPE`, `Quantity`) VALUES ('$itemChoosen', '$itemType', '$itemChoosen', '$quantity')");

		}
		
		if($itemType == "chem")
		{
			$ins = mysqli_query($con, "INSERT INTO `delivereditems`(`DelivaryNote_idDelivaryNote`, `Type`, `ChemicalsList_idChemicalsList`, `Quantity`, `QuantityRejected`) VALUES ('$id', '$itemType', '$itemChoosen', '$quantity', '$quantityRejected')");
		}
		
		else if($itemType == "equip")
		{
			$ins = mysqli_query($con, "INSERT INTO `delivereditems`(`DelivaryNote_idDelivaryNote`, `Type`, `Equipment&PPE_idEquipment&PPE`, `Quantity`, `QuantityRejected`) VALUES ('$id', '$itemType', '$itemChoosen', '$quantity', '$quantityRejected')");
		}
		
		if(!$ins)
		{
			//header("location: F&Hindex.php");
		}
		else
		{
			if(isset( $_POST['add'] ) )
			{
				header("location: F&Hindex.php?insert=insDelivaryNoteItem");
			}
			else if(isset( $_POST['finish'] ) )
			{
				$id = $_SESSION['id'];
				$_SESSION['id'] = "";
				header("location: F&Hindex.php?view=viewDelivaryNote&id={$id}");
			}			
		}	
	}
?>