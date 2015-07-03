<?php
	session_start();
	
	function selectPurchaseOrderForm($con)
	{
		$now = date('Y-m-d', strtotime("now"));
		$weekBack = date('Y-m-d', strtotime("-1 week"));
		$monthBack = date('Y-m-d', strtotime("-1 month"));
		$sixMonthBack = date('Y-m-d', strtotime("-6 month"));
		$yearBack = date('Y-m-d', strtotime("-1 year"));
		
		$qry="SELECT `idPurchaseOrder` FROM `purchaseorder` WHERE `Date`='$now'";
		$result=mysqli_query($con, $qry);
?>		
		<form role="form" name="changeform" method="post" action="?view=viewPurchaseOrder"> 		
				<div class="form-group"> 
					<label for="name">SELECT THE DATE RANGE OF REGISTRATION FOR THE PURCHASE ORDER</label> 
					<select class="form-control" name="dt" id="dateRange" onchange=purchaseOrderAjaxFunction();> 
						<option value=<?php echo $now;?>> TODAY </option> 
						<option value=<?php echo $weekBack; ?>> ONE WEEK BACK </option> 
						<option value=<?php echo $monthBack; ?>> ONE MONTH BACK </option> 
						<option value=<?php echo $sixMonthBack; ?>> SIX MONTHS BACK </option> 
						<option value=<?php echo $yearBack; ?>> ONE YEAR BACK </option> 
						<option value=<?php echo "*";?> > MORE THAN A YEAR BACK  </option> 
					</select>
				</div> 
					
				<div class="form-group"> 
					<label for="name">SELECT PURCHASE ORDER REF NUMBER</label> 
					<select class="form-control" name="purchaseOrder" id="purchaseOrder">  
					<?php 
						while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
						{
							echo "<option value={$row['idPurchaseOrder']}>{$row['idPurchaseOrder']}</option> ";
						} 
					?>
					</select>
				</div> 

				<button type="submit" class="btn btn-default" name="subPurchaseOrder" id="subPurchaseOrder">SUBMIT</button> 
			</form>
<?php
	}
?>