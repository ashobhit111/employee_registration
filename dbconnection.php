<?php
// connect to the database
$con = mysqli_connect("localhost", "root", "", "company");

if(mysqli_connect_errno())
{
	echo "Connection Failed".mysqli_connect_error();
}
?>