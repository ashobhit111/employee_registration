<?php
session_start();
include("dbconnection.php");
if(isset($_POST['login'])){
	$emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con, "SELECT ID FROM employee WHERE (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
     if($ret>0){
      $_SESSION['login']=$_POST['emailcont'];
	  $_SESSION['id']=$ret['id'];
	  echo "<script>alert('Login Successful');</script>";
	  // die('test');
	  header('location: change_password.php');
	  exit();
	}
	else{
		echo "<script>alert('Invalid Email or contact number or Password');</script>";
		// die('test');
		header('location: change_password_login.php');
		exit();
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Log In for change password</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Login Here for change Password</h2>
                    <form name="login" method="POST">
                        <div class="input-group">
                          
                            <input type="text" class="input--style-1" placeholder="Registered Email or Contact Number" required="true" name="emailcont">
                        </div>
                      
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    
                                    <input type="password" class="input--style-1" placeholder="Password" name="password" required="true">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="login">LOG IN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->