<?php
// Start a session and set error reporting for development
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection configuration
include("config.php"); // Include your database connection configuration

if (isset($_SESSION['act_id'])) {
    $act_id = $_SESSION['act_id'];
} else {
    // Handle the case when 'act_id' is not set in the session.
    echo "Error: 'act_id' is not set in the session.";
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize user inputs
    $act_name = filter_var($_POST['act_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $act_type = filter_var($_POST['act_type'], FILTER_SANITIZE_SPECIAL_CHARS);
    $sem = intval($_POST['sem']);
    $year = intval($_POST['year']);
    $remark = filter_var($_POST['remark'], FILTER_SANITIZE_SPECIAL_CHARS);

    // Set $act_level based on $act_type
    $act_level = ($act_type === 'Certificate') ? 'Certificate' : filter_var($_POST['act_level'], FILTER_SANITIZE_SPECIAL_CHARS);

    if (isset($act_level)) {
        // Rest of your code...
    } else {
        // Handle the case when $act_level is not set.
        echo "Error: 'act_level' is not set.";
    }
    // Prepare and execute the SQL update statement
    $sql = 'UPDATE activities
            SET act_name = ?,
                act_type = ?,
                act_level = ?,
                sem = ?,
                year = ?,
                remark = ?
            WHERE act_id = ?';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiisi", $act_name, $act_type, $act_level, $sem, $year, $remark, $act_id);

    if ($stmt->execute()) {
            // Update was successful
            echo '<script>';
            echo 'alert("Edit successful!");';
            echo 'window.location.href = "my_activities.php";';
            echo '</script>';
            exit();
        } 
     else {
        // Handle the update error here
        echo "Update failed: " . $stmt->error;
    }

    mysqli_close($conn);
}
?>