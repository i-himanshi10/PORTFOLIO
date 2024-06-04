<?php
// Starting the session
session_start();

// Including the database connection
require_once 'conn.php';

if (isset($_POST['register'])) {
    // Setting variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $mail = $_POST['mail'];
    $education = $_POST['education'];
    $feedback = $_POST['feedback'];
    $changes = $_POST['changes'];
    
    // Prepare an array to collect error messages
    $errors = array();

    // Basic form validation (optional but recommended)
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (empty($mail)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    // Add more validation checks as needed...

    // If there are no errors, proceed with the database operation
    if (empty($errors)) {
        try {
            // Insertion Query
            $query = "INSERT INTO `DATA` (name, gender, mail, education, feedback, changes) VALUES(:name, :gender, :mail, :education, :feedback, :changes)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':education', $education);
            $stmt->bindParam(':feedback', $feedback);
            $stmt->bindParam(':changes', $changes);

            // Execute the query
            if ($stmt->execute()) {
                // Setting a 'success' session to save our insertion success message.
                $_SESSION['success'] = "Successfully created an account";

                // Redirecting to the form.php
                header('Location: form.php');
                exit();
            } else {
                // If execution failed, set an error message
                $_SESSION['error'] = "There was an error processing your request.";
            }
        } catch (PDOException $e) {
            // Catch any PDO exceptions and set an error message
            $_SESSION['error'] = "Database error: " . $e->getMessage();
        }
    } else {
        // If there were validation errors, set them in the session
        $_SESSION['error'] = implode("<br>", $errors);
    }

    // Redirect back to the form in case of errors
    header('Location: form.php');
    exit();
}
?>
