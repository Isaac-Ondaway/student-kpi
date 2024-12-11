
<style>
    body {
        background: linear-gradient(135deg, hsla(208, 67%, 81%, 1) 0%, hsla(37, 65%, 85%, 1) 50%, hsla(301, 65%, 83%, 1) 100%);
}
</style>

<!DOCTYPE html>
<?php
session_start();
include("config.php"); //connect database
include("check_login.php")
?>

<html>
<style>
	table {
        margin-left: auto;
        margin-right: auto;
    }


    </style>
	
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css_inv1/style.css">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <title>My KPI</title>
	
<script>
function myFunction() {
	var x = document.getElementById("myTopnav");
  	if (x.className === "topnav") {
    	x.className += " responsive";
  	} else {
    	x.className = "topnav";
  	}
}
</script>
</head>
<body>
<?php
    $matricNo = $_SESSION['matricNo'];

    $sql = "SELECT * FROM register WHERE matricNo = '$matricNo'";
    $result = mysqli_query($conn, $sql);
    
	if ($result && $row = mysqli_fetch_assoc($result)) {
		// set variables
		$matricNo = $row["matricNo"];
		$stuEmail = $row["stuEmail"];
		$stuName = $row["stuName"];
		$program = $row["program"];
		$intakeBatch = $row["intakeBatch"];
		$mentorName = $row["mentorName"];
		$state = $row["state"];
		$phoneNo = $row["phoneNo"];
		$profilePic = $row["profilePic"];
		$studyMotto = $row["studyMotto"];
	
		// Construct the profile picture path
		if (!empty($profilePic)) {
			$profilePicPath = "profile_pic/" . $profilePic;
		} else {
			// Default profile picture if $profilePic is empty
			$profilePicPath = "profile_pic/default.jpg";
		}

		if (empty($studyMotto)) {
			$studyMotto = "Add your study motto to motivate you !";
		
	}
}
?>

    <div class="header">
	<img src="img\education.svg" alt="Logo" width="80" height="80">&nbsp;&nbsp;
        <h1>My Study KPI</h1>

    </div>

	<?php include 'menu.php';?>
	<div style="display: flex; align-items: center;">
  <h2 style="margin-top: 1%; margin-left: auto;margin-right: auto;">My Profile</h2>
</div>

    <div class="row">
		<div class="col-left">
			<img class="image" src="<?php echo $profilePicPath?>">
		</div>
		<div class="col-right">
			<table border='5' class = "table table-bordered table-hover table-striped" style='width: 60%; margin-top: 2%;'>
				<tr>
					<th width="200">&nbsp;Name</th>
					<td>&nbsp;<?=$stuName?></td>
				</tr>	
				<tr>
					<th>&nbsp;Matric No.</th>
					<td>&nbsp;<?=$matricNo?></td>
				</tr>
				<tr>
					<th>&nbsp;Email</th>
					<td>&nbsp;<?=$stuEmail?></td>
				</tr>
				<tr>
					<th>&nbsp;Program</th>
					<td>&nbsp;<?=$program?></td>
				</tr>
				<tr>
					<th>&nbsp;State of Origin</th>
					<td>&nbsp;<?=$state?></td>
				</tr>
				<tr>
					<th>&nbsp;Intake Batch</th>
					<td>&nbsp;<?=$intakeBatch?></td>
				</tr>
				<tr>
					<th>&nbsp;Phone No.</th>
					<td>&nbsp;+60<?=$phoneNo?></td>
				</tr>
				<tr>
					<th>&nbsp;Mentor Name</th>
					<td>&nbsp;<?=$mentorName?></td>
				</tr>
			</table>
			<br>
			<div class="d-flex justify-content-center">
    <a href="profile_edit.php" class="btn btn-warning">Edit Profile</a>
</div>




		</div>
	</div>
	<footer>
		<i><?php echo $studyMotto?></i>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
