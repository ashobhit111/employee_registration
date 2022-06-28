<?php 
include('dbconnection.php');
if(isset($_POST['submit']))
  {
	$username=$_POST['username'];
    $fname=$_POST['fname'];
    $contno=$_POST['contactno'];
    $email=$_POST['email'];
	$state=$_POST['state'];
	$district=$_POST['district'];
    $password=md5($_POST['password']);
    $ret=mysqli_query($con, "select Email from employee where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
echo "<script>alert('This email or Contact Number already associated with another account');</script>";
    }
    else{
    $query=mysqli_query($con, "insert into employee(Username, FullName, MobileNumber, Email, State, District, Password) value('$username', '$fname', '$contno', '$email', '$state', '$district', '$password' )");
    if ($query) {
    echo "<script>alert('You have successfully registered');</script>";
    echo "<script>window.location.href ='login.php'</script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
       echo "<script>window.location.href ='index.php'</script>";
    }
}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up Page</title>
    
 
    <!-- Main CSS-->
    <link href="main.css" rel="stylesheet" media="all">
	
	
	<!-- Script Reference-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	
	<!-- Bootstrap cdn link for CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	
	<!-- Jquery/ajax script to check availability of username.  -->
	<script>
		function checkusernameAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
		url: "check_availability.php",
		data:'username='+$("#username").val(),
		type: "POST",
		success:function(data){
		$("#username-availability-status").html(data);
		$("#loaderIcon").hide();
		},
		error:function (){}
		});
		}
	</script>
	
	
	<!-- Jquery/ajax script to dropdown of States and Districs.  -->
	<script>
		function getdistrict(val) {
			$.ajax({
			type: "POST",
			url: "get_district.php",
			data:'state_id='+val,
			success: function(data){
				$("#district-list").html(data);
			}
			});
		}
		function selectCountry(val) {
			$("#search-box").val(val);
			$("#suggesstion-box").hide();
			}
	</script>
	
	
	
	
</head>
 
<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title"><u>Registration Form:</u></h2>
                    <form name="insert" action="" method="post">
					
						
                                <div>
									<label>Username :</label>
                                    <input class="form-control" type="text" placeholder="Username" id="username" name="username" onBlur="checkusernameAvailability()" required="true"> 
                                </div>
								<div><span id="username-availability-status"></span> </div>
						
						
								<div>
								<label>Name :</label>
									<input class="form-control" type="text" placeholder="NAME" name="fname" required="true">
								</div>
						
                      
                                <div>
								<label>Mobile Number :</label>
                                    <input class="form-control" type="text" placeholder="Mobile Number" name="contactno" required="true" maxlength="10" pattern="[0-9]+"> 
                                </div>
                           
						
						
								<div>
									<div class="rs-select2 js-select-simple select--no-search">
										<label>Email Address:</label>
									   <input class="form-control" type="email" placeholder="Email Address" name="email" required="true"> 
									</div>
								</div>
						
						
						<div>
                            <div class="rs-select2 js-select-simple select--no-search">
								<label scope="row">State:</label>
								<select name="state" onChange="getdistrict(this.value);" id="state" class="form-control" >
									<option value="">Select</option>
										<?php $query =mysqli_query($con,"SELECT * FROM states");
											while($row=mysqli_fetch_array($query))
											{ 
										?>
									<option value="<?php echo $row['stCode'];?>"><?php echo $row['stateName'];?></option>
										<?php
										}
										?>
								</select> 
                            </div>
                        </div>
						
						
						<div>
                            <div class="rs-select2 js-select-simple select--no-search">
								<label scope="row">District:</label>
								<select name="district" id="district-list" class="form-control">
									<option value="">Select</option>
								</select> 
                            </div>
                        </div>
						
						
						
                       
						<div>
							<label>Password :</label>
							<input type="password" value="" class="form-control" name="password" required="true" placeholder="Password">
						</div>
						
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="submit">Submit</button>
                        </div>
                        <br>
						
						<p>Already have an account?
							<a href="login.php" style="color: red">Login here</a>
						</p>
						
                    </form>
                </div>
            </div>
        </div>
    </div>
 
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<!-- end document-->
 