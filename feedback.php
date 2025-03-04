<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Please <a href='login.php'>login</a> first.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO feedback (user_id, rating, comments) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $rating, $comments);

    if ($stmt->execute()) {
        echo "Feedback submitted successfully. <a href='dashboard.php'>View Feedback</a>"; // Added link here.
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<form method="POST">
    Rating (1-5): <input type="number" name="rating" min="1" max="5" required><br>
    Comments: <textarea name="comments" required></textarea><br>
    <button type="submit">Submit Feedback</button>
</form>
<p><a href='dashboard.php'>View Feedback</a></p>