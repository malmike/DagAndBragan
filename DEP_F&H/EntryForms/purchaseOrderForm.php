<?php
	session_start();
	
	function purchaseOrderForm($con)
	{
	
		if($_SESSION['ERRMSG_ARR'][0] != "") 
		{
			$jazz = $_SESSION['ERRMSG_ARR'];
		}
	
		$qry = "SELECT * FROM `supplierlist`";
		$result=mysqli_query($con, $qry);
		
		if(mysqli_num_rows($result) > 0) 
		{
?>
			<form role="form" name="purchaseOrderForm" method="post" action="functioncalls.php?connect=purchaseOrder"> 
				<h3>ENTER PURCHASE ORDER <small><?php if($_SESSION['ERRMSG_ARR']) echo $_SESSION['ERRMSG_ARR'];?></small></h3>
				<div class="form-group"> 
					<label for="team_code">PURCHASE ORDER NUMBER</label> 
					<input type="integer" class="form-control" name="id" id="id" placeholder = "Enter Purchase Order Number"> 
				</div> <div class="form-group"> 

				<div class="form-group"> 		
					<label for="name">SELECT SUPPLIER</label> 
						<select class="form-control" name="supplier" id="supplier"> 
								<?php 
									while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
									{
										echo "<option value={$row['idSupplier']}> {$row['Name']} </option>";
									} 
								?>
					</select>
				</div> 

				
				<button type="submit" class="btn btn-default">SUBMIT</button> 
			</form>
<?php
			$_SESSION['ERRMSG_ARR'] = "";
		}
	}

?>