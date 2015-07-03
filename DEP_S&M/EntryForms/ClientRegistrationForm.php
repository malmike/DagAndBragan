<?php 
	function clientListForm($con)
	{
	
		$newDate = date('Y-m-d', strtotime("now"));
		$getDate = date('Ymd', strtotime("now"));
			
		
		$query = "SELECT `RefNo` FROM `clientinformation` WHERE `Date` = '$newDate' ORDER BY `RefNo` DESC  LIMIT 1";
		$result2 = mysqli_query($con, $query);
		if($result2) 
		{
			if(mysqli_num_rows($result2) <= 0)
			{
				$id = (int)$getDate."00";
			}
			else if(mysqli_num_rows($result2) == 1) 
			{
				$row = mysqli_fetch_assoc($result2);	
				$id = $row['RefNo']+1;
			}
		}
		
?>

		<form role="form" method="post" action="functioncalls.php?connect=client"> 
			<h3>REGISTER CLIENT </h3>
			<div class="form-group"> 
				<label for="name">CLIENT CODE</label> 
				<input type="number" class="form-control" name="id" id="id" readonly="" value = <?php echo "{$id}";?> > 
			</div> 
			
			<div class="form-group"> 
				<label for="name">NAME</label> 
				<input type="text" class="form-control" name="sname" id="sname" placeholder = "Enter Client Name"> 
			</div>
			
			<div class="form-group"> 
				<label for="name">TYPE</label> 
				<input type="text" class="form-control" name="type" id="type" placeholder = "Enter Client Type"> 
			</div> 
			
			<div class="form-group"> 
				<label for="name">CONTACT PERSON</label> 
				<input type="text" class="form-control" name="cname" id="cname" placeholder = "Enter Name Of Contact Person"> 
			</div> 
			
			<div class="form-group"> 
				<label for="name">PHONE NUMBER</label> 
				<input type="text" class="form-control" name="phone" id="phone" placeholder = "Enter Phone Number"> 
			</div> 
			
			<div class="form-group"> 
				<label for="name">ALTERNATIVE PHONE NUMBER</label> 
				<input type="text" class="form-control" name="ophone" id="ophone" placeholder = "Enter Alternative Phone Number"> 
			</div> 
			
			<div class="form-group"> 
				<label for="name">EMAIL</label> 
				<input type="email" class="form-control" name="email" id="email" placeholder = "Enter Email"> 
			</div> 
			
			<div class="form-group"> 
				<label for="name">LOCATION ADDRESS</label> 
				<input type="text" class="form-control" name="position" id="position" placeholder = "Enter Location Address"> 
			</div>
			
			<button type="submit" class="btn btn-default">SUBMIT</button> 
		</form>
		
<?php
	}
?>



