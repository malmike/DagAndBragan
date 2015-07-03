<?Php
	include'../../ExtraFunctions/Sanitize.php';
	require'../../ConnectDB/connect.php';

	@$dateRange= clean($con, $_GET['dateRange']);
	if($dateRange == "*")
	{
		$sql="SELECT `idTeam`, `FName`, `LName` FROM `team`, `employee` WHERE `idEmployee`=`Employee_idEmployee`";
	}
	else 
	{
		$sql="SELECT `idTeam`, `FName`, `LName` FROM `team`, `employee` WHERE `idEmployee`=`Employee_idEmployee` AND `Date` BETWEEN '$dateRange' AND CURDATE()";
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
