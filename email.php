<?php
	if(isset($_POST['send']))
	{
	 $email=$_POST['email'];
	 $fromAddr='shobhitgupta920@gmail.com'; // the address to show in From field.
	 $recipientAddr = $_POST['email'];
	 $subjectStr = 'Subject';

	$mailBodyText = <<<HHHHHHHHHHHHHH
	<!DOCTYPE html>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
			<title>Demo From Website</title>
		</head>
		<body>
			<table>
				<tr>
					<td style="width:150px;"><b>Subject:</b></td>
					<td><b>:</b></td>
					<td style="text-transform:capitalize;">$_POST[subject]</td>
				</tr>
					<tr>
					<td><b>Message</b></td>
					<td><b>:</b></td>
					<td style="text-transform:capitalize;">$_POST[message]</td>
				</tr>
			</table>
		</body>
	</html>
	HHHHHHHHHHHHHH;

	$headers= <<<TTTTTTTTTTTT
	From: $fromAddr
	MIME-Version: 1.0
	Content-Type: text/html;
	TTTTTTTTTTTT;
	if(mail($recipientAddr,$subjectStr,$mailBodyText,$headers)){
    echo "<script>alert('Your Information has been send sucessfully...');</script>";
	}else{
		echo "Sorry, failed while sending mail!";
	}
	
	//echo "($recipientAddr,$subjectStr,$mailBodyText,$headers)";
	
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Email</title>
		
			<!-- Bootstrap cdn link for CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link href="main.css" rel="stylesheet" media="all">
		
		
	</head>
	<body>
		<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
			<div class="wrapper wrapper--w680">
				<div class="card card-1">
					<div class="card-body">
						<h2 class="title"><u>Email :</u></h2>
						<form name="mail" action="" method="post">
							<div>
								<label>Email to :</label>
								<input type="email" name="email" value="" class="form-control" required>
							</div>
							<div>
								<label>Subject :</label>
								<input type="text" name="subject" value="" class="form-control">
							</div>
							<div>
								<label>Message :</label>
								<textarea name="message" rows="6" class="form-control"></textarea>
							</div>
							<div class="p-t-20">
								<input type="submit" value="Send" name="send"  class="btn btn--radius btn--green">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>