<?php 
	session_start();
	function insInventoryOut($con)
	{
		
		$id = clean($con, $_POST['id']);
		$team = clean($con, $_POST['team']);
		$inventory = clean($con, $_POST['inventory']);
		$quantity = clean($con, $_POST['quantity']);
		$date = date('Y-m-d', strtotime("now"));
		
		$qry = "SELECT `idInventory`, `Quantity`, `Name`  FROM `inventory`, `chemicalslist`  WHERE `idInventory`=`idChemicalsList` AND `idInventory`='$inventory'";
		$result = mysqli_query($con, $qry);
		if(mysqli_num_rows($result) == 1)
		{
			$row = mysqli_fetch_assoc($result);
		}else
		{
			$qry = "SELECT `idInventory`, `Quantity`, `Name` FROM `inventory`, `equipment&ppe`  WHERE `idInventory`=`idEquipment` AND `idInventory`='$inventory'";
			$result = mysqli_query($con, $qry);
			$row = mysqli_fetch_assoc($result);
		}
		
		$updateQuantity = $row[Quantity]-$quantity;
		if($updateQuantity < 0)
		{
			$_SESSION['ERRMSG_ARR'] = "<b>ERROR!!!</b></br>Quantity entered is grater than that in inventory. </br>Inventory Item: {$row[Name]} </br>Inventory Quantity: {$row[Quantity]} </br>Quantity Inserted: {$quantity} ";
			$_SESSION['Team'] = $team;
			header("location: F&Hindex.php?insert=insInventoryOut");
			exit();
			
			/*echo $id."</br>";
			echo $team."</br>";
			echo $inventory."</br>";
			echo $quantity."</br>";
			echo $date."</br>";
			echo $updateQuantity."</br>";
			echo $row[Quantity]."</br>";*/
		}
		else
		{
			$update = mysqli_query($con, "UPDATE `inventory` SET `Quantity`='$updateQuantity' WHERE `idInventory`='$row[idInventory]'");
																																																																									  
			$ins = mysqli_query($con, "INSERT INTO `inventoryout`(`idInventoryOut`, `Team_idTeam`, `Inventory_idInventory`, `Quantity`, `Date`) VALUES ('$id','$team','$inventory','$quantity','$date')");
			if(!$ins)
			{
				//header("location: F&Hindex.php?view=viewChemList");
				echo $id."</br>";
				echo $team."</br>";
				echo $inventory."</br>";
				echo $quantity."</br>";
				echo $date."</br>";
				echo $updateQuantity."</br>";
				echo $row[Quantity]."</br>";
			}
			else
			{
				if(isset($_POST['add']))
				{
					$_SESSION['Team'] = $team;
					header("location: F&Hindex.php?insert=insInventoryOut");
				}
				else if(isset($_POST['finish']))
				{
					header("location: F&Hindex.php");
				}
			}
		}
	}
?>                                                                                                                                                                                                                                                                  