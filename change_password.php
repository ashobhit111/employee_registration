<?php
	session_start();
	include("dbconnection.php");
	if(isset($_POST['cngpswd']))
	{
	 $oldpass=md5($_POST['opwd']);
	 $userEmailCon=$_SESSION['login'];
	 $newpassword=md5($_POST['npwd']);
	$sql=mysqli_query($con,"SELECT Password FROM employee where Password='$oldpass' && (Email='$userEmailCon' || MobileNumber='$userEmailCon')");
	$num=mysqli_fetch_array($sql);
	if($num>0)
	{
	 $con=mysqli_query($con,"update employee set Password='$newpassword' where (Email='$userEmailCon' || MobileNumber='$userEmailCon')");
	 echo "<script>alert('Password Changed Successfully !!');</script>";
	 // die('success');
	 header('location: login.php');
	 exit();
	}
	else
	{
	 echo "<script>alert('Old Password not match !!');</script>";
	 // die('failed');
	 header('location: change_password.php');
	 exit();
	}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Change password</title>
		<link href="main.css" rel="stylesheet">
		
		<script type="text/javascript">
			function valid()
			{
			if(document.chngpwd.opwd.value=="")
			{
			alert("Old Password Filed is Empty !!");
			document.chngpwd.opwd.focus();
			return false;
			}
			else if(document.chngpwd.npwd.value=="")
			{
			alert("New Password Filed is Empty !!");
			document.chngpwd.npwd.focus();
			return false;
			}
			else if(document.chngpwd.cpwd.value=="")
			{
			alert("Confirm Password Filed is Empty !!");
			document.chngpwd.cpwd.focus();
			return false;
			}
			else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
			{
			alert("Password and Confirm Password Field do not match  !!");
			document.chngpwd.cpwd.focus();
			return false;
			}
			return true;
			}
		</script>
		
		
	</head>
	<body>
		<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
			<div class="wrapper wrapper--w680">
				<div class="card card-1">
					<div class="card-heading"></div>
					<div class="card-body">
						<h2 class="title">Change Password:</h2>
						<form name="chngpwd" action="" method="post" onSubmit="return valid();">
							<div class="row row-space">
								<div class="col-2">
									<div class="input-group">
							  
										<input type="password" class="input--style-1" placeholder="Enter Your Old Password" required="true" name="opwd" id="opwd">
									</div>
								</div>
							</div>
							
							<div class="row row-space">
								<div class="col-2">
									<div class="input-group">
										
										<input type="password" class="input--style-1" placeholder="Enter New Password" name="npwd"  id="npwd" required="true">
									</div>
								</div>
							</div>
							
							<div class="row row-space">
								<div class="col-2">
									<div class="input-group">
										
										<input type="password" class="input--style-1" placeholder="Confirm Password" name="cpwd"  id="cpwd" required="true">
									</div>
								</div>
							</div>
							
							
							<div class="p-t-20">
								<button class="btn btn--radius btn--green" type="submit" name="cngpswd">Change Password</button>
							</div>
							<br>
							<p>Back to login page:
								<a href="login.php">click here</a>
							</p> 
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>