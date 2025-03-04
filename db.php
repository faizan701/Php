<?php
// Database connection details
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "feedback_db";

// Create a new mysqli connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>