<?php
session_start();
include("config.php");
?>
<html>
<head>
    <title>Login Action</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" type="text/css" href="mystyle.css" media="screen" />
</head>
<body>
    <h2>Login Information</h2>

    <?php
    // Check if 'matricNo' is set in the $_POST array
	if (isset($_POST['matricNo'])) {
		$userMatric = mysqli_real_escape_string($conn, $_POST['matricNo']);
		$userPwd = $_POST['userPwd'];
	
		$sql = "SELECT * FROM register WHERE matricNo='$userMatric'";
		$result = mysqli_query($conn, $sql);
	
		if ($result) {
			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				$hashedPassword = $row["password"];
	
				// Verify the entered password against the stored hash
				if (password_verify($userPwd, $hashedPassword)) {
					//successful login
    				$_SESSION['matricNo'] = $userMatric;

					// Redirect to index.php
   					header('Location: index.php');
    				exit();

				} else {
				    // Display a JavaScript alert
					echo '<script>';
					echo 'alert("Login error. Incorrect password.");';
					echo 'window.location.href = "login.php";'; // Redirect once OK is clicked
					echo '</script>';
					
					// Exit to prevent further execution
					exit();
				}
			} else {
				 // Display a JavaScript alert
				 echo '<script>';
				 echo 'alert("Login error. User does not exist.");';
				 echo 'window.location.href = "login.php";'; // Redirect once OK is clicked
				 echo '</script>';
				 
				 // Exit to prevent further execution
				 exit();
			}
		} else {
			echo "Query failed: " . mysqli_error($conn) . "<br>";
		}
	

        mysqli_close($conn);
    } else {
        echo "Invalid request. 'matricNo' not set in the form submission.";
    }
    ?>
</body>
</html>
