<?php
	session_start();
	
	function teamForm($con)
	{
	
		if($_SESSION['ERRMSG_ARR'][0] != "") 
		{
			$jazz = $_SESSION['ERRMSG_ARR'];
		}
	
		$qry = "SELECT `idEmployee`, `FName`, `LName` FROM `employee` WHERE `Department` = 'OP'";
		$result=mysqli_query($con, $qry);
		
		$now = date('Y-m-d', strtotime("now"));
		$weekBack = date('Y-m-d', strtotime("-1 week"));
		$monthBack = date('Y-m-d', strtotime("-1 month"));
		$sixMonthBack = date('Y-m-d', strtotime("-6 month"));
		$yearBack = date('Y-m-d', strtotime("-1 year"));
		
		
		$curDate = date('d/m/Y', strtotime("now"));
		$newDate = date('Y-m-d', strtotime("now"));	
		$getDate = date('Ymd', strtotime("now"));	
		//$query = "SELECT `idTeam` FROM `team` WHERE `Date` = '$newDate'";
		$query = "SELECT `idTeam` FROM `team` WHERE `Date` = '$newDate' ORDER BY `idTeam` DESC  LIMIT 1";
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
				$id = $row['idTeam']+1;			
			}
		}
		
		if(mysqli_num_rows($result) > 0) 
		{
				$x = 0;
?>
			<form role="form" name="changeform" method="post" action="functioncalls.php?connect=team"> 
				<h3>REGISTER TEAM <small><?php if($_SESSION['ERRMSG_ARR']) echo $_SESSION['ERRMSG_ARR'];?></small></h3>
				<div class="form-group"> 
					<label for="team_code">TEAM CODE</label> 
					<input type="number" class="form-control" name="id" id="id" value = <?php echo "{$id}";?> readonly=""> 
				</div>
				
				<div class="form-group"> 
					<label for="team_code">DATE</label> 
					<input type="text" class="form-control" name="date" id="date" value = <?php echo "{$curDate}";?> readonly=""> 
				</div> <div class="form-group"> 
				
					<br/>	
                    <label for="name">SELECT TEAM LEADER AND TEAM MEMBERS</label> <br/> 		
					<table class="table table-condensed"> 
									<thead> 
										<tr> 
											<th>NAME</th> 
											<th>SELECT TEAM LEADER</th> 
											<th>SELECT TEAM MEMBERS</th> 
										</tr> 
									</thead>
								<?php 
									while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
									{
										$team = "teamMember".$x;
								?>
										<tbody> 
											<tr> 
								<?php
												echo "<td>{$row[FName]} {$row[LName]}</td>";
												echo "<td><input type='radio' name='teamLeader' value={$row['idEmployee']}></td>";
												echo "<td><input type='checkbox' name= {$team} value={$row['idEmployee']}></td>";
												$x += 1;
								?>
											</tr> 
										</tbody> 								
								<?php
									} 
								?>
					</table>																									
				</div> 
				
				
				
				<div class="form-group"> 
					<label for="name">SELECT THE DATE RANGE OF REGISTRATION FOR THE CLIENT</label> 
					<select class="form-control" name="dt" id="dateRange" onchange=AjaxFunction();> 
                        <option> CHOOSE A TIME PERIOD </option> 
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
                        <option> CHOOSE A CLIENT </option>   
					</select>
				</div> 
				
				<div class="form-group"> 
					<input type="number" class="form-control" name="num" id="num" value = <?php echo $x?> style='display: none'> 
				</div> 
				
				<button type="submit" class="btn btn-default">SUBMIT</button> 
			</form>
<?php
			$_SESSION['ERRMSG_ARR'] = "";
		}
	}

?>