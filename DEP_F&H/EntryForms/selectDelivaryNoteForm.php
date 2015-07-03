<?php
	session_start();
	
	function selectDelivaryNoteForm($con)
	{
		$now = date('Y-m-d', strtotime("now"));
		$weekBack = date('Y-m-d', strtotime("-1 week"));
		$monthBack = date('Y-m-d', strtotime("-1 month"));
		$sixMonthBack = date('Y-m-d', strtotime("-6 month"));
		$yearBack = date('Y-m-d', strtotime("-1 year"));
		
		$qry="SELECT `idDelivaryNote` FROM `delivarynote` WHERE `Date`='$now'";
		$result=mysqli_query($con, $qry);
?>		
		<form role="form" name="changeform" method="post" action="?view=viewDelivaryNote"> 		
				<div class="form-group"> 
					<label for="name">SELECT THE DATE RANGE OF REGISTRATION FOR THE PURCHASE ORDER</label> 
					<select class="form-control" name="dt" id="dateRange" onchange=delivaryNoteAjaxFunction();> 
						<option value=<?php echo $now;?>> TODAY </option> 
						<option value=<?php echo $weekBack; ?>> ONE WEEK BACK </option> 
						<option value=<?php echo $monthBack; ?>> ONE MONTH BACK </option> 
						<option value=<?php echo $sixMonthBack; ?>> SIX MONTHS BACK </option> 
						<option value=<?php echo $yearBack; ?>> ONE YEAR BACK </option> 
						<option value=<?php echo "*";?> > MORE THAN A YEAR BACK  </option> 
					</select>
				</div> 
					
				<div class="form-group"> 
					<label for="name">SELECT DELIVARY NOTE REF NUMBER</label> 
					<select class="form-control" name="delivaryNote" id="delivaryNote">  
					<?php 
						while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
						{
							echo "<option value={$row['idDelivaryNote']}>{$row['idDelivaryNote']}</option> ";
						} 
					?>
					</select>
				</div> 

				<button type="submit" class="btn btn-default" name="subDelivaryNote" id="subDelivaryNote">SUBMIT</button> 
			</form>
<?php
	}
?>