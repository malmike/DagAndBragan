<?php 
	function login()
	{
		session_start();
		if($_SESSION['ERRMSG_ARR'][0] != "") 
		{
			$id = $_SESSION['ERRMSG_ARR'][0];
		}else
		{
			$id = "Enter_User_ID";
		}
		
		if($_SESSION['ERRMSG_ARR'][1] != "") 
		{
			$pass = $_SESSION['ERRMSG_ARR'][1];
		}else
		{
			$pass = "Enter_Password";
		}
?>		
        <div class="container">
		<form role="form" method="post" action="functioncalls.php?connect=login"> 
			<h3>LOGIN <small><?php if($_SESSION['LOGIN_FAILED'] != '') echo $_SESSION['LOGIN_FAILED'];?></small></h3>
			<div class="form-group"> 
				<label for="name">EMPLOYEE CODE</label> 
				<input type="text" class="form-control" name="id" id="id" placeholder = <?php echo $id ?>> 
			</div> 			
			<div class="form-group"> 
				<label for="name">PASSWORD</label> 
				<input type="password" class="form-control" name="password" id="password" placeholder = <?php echo $pass ?>> 
			</div> 
			
			<button type="submit" class="btn btn-default">SUBMIT</button> 
		</form>
		</div>

<?php
		//clear $_SESSION['ERRMSG_ARR'] 
		$_SESSION['ERRMSG_ARR'] = '';
		$_SESSION['LOGIN_FAILED'] = '';
	}
?>


<?php
	function autheticate($con)
	{
		//Start session
		session_start();
		
		//Array to store validation errors
		$errmsg_arr = array();
		
		//Validation error flag
		$errflag = false;
		
		//Sanitize the POST values
		$id = clean($con, $_POST['id']);
		$password = clean($con, $_POST['password']);
		
		//Input Validations
		if($id == '') 
		{
			$errmsg_arr[0] = 'Login_ID_Missing';
			$errflag = true;
		}
		if($password == '') 
		{
			$errmsg_arr[1] = 'Password_Missing';
			$errflag = true;
		}
		
		//If there are input validations, redirect back to the login form
		if($errflag) 
		{
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: index.php");
			exit();
		}
		
		//Create query
		$qry="SELECT `idEmployee`, `FName`, `LName`, `Department`, `Position`, `Password` FROM `employee` WHERE `idEmployee`='$id' AND `Password` = '".md5($_POST['password'])."' AND `Status`='Active'";
		$result=mysqli_query($con, $qry);
		
		//Check whether the query was successful or not
		if($result) 
		{
			if(mysqli_num_rows($result) == 1) {
				//Login Successful
				session_regenerate_id();
				$member = mysqli_fetch_assoc($result);
				$_SESSION['SESS_MEMBER_ID'] = $member['idEmployee'];
				$_SESSION['SESS_FIRST_NAME'] = $member['FName'];
				$_SESSION['SESS_LAST_NAME'] = $member['LName'];
				$_SESSION['SESS_DEPARTMERNT'] = $member['Department'];
				$_SESSION['SESS_POSITION'] = $member['Position'];

				session_write_close();
				header("location: index.php");
				exit();
			}else {
				//Login failed
				$_SESSION['LOGIN_FAILED'] = 'User ID does not match password';
				header("location: index.php");
				exit();
			}
		}else 
		{
			die("Query failed");
		}	
	}
?>