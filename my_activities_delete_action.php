<?php
// Start a session and set error reporting for development
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection configuration
include("config.php"); // Include your database connection configuration

$act_id = $_GET['act_id'];
$sql = 'DELETE FROM activities WHERE act_id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $act_id); // Change "s" to "i" for integer

if ($stmt->execute()) {
    // Update was successful
    echo '<script>';
    echo 'alert("Delete successful!");';
    echo 'window.location.href = "my_activities.php";';
    echo '</script>';
    exit();
    // You can redirect the user to a success page or perform other actions
} else {
    // Handle the update error here
    echo "Update failed: " . $stmt->error;
}

mysqli_close($conn);
?>