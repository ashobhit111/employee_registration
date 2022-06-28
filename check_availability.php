<?php
	include("dbconnection.php");
	//Code check user name
	if(!empty($_POST["username"])) {
		$result1 = mysqli_query($con,"SELECT count(*) FROM employee WHERE Username='" . $_POST["username"] . "'");
		$row1 = mysqli_fetch_row($result1);
		$user_count = $row1[0];
		if($user_count>0) {
			echo "<span style='color:red'> Username already exist .</span>";
			}
		else {
			echo "<span style='color:green'> Username Available.</span>";
			}
	}
	// End code check username
?>