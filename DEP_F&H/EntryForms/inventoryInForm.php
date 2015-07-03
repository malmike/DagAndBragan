<?php
	session_start();
	
	function inventoryInForm($con)
	{
				
		$chem = "SELECT `idInventory`, `Name` FROM `inventory`, `chemicalslist`  WHERE `idInventory`=`idChemicalsList`";
		$chemResult =mysqli_query($con, $chem);
		
		$equip = "SELECT `idInventory`, `Name` FROM `inventory`, `equipment&ppe`  WHERE `idInventory`=`idEquipment`";
		$equipResult =mysqli_query($con, $equip);

		$newDate = date('Y-m-d', strtotime("now"));	
		$getDate = date('Ymd', strtotime("now"));
				
		$query = "SELECT `idInventoryIn` FROM `inventoryin` WHERE `Date`='$newDate' ORDER BY `idInventoryIn` DESC  LIMIT 1";
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
				$id = $row['idInventoryIn']+1;			
			}
		}
		
		$now = date('Y-m-d', strtotime("now"));
		$weekBack = date('Y-m-d', strtotime("-1 week"));
		$monthBack = date('Y-m-d', strtotime("-1 month"));
		$sixMonthBack = date('Y-m-d', strtotime("-6 month"));
		$yearBack = date('Y-m-d', strtotime("-1 year"));
		
		$sql="SELECT `idTeam`, `FName`, `LName` FROM `team`, `employee` WHERE `idEmployee`=`Employee_idEmployee` AND `Date` BETWEEN '$newDate' AND CURDATE()";
		$result=mysqli_query($con, $sql);

?>		
		
		<form role="form" name="changeform" method="post" action="functioncalls.php?connect=inventoryOut"> 
				<h3>INVENTORY OUT<small></br><?php if($_SESSION['ERRMSG_ARR']) echo $_SESSION['ERRMSG_ARR'];?></small></h3>
				<div class="form-group"> 
					<label for="team_code">INVENTORY OUT ID</label> 
					<input type="integer" class="form-control" name="id" id="id" value = <?php echo "{$id}";?> readonly> 
				</div> <div class="form-group">
				
				<?php 
					if($_SESSION['Team']== "")
					{
				?>
						<div class="form-group"> 
							<label for="name">SELECT THE DATE RANGE OF REGISTRATION FOR THE TEAM</label> 
							<select class="form-control" name="dt" id="dateRange" onchange=inventoryOutAjaxFunction();> 
								<option value=<?php echo $now;?>> TODAY </option> 
								<option value=<?php echo $weekBack; ?>> ONE WEEK BACK </option> 
								<option value=<?php echo $monthBack; ?>> ONE MONTH BACK </option> 
								<option value=<?php echo $sixMonthBack; ?>> SIX MONTHS BACK </option> 
								<option value=<?php echo $yearBack; ?>> ONE YEAR BACK </option> 
								<option value=<?php echo "*";?> > MORE THAN A YEAR BACK  </option> 
							</select>
						</div> 
				
						<div class="form-group"> 
							<label for="name">SELECT TEAM</label> 
							<select class="form-control" name="team" id="team">  
							<?php
								while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
								{
									echo "<option value={$row[idTeam]}> {$row[FName]} {$row[LName]}</option> ";
								}
							?>
							</select>
						</div> 
				<?php
					}else
					{
						echo "<label for='name'>TEAM SELECTED</label>";
						echo "<input type='integer' class='form-control' name='team' id='team' value = {$_SESSION['Team']} readonly>"; 
					}
				?>
				
				<div class="form-group"> 
					<label for="name">SELECT ITEM</label> 
					<select class="form-control" name="inventory" id="inventory">  
					<?php
						while($row = mysqli_fetch_array($chemResult, MYSQLI_BOTH))
						{
							echo "<option value={$row[idInventory]}>{$row[Name]} </option> ";
						}
						while($row = mysqli_fetch_array($equipResult, MYSQLI_BOTH))
						{
							echo "<option value={$row[idInventory]}>{$row[Name]} </option> ";
						}
					?>
					</select>
				</div> 
				
				<div class="form-group"> 
					<label for="name">ENTER QUANTITY</label>
					<input type="integer" class="form-control" name="quantity" id="quantity" placeholder="Enter the quantity of inventory item."> 
				</div>
				
				<button type="submit" class="btn btn-default" id="add" name="add">ADD ITEM</button> 
				<button type="submit" class="btn btn-default"  id="finish" name="finish">FINISH</button> 
			</form>
<?php
		$_SESSION['ERRMSG_ARR'] = "";
		
	}
?>
