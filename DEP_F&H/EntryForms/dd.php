<?Php
	include'../../ExtraFunctions/Sanitize.php';
	require'../../ConnectDB/connect.php';

	@$itemType= clean($con, $_GET['itemType']);
	if($itemType == "chem")
	{
		$sql="SELECT `idChemicalsList`, `Name` FROM `chemicalslist`";
	}
	else if($itemType == "equip")
	{
		$sql="SELECT `idEquipment`, `Name` FROM `equipment&ppe`";
	}
	
	$row=$dbo->prepare($sql);
	//$row = mysqli_prepare($con, $sql);
	$row->execute();
	//mysqli_stmt_execute($row);

	$result=$row->fetchAll(PDO::FETCH_ASSOC);
	//$result = mysqli_fetch_all($row, MYSQLI_ASSOC);

	$main = array('data'=>$result);
	echo json_encode($main);
?>