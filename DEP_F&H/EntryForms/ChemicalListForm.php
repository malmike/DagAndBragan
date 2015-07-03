<?php 
	function ChemicalListForm()
	{
?>
		<form role="form" method="post" action="functioncalls.php?connect=chem"> 
			<h3>ADD TO CHEMICAL LIST</h3>
			<div class="form-group"> 
				<label for="name">CHEMICAL CODE</label> 
				<input type="integer" class="form-control" name="id" id="id" placeholder = "Enter Chemical ID"> 
			</div> <div class="form-group"> 
			
			<div class="form-group"> 
				<label for="name">NAME</label> 
				<input type="text" class="form-control" name="cname" id="cname" placeholder = "Enter Name Of Chemical"> 
			</div> 
			
			<div class="form-group"> 
				<label for="name">METRIC UNIT</label> 
				<input type="integer" class="form-control" name="quantity" id="quantity" placeholder = "Enter Unit Quantity"> 
			</div>

			<div class="form-group"> 
				<label for="name">METRIC</label> 
				<input type="text" class="form-control" name="metricUnit" id="metricUnit" placeholder = "Enter Metric Unit e.g(l, ml, g)"> 
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