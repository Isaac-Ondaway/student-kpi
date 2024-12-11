<?php
session_start();
include("config.php"); // Include your database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stuName = mysqli_real_escape_string($conn, $_POST['stuName']);
    $matricNo = mysqli_real_escape_string($conn, $_POST['matricNo']);
    $stuEmail = mysqli_real_escape_string($conn, $_POST['stuEmail']);
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if matricNo already exists
    $checkQuery = "SELECT * FROM register WHERE matricNo = '$matricNo'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        // Matric No already exists
        echo '<script>';
        echo 'alert("User already exist please proceed to login.");';
        echo 'window.location.href = "login.php";'; // Redirect back to registration page
        echo '</script>';
        exit();
    }

    // Insert user data into the database
    $sql = "INSERT INTO register (stuName, matricNo, stuEmail, password) VALUES ('$stuName','$matricNo', '$stuEmail', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>';
        echo 'alert("Registration Successful!");';
        echo 'window.location.href = "login.php";'; // Redirect once OK is clicked
        echo '</script>';
        exit();
    } else {
        echo '<script>';
        echo 'alert("Error: ' . $sql . '\n' . mysqli_error($conn) . '");';
        echo 'window.location.href = "register.php";'; // Redirect once OK is clicked
        echo '</script>';
    }
    

    mysqli_close($conn);
}
?>
