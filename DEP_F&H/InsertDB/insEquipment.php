<?php 
	
	function insEquipment($con)
	{
		
		$id = clean($con, $_POST['id']);
		$ename = clean($con, $_POST['ename']);
		$use = clean($con, $_POST['use']);
		
		$ins = mysqli_query($con, "INSERT INTO `equipment&ppe`(`idEquipment`, `Name`,`InUse`) VALUES('$id', '$ename','$use')");
		if(!$ins)
		{
			header("location: F&Hindex.php?view=viewEquip");
		}
		else
		{
			header("location: F&Hindex.php?view=viewEquip");
		}
	}
?>