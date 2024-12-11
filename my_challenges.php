<style>
table {
        margin-left: auto;
        margin-right: auto;
    }
body {
        background: linear-gradient(135deg, hsla(208, 67%, 81%, 1) 0%, hsla(37, 65%, 85%, 1) 50%, hsla(301, 65%, 83%, 1) 100%);
}
</style>
<!DOCTYPE html>
<html>

<head>
<title>My Study KPI</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css_inv1/style.css">
</head>
<body>
<div class="header">
	<h1>My Study KPI</h1>
</div>

<?php include 'menu.php';?>
<div style="display: flex; align-items: center;">
  <h2 style="margin-top: 2%;  margin-left: 11%;">List of Challenge and Plan</h2>
</div>
<div class="d-grid gap-2 col-4 mx-auto">
  <a href="add_challenges.php" class="btn btn-primary" >Add Challenge</a>
</div>
<br>
<div class="table-responsive">
   <table class='table table-bordered table-striped table-hover' style='width: 80%;' >
        <thead class = 'table-primary' >
        <tr>
            <th width="3%">No</th>
            <th >Year</th>
			<th >Sem</th>
            <th width="35%">Challenge</th>
            <th width="35%">Plan</th>
            <th >Remark</th>
            <th width="8%"></th>
        </tr>
</thead>
        <?php
        include('config.php');
        session_start();
        include('check_login.php');
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $matricNo = $_SESSION['matricNo'];

        // Fetch data from the 'challenges' table
        $sql = "SELECT * FROM challenges WHERE matricNo = ? ORDER BY year, sem";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $matricNo);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);


        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $numrow = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo '<th>' . $numrow . '.</td>';
                echo '<td>' . $row["year"] . '</td>';
                echo '<td>' . $row["sem"] . '</td>';
                echo '<td class="text-break">' . $row["challenge"] . '</td>';
                echo '<td class="text-break">' . $row["plan"] . '</td>';
                echo '<td class="text-break">' . $row["remark"] . '</td>';
                echo '<td><a class=" btn btn-warning btn-sm" href="my_challenge_edit.php?c_id=' . $row["c_id"] . '">Edit</a>&nbsp;&nbsp;';
                echo '<a class=" btn btn-danger btn-sm" href="my_challenge_delete.php?c_id=' . $row["c_id"] . '" onClick="return confirm(\'Delete?\');">Delete</a></td>';
                echo "</tr>\n\t\t";
                $numrow++;
            }   
        }
        else {
            echo '<tr><td colspan="7">0 results</td></tr>';
        }
        mysqli_close($conn);
        ?>
    </table>
    </div>

<footer>
	<p>Copyright (c) 2023 - My Name</p>
</footer>

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