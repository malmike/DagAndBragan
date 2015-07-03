<?php
	session_start();
	
	function purchaseListForm($con)
	{
		$qry="SELECT `idChemicalsList`, `Name` FROM `chemicalslist`";
		$result=mysqli_query($con, $qry);
		$_SESSION['id'] != ""? $id = $_SESSION['id']:$id=XXX;
?>
			<form role="form" name="changeform" method="post" action="functioncalls.php?connect=purchaseItem"> 
				<h3>ENTER ITEMS TO BE PURCHASED<small><?php if($_SESSION['ERRMSG_ARR']) echo $_SESSION['ERRMSG_ARR'];?></small></h3>
				
				<div class="form-group"> 
					<label for="team_code">PURCHASE ORDER ID</label> 
					<input type="integer" class="form-control" name="id" id="id" value=<?php echo "$id";?> readonly>
				</div> 
					
				<div class="form-group"> 
					<label for="name">SELECT THE TYPE OF ITEM TO BE PURCHASED</label> 
					<select class="form-control" name="itemType" id="itemType" onchange=AjaxFunction();> 
						<option value="chem"> CHEMICAL </option> 
						<option value="equip">EQUIPMENT AND PPE </option> 
					</select>
				</div> 
				
				<div class="form-group"> 
					<label for="name">SELECT ITEM</label> 
					<select class="form-control" name="itemChoosen" id="itemChoosen"> 
						<?php 
									while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
									{
										echo "<option value={$row[idChemicalsList]}> {$row[Name]} </option>";
									}
						?>
					</select>
				</div> 
				
				<div class="form-group"> 
					<label for="team_code">ENTER QUANTITY</label> 
					<input type="integer" class="form-control" name="quantity" id="quantity" placeholder="Enter the quantity of the item">
				</div> 
				
				<button type="submit" name="add" id="add" class="btn btn-default">ADD ANOTHER ITEM</button> 
				<button type="submit" name="finish" id="finish" class="btn btn-default">FINISH</button> 
			</form>	
			
<?php

		
			$_SESSION['ERRMSG_ARR'] = "";
	}

?>