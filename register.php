<?php
// Include the configuration file with database connection details
require_once 'config.php';

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];

// Validate form data (add more validation as per your needs)
if (empty($full_name) || empty($email) || empty($gender)) {
    die("Error: All fields are required.");
}

// Insert data into the "students" table
$sql = "INSERT INTO students (full_name, email, gender) VALUES ('$full_name', '$email', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
