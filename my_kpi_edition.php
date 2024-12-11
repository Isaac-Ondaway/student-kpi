<?php
include("config.php");
session_start();

$matricNo = $_SESSION['matricNo'];
$i_sem = mysqli_real_escape_string($conn, $_POST['i_sem']);
$i_year = mysqli_real_escape_string($conn, $_POST['i_year']);
$cgp = mysqli_real_escape_string($conn, $_POST['cgp']);
$leadership = mysqli_real_escape_string($conn, $_POST['leadership']);
$graduate_aim = mysqli_real_escape_string($conn, $_POST['graduate_aim']);

$sql = "UPDATE indicators
        SET CGP = ?, leadership = ?, graduate_aim = ?
        WHERE matricNo = ? AND i_sem = ? AND i_year = ?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}

$stmt->bind_param("ssssii", $cgp, $leadership, $graduate_aim, $matricNo, $i_sem, $i_year);

if ($stmt->execute()) {
    echo '<script>alert("Record Successful"); window.location.href = "my_kpi.php";</script>';
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
mysqli_close($conn);
?>