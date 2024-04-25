<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['mail'];
    $education = $_POST['education'];
    $feedback = $_POST['status'];
    $suggested_changes = $_POST['change'];
    
    // You may want to perform additional validation/sanitization here
    
    // Database connection
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO feedback (name, gender, email, education, feedback, suggested_changes) VALUES (?, ?, ?, ?, ?, ?)";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $gender, $email, $education, $feedback, $suggested_changes);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Feedback submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect user back to the feedback page if they access this script directly
    header("Location: feedback.html");
    exit;
}
?>