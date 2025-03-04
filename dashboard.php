<?php
// Include database connection
include 'db.php';

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Please <a href='login.php'>login</a> first.");
}

// SQL query to fetch feedback data, joined with user names
$sql = "SELECT users.name, feedback.rating, feedback.comments, feedback.date 
        FROM feedback 
        JOIN users ON feedback.user_id = users.id 
        ORDER BY feedback.date DESC";

// Execute the query
$result = $conn->query($sql);

// Display feedback dashboard heading
echo "<h2>Feedback Dashboard</h2>";

// Loop through the results and display feedback
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>";
        echo "<strong>{$row['name']}</strong> (Rating: {$row['rating']}) <br>";
        echo "{$row['comments']} <br>";
        echo "<em>on {$row['date']}</em>";
        echo "</p>";
    }
} else {
    echo "<p>No feedback available.</p>";
}
?>