<?php
  include('config.php');
  include('function.php');
  session_start();
  ?>

<style>
    body {
        background: linear-gradient(135deg, hsla(208, 67%, 81%, 1) 0%, hsla(37, 65%, 85%, 1) 50%, hsla(301, 65%, 83%, 1) 100%);
}
</style>

<!DOCTYPE html>
<html>
    <style>
	table {
        margin-left: auto;
        margin-right: auto;
    }
    </style>
<head>
	<title>My Study KPI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css_inv1/style.css">
</head>
<body>
<div class="header">
	<h1>My Study KPI
    </h1>
</div>

	<?php include 'menu.php';?>
    
	<main>
    <div style="display: flex; align-items: center;">
  <h2 style="margin-top: 2%;  margin-left: 11%;">KPI Indicator</h2>
</div>

        <?php

echo "
<div class='table-responsive'>
<table border='2'class='table table-bordered table-striped table-hover' style='width: 80%;'>
<thead class = 'table-primary'>
<tr>
<th rowspan='2'>Year</th>
<th rowspan='2'>Sem</th>
<th rowspan='2'>CGP</th>
<th colspan='4'>Activities</th>
<th colspan='4'>Competition</th>
<th rowspan='2'>Leadership</th>
<th rowspan='2'>Graduate Aim</th>
<th rowspan='2'>Professional Certification</th>
</tr>
<tr>
<th>Faculty</th>
<th>University</th>
<th>National</th>
<th>International</th>
<th>Faculty</th>
<th>University</th>
<th>National</th>
<th>International</th>
</tr>
</thead>";

$matricNo = $_SESSION['matricNo'];

for ($x = 1; $x <= 4; $x++) {
    $year = $x;
    for ($y = 1; $y <= 2; $y++) {
        $sem = $y;
        $act_FL  = getCountOfActivities($conn, 'Activities', 'Faculty', $sem, $year, $matricNo);
        $act_UL = getCountOfActivities($conn, 'Activities', 'University', $sem, $year, $matricNo);
        $act_NL = getCountOfActivities($conn, 'Activities', 'National', $sem, $year, $matricNo);
        $act_IL = getCountOfActivities($conn, 'Activities', 'International', $sem, $year, $matricNo);
        $comp_FL = getCountOfActivities($conn, 'Competition', 'Faculty', $sem, $year, $matricNo);
        $comp_UL = getCountOfActivities($conn, 'Competition', 'University', $sem, $year, $matricNo);
        $comp_NL = getCountOfActivities($conn, 'Competition', 'National', $sem, $year, $matricNo);
        $comp_IL = getCountOfActivities($conn, 'Competition', 'International', $sem, $year, $matricNo);
        $certification = getCountOfCertification($conn, 'Certificate', $sem, $year, $matricNo);

        // Update KPI with the obtained counts
        updateKPI($conn, $matricNo, $year, $sem, $act_FL, $act_UL, $act_NL, $act_IL, $comp_FL, $comp_UL, $comp_NL, $comp_IL, $certification);
    }
}

$stmt = $conn->prepare("SELECT * FROM indicators WHERE matricNo = ? AND i_year = ? AND i_sem = ?");
$stmt->bind_param("sii", $matricNo, $year, $sem);

for ($i = 1; $i <= 4; $i++) {
    $year = $i;
    for ($sem = 1; $sem <= 2; $sem++) {
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            echo "<tr>";
            if ($sem == 1) {
                echo "<td rowspan='2'>$year</td>"; // Year, rowspan for 2 semesters
            }
            echo "<td>$sem</td>"; // Semester
            echo "<td>" . $row['CGP'] . "</td>"; // CGP
            // Activities columns
            echo "<td>" . $row['act_FL'] . "</td>"; // Faculty
            echo "<td>" . $row['act_UL'] . "</td>"; // University
            echo "<td>" . $row['act_NL'] . "</td>"; // National
            echo "<td>" . $row['act_IL'] . "</td>"; // International

            // Competition columns
            echo "<td>" . $row['comp_FL'] . "</td>"; // Faculty
            echo "<td>" . $row['comp_UL'] . "</td>"; // University
            echo "<td>" . $row['comp_NL'] . "</td>"; // National
            echo "<td>" . $row['comp_IL'] . "</td>"; // International

            echo "<td>" . $row['leadership'] . "</td>"; // Leadership, rowspan for 2 semesters
            echo "<td>" . $row['graduate_aim'] . "</td>"; // Graduate Aim, rowspan for 2 semesters
            echo "<td>" . $row['professional_certification'] . "</td>"; // Professional Certification, rowspan for 2 semesters

            echo "</tr>";
        }
    }
}


echo "</table>
        </div>";

?>
<div class="d-flex justify-content-center">
    <a href="add_kpi.php" class="btn btn-primary">Add Data</a>&nbsp;
    <a href="my_kpi_edit.php" class="btn btn-warning">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
</div>
</main>
<script>
//for responsive sandwich menu
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>