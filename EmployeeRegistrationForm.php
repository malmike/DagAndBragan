<?php 
	function EmployeeRegistrationForm()
	{
?>

		<form role="form" method="post" action="functioncalls.php?connect=emp"> 
			<h3>REGISTER EMPLOYEE </h3>
			<div class="form-group"> 
				<label for="name">EMPLOYEE CODE</label> 
				<input type="text" class="form-control" name="id" id="id" placeholder = "Enter Employee ID"> 
			</div> <div class="form-group"> 
			
			<div class="form-group"> 
				<label for="name">FIRST NAME</label> 
				<input type="text" class="form-control" name="fname" id="fname" placeholder = "Enter First Name"> 
			</div>
			
			<div class="form-group"> 
				<label for="name">LAST NAME</label> 
				<input type="text" class="form-control" name="lname" id="lname" placeholder = "Enter Last Name"> 
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
				<label for="name">DEPARTMENT</label> 
				<select class="form-control" name="department" id="department" > 
					<option>S&M</option> 
					<option>OP</option> 
					<option>F&H</option> 
				</select>
			</div> 
			
			<div class="form-group"> 
				<label for="name">POSITION</label> 
				<input type="text" class="form-control" name="position" id="position" placeholder = "Enter Position In Department"> 
			</div>
			
			<div class="form-group"> 
				<label for="name">PASSWORD</label> 
				<input type="password" class="form-control" name="password" id="password" placeholder = "Enter Password"> 
			</div>
			
			<div class="form-group"> 
				<label for="name">RE-ENTER PASSWORD</label> 
				<input type="password" class="form-control" name="cpassword" id="password" placeholder = "Re-enter Password"> 
			</div>
			
			<button type="submit" class="btn btn-default">SUBMIT</button> 
		</form>
		
<?php
	}
?>

