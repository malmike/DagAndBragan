<?php 
	function EquipmentForm()
	{
?>
		<form role="form" method="post" action="functioncalls.php?connect=equip"> 
			<h3>ADD TO EQUIPMENT LIST</h3>
			<div class="form-group"> 
				<label for="name">EQUIPMENT CODE</label> 
				<input type="integer" class="form-control" name="id" id="id" placeholder = "Enter Equipment/PPE ID"> 
			</div> <div class="form-group"> 
			
			<div class="form-group"> 
				<label for="name">NAME</label> 
				<input type="text" class="form-control" name="ename" id="ename" placeholder = "Enter Name Of Equipment/PPE"> 
			</div> 
						
			<label for="name">IN USE</label>
			<div class="radio"> 
				<label> <input type="radio" name="use" id="use1" value="Y" checked> YES </label> 
			</div>
			
			<div class="radio"> 
				<label> <input type="radio" name="use" id="use2" value="N" checked> NO </label> 
			</div>
			
			<button type="submit" class="btn btn-default">SUBMIT</button> 
		</form>
		
<?php
	}
?>