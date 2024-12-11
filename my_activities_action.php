<?php
// Start a session and set error reporting for development
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection configuration
include("config.php"); // Include your database connection configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sem = mysqli_real_escape_string($conn, $_POST['sem']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $act_name = mysqli_real_escape_string($conn, $_POST['act_name']);
    $act_type = mysqli_real_escape_string($conn, $_POST['act_type']);
    $remark = mysqli_real_escape_string($conn, trim($_POST['remark']));
    $matricNo = $_SESSION['matricNo'];

    // Check if the act_type is "Certificate" to set act_level
    if ($act_type === 'Certificate') {
        $act_level = 'Certificate';
    } else {
        $act_level = mysqli_real_escape_string($conn, $_POST['act_level']);
    }

    $sql = "INSERT INTO Activities (matricNo, sem, year, act_name, act_type, act_level, remark)
            VALUES('$matricNo', '$sem', '$year', '$act_name', '$act_type', '$act_level', '$remark')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>';
        echo 'alert("Activities successfully added!");';
        echo 'window.location.href = "my_activities.php";'; // Redirect once OK is clicked
        echo '</script>';
        exit();
    } else {
        echo '<script>';
        echo "Error updating user information: " . mysqli_error($conn);
        echo 'window.location.href = "my_activities.php";'; // Redirect once OK is clicked
        echo '</script>';
    }

    mysqli_close($conn);
}
?>
