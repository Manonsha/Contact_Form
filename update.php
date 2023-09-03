<!DOCTYPE html>
<html>
<head>
	<title>Student Form</title>

<style>
	body{
		margin: 0 auto;
		width: 500px;
		align-items: center;
		display: flex;
		justify-content: center;
	}
	form{
		border: 1px solid black;
		background-color: blue;
		padding: 20px;

	}
</style>
</head>
<body>
	<form method="post">
		<h1>Contact Form</h1>
		<label for="text">Full Name: </label><br>
		<input type="text" name="name" id="text" onkeydown="return /[a-zA-Z]/i.test(event.key)"required><br>

		<label for="phone">Phone Number: </label><br>
		<input type="Number" name="phone" required><br>

		<label for="Email">Email: </label><br>
		<input type="Email" name="email" required><br>

		<label for="Subject">Subject</label><br>
		<input type="text" name="Subject" required><br>

		<label for = " Message">Message</label><br>
		<textarea name="message" placeholder="Enter your message..." required></textarea><br><br>


		<input type="reset" value="Clear">&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="submit" name="button" >Submit</button>
	</form>

</body>
</html>

<?php
include 'connect.php';

if (array_key_exists('button', $_POST)){
	$name =$_POST["name"];
	$phone =$_POST["phone"];
	$email =$_POST["email"];
	$subject = $_POST["Subject"];
	$message =$_POST["message"];

	try{
		$sql = "Select * from `contact`";
		$result = mysqli_query($con, $sql);
	}
	catch(Exception $e){
		$sql = "CREATE TABLE `contact` (
   		Name VARCHAR(100) NOT NULL,
    	Phone_Number VARCHAR(15) NOT NULL,
    	Email VARCHAR(100) NOT NULL,
    	Subject VARCHAR(100) NOT NULL,
    	Message TEXT NOT NULL)";
		$result = mysqli_query($con, $sql);
		echo result;
	}

	$sq = "INSERT INTO contact (Name,Phone_Number,Email,Subject,Message) VALUES ('$name','$phone','$email',
	'$subject','$message')";
	$result = mysqli_query($con, $sq);
		# code...


}
?>