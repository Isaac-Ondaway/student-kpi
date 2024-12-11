<?php
// Check if the user is not logged in
if (!isset($_SESSION['matricNo'])) {
    echo '<script>';
	echo 'alert("You must be logged in to access this page.");';
	echo 'window.location.href = "login.php";'; // Redirect once OK is clicked
	echo '</script>';
    exit();
}
?>