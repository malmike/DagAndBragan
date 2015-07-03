<?php
	session_start();
	
	function workPlanForm($con)
	{
	
		$now = date('Y-m-d', strtotime("now"));
		$weekBack = date('Y-m-d', strtotime("-1 week"));
		$monthBack = date('Y-m-d', strtotime("-1 month"));
		$sixMonthBack = date('Y-m-d', strtotime("-6 month"));
		$yearBack = date('Y-m-d', strtotime("-1 year"));

		$curDate = date('d/m/Y', strtotime("now"));
		$newDate = date('Y-m-d', strtotime("now"));	
		$getDate = date('Ymd', strtotime("now"));	
		//$query = "SELECT `idTeam` FROM `team` WHERE `Date` = '$newDate'";
		$query = "SELECT `idWorkPlan` FROM `workplan` WHERE `Date` = '$newDate' ORDER BY `idWorkPlan` DESC  LIMIT 1";
		$result2=mysqli_query($con, $query);
		if($result2) 
		{
			if(mysqli_num_rows($result2) <= 0)
			{
				$id = (int)$getDate."00";
			}
			else if(mysqli_num_rows($result2) == 1) 
			{
				$row = mysqli_fetch_assoc($result2);	
				$id = $row['idWorkPlan']+1;			
			}
		}
		
?>
			<form role="form" name="changeform" method="post" action="functioncalls.php?connect=workPlan"> 
				<h3>ENTER WORKPLAN EVENT <small><?php if($_SESSION['ERRMSG_ARR']) echo $_SESSION['ERRMSG_ARR'];?></small></h3>
				
				<div class="form-group"> 
					<label for="team_code">TEAM CODE</label> 
					<input type="number" class="form-control" name="id" id="id" value = <?php echo "{$id}";?> readonly=""> 
				</div>
				
				<div class="form-group"> 
					<label for="team_code">ENTER START DATE OF WORK</label> 
					<?php echo date_picker("workPlan")?>
					</div>

				<div class="form-group">				
					<label for="team_code">ENTER DURATION OF THE WORK</label> 
					<input type="number" class="form-control" name="duration" id="duration" placeholder="Insert the number of days the work will occupy">
				</div> 

				<div class="form-group"> 
					<label for="name">SELECT THE DATE RANGE OF REGISTRATION FOR THE CLIENT</label> 
					<select class="form-control" name="dt" id="dateRange" onchange=AjaxFunction();> 
						<option value=<?php echo $now;?>> TODAY </option> 
						<option value=<?php echo $weekBack; ?>> ONE WEEK BACK </option> 
						<option value=<?php echo $monthBack; ?>> ONE MONTH BACK </option> 
						<option value=<?php echo $sixMonthBack; ?>> SIX MONTHS BACK </option> 
						<option value=<?php echo $yearBack; ?>> ONE YEAR BACK </option> 
						<option value=<?php echo "*";?> > MORE THAN A YEAR BACK  </option> 
					</select>
				</div> 
				<div class="form-group"> 
					<label for="name">SELECT CLIENT</label> 
					<select class="form-control" name="clients" id="clientRetrieved">  
					</select>
				</div> 
				<label for="name">SELECT WORK TYPE</label>
					<div class="radio"> 
						<label> <input type="radio" name="type" id="type1" value="Inspection" checked> Inspection </label> 
					</div>
					
					<div class="radio"> 
						<label> <input type="radio" name="type" id="type2" value="Work" checked> Work </label> 
					</div>
				
				<button type="submit" class="btn btn-default">SUBMIT</button> 
			</form>
<?php
	}

?>