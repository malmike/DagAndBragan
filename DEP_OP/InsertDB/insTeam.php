<?php
	session_start();
	function insTeam($con)
	{
		$id = clean($con, $_POST['id']);
		$newDate = date('Y-m-d', strtotime("now"));		
		$teamLeader = clean($con, $_POST['teamLeader']);
		$refNo = clean($con, $_POST['clients']);
		
		$teamMember = array();
		$num = clean($con, $_POST['num']);
		$teamNumber = 0;
		$check = false;
		
		echo $num."</br>";
		
		for($x=0; $x<$num; $x++)
		{
			$team = "teamMember".$x;
			
			echo $team."</br>";
			echo $_POST[$team]."</br>";
			
			if(isset($_POST[$team]))
			{
				if($_POST[$team] == $teamLeader) $check = true; 
				$teamMember[$teamNumber] = clean($con, $_POST[$team]);
				$teamNumber += 1;
			}
		}
		
		if(!$check) $teamMember[$teamNumber] = $teamLeader;
		
		$y = sizeof($teamMember);
		
		$ins = mysqli_query($con, "INSERT INTO `team`(`idTeam`, `ClientInformation_RefNo`, `Employee_idEmployee`, `NumberOfMembers`, `Date`) VALUES('$id', '$refNo', '$teamLeader', '$y', '$newDate' )");
		if(!$ins)
		{
			$_SESSION['ERRMSG_ARR'] = "Failed to insert data for team try re-inserting";
			header("location: OPindex.php?insert=insTeam");
			exit();
		}
		
		foreach($teamMember as $g)
		{
			$ins = mysqli_query($con, "INSERT INTO `team_has_employee`(`Team_idTeam`, `Employee_idEmployee`) VALUES('$id', '$g')");
			if(!$ins)
			{
				echo "<p>Failed to insert data for ID {$g}</p>";
			}
		}
		echo sizeof($teamMember);
		
		header("location: OPindex.php");
	}
?>