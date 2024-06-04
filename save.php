<?php
	//starting the session
	session_start();

	//including the database connection
	require_once 'conn.php';
	
	if(ISSET($_POST['register'])){
		// Setting variables
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$mail = $_POST['mail'];
		$education = $_POST['education'];
		$feedback = $_POST['feedback'];
		$changes = $_POST['changes'];
		
		// Insertion Query
		$query = "INSERT INTO `DATA` (name, gender, mail, education, feedback, changes) VALUES(:name, :gender, :mail, :education, :feedback, :changes)";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':gender', $gender);
		$stmt->bindParam(':mail', $mail);
		$stmt->bindParam(':education', $education);
		$stmt->bindParam(':feedback', $feedback);
		$stmt->bindParam(':changes', $changes);
		
		// Check if the execution of query is success
		if($stmt->execute()){
			//setting a 'success' session to save our insertion success message.
			$_SESSION['success'] = "Successfully created an account";

			//redirecting to the index.php 
			header('location: form.php');
		}

	}
?>