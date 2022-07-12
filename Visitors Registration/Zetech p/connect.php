<?php
	
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$ID_num = $_POST['ID_num'];
	$number = $_POST['number'];
	$purpose = $_POST['Purpose'];
	// $time = $_POST['time'];
	// $signout_in = $_POST['signout_in'];

	// Database connection
	$conn = new mysqli('localhost','root','','zetech_db');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into visitors(firstName, lastName, gender, email, ID_num, Phonenumber, Purpose) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssiis" , $firstName, $lastName, $gender, $email, $ID_num, $number, $purpose);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>