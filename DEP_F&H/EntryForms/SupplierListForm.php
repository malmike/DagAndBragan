<?php 
	function SupplierListForm()
	{
		
?>

		<form role="form" method="post" action="functioncalls.php?connect=sup"> 
			<h3>REGISTER SUPPLIER </h3>
			<div class="form-group"> 
				<label for="name">SUPPLIER CODE</label> 
				<input type="integer" class="form-control" name="id" id="id" placeholder = "Enter Supplier ID"> 
			</div> <div class="form-group"> 
			
			<div class="form-group"> 
				<label for="name">NAME</label> 
				<input type="text" class="form-control" name="sname" id="sname" placeholder = "Enter Supplier Name"> 
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



