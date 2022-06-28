<?php
include('dbconnection.php');
if(!empty($_POST["state_id"])) 
{
$query =mysqli_query($con,"SELECT * FROM districts WHERE stCode = '" . $_POST["state_id"] . "'");
?>

<option value="">Select District</option>
<?php
while($row=mysqli_fetch_array($query))  
{
	
?>
<option value="<?php echo $row["districtName"]; ?>"><?php echo $row["districtName"]; ?></option>
<?php
}
}
?>
