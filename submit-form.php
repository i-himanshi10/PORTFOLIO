<?php
// Establish a connection to SQLite database
$pdo = new PDO('sqlite:path/to/your/database.db');

// Retrieve form data
$name = $_POST['name'];
$gender = $_POST['gender'];
$mail = $_POST['mail'];
$education = $_POST['education'];
$status = $_POST['status'];
$change = $_POST['change'];

// Prepare SQL statement
$sql = "INSERT INTO feedback (name, gender, mail, education, status, change) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

// Execute the statement
$stmt->execute([$name, $gender, $mail, $education, $status, $change]);

// Close the connection
$pdo = null;

// Redirect user back to the feedback page or any other page
header("Location: feedback.html");
exit();
?>
