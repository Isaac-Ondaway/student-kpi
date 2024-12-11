<?php
// Start a session and set error reporting for development
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection configuration
include("config.php"); // Include your database connection configuration

if (isset($_SESSION['c_id'])) {
    $c_id = $_SESSION['c_id'];
} else {
    // Handle the case when 'c_id' is not set in the session.
    echo "Error: 'c_id' is not set in the session.";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$c_id = $_POST["c_id"];
    $sem = $_POST["sem"];
    $year = $_POST["year"];
    $challenge = trim($_POST["challenge"]);
    $plan = trim($_POST["plan"]);
    $remark = trim($_POST["remark"]);

    $sql = "UPDATE challenges SET
            sem = ?,
            year = ?,
            challenge = ?,
            plan = ?,
            remark = ?
            WHERE c_id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssi", $sem, $year, $challenge, $plan, $remark, $c_id);
        mysqli_stmt_execute($stmt);

        if ($stmt->execute()) {
            // Update was successful
            echo '<script>';
            echo 'alert("Edit successful!");';
            echo 'window.location.href = "my_challenges.php";';
            echo '</script>';
            exit();
        } 
     else {
        // Handle the update error here
        echo "Update failed: " . $stmt->error;
    }

}
}

mysqli_close($conn);

function update_DBTable($stmt)
{
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        return true;
    } else {
        echo "Error: " . mysqli_stmt_error($stmt) . "<br>";
        return false;
    }
}

?>