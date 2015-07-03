<?php
	session_start();
	function insWorkPlan($con)
	{
		$id = clean($con, $_POST['id']);
		clean($con, $_POST['workPlanMonth'])<10?$month = "0".clean($con, $_POST['workPlanMonth']): $month = clean($con, $_POST['workPlanMonth']);		
		clean($con, $_POST['workPlanDay'])<10?$day = "0".clean($con, $_POST['workPlanDay']): $day = clean($con, $_POST['workPlanDay']);		
		$year = clean($con, $_POST['workPlanYear']);
		$startDate = $year."-".$month."-".$day;
		$workDuration = clean($con, $_POST['duration'])-1;
		$endDate =  date("Y-m-d", strtotime(date("Y-m-d", strtotime($startDate)).'+'.$workDuration.'days'));
		
		$refNo = clean($con, $_POST['clients']);
		$workType = clean($con, $_POST['type']);
		$newDate = date('Y-m-d', strtotime("now"));	
		
		
		$ins = mysqli_query($con, "INSERT INTO `workplan`(`idWorkPlan`, `ClientInformation_RefNo`, `StartDate`, `EndDate`, `WorkType`, `Date`) VALUES ('$id', '$refNo', '$startDate', '$endDate', '$workType', '$newDate')");
		if(!$ins)
		{
			$_SESSION['ERRMSG_ARR'] = "Failed to insert data for work plan try re-inserting";
			header("location: OPindex.php?insert=insWorkPlan");
			exit();
		}
		header("location: OPindex.php");
	}
?>