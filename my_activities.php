<?php
include('config.php');
session_start();
include('check_login.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<style>
    body {
        background: linear-gradient(135deg, hsla(208, 67%, 81%, 1) 0%, hsla(37, 65%, 85%, 1) 50%, hsla(301, 65%, 83%, 1) 100%);
}
</style>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
        #myForm {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        table {
        margin-left: auto;
        margin-right: auto;
    }
    h2{
        text-align center;
    }
        </style>
    <title>My Study KPI</title>
    <link rel="stylesheet" href="css_inv1/style.css"> 
</head>
</html>
<body>
    <div class="header">
        <h1>My Study KPI</h1>
    </div>

	<?php include 'menu.php';?>
        <div style="display: flex; align-items: center;">
  <h2 style="margin-top: 2%;  margin-left: 11%;">List of Activities</h2>
</div>
        <div class="d-grid gap-2 col-4 mx-auto">
        <a href="add_activities.php" class="btn btn-primary">Add Activity</a>
    </div>
	<main>
       
<?php

$sql = "SELECT * FROM activities WHERE act_type = ? AND matricNo = ? ORDER BY year, sem";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $act_type, $matricNo);
$matricNo = $_SESSION['matricNo'];

for($i = 0; $i < 3; $i++){
  if($i == 0){
    $act_type = "activities";
  }
  elseif ($i == 1) {
    $act_type = "competition";
  }
  else {
    $act_type = "certificate";
  }

    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h2 style='text-align: left; margin-left: 11%;'>";

    if ($i == 0) {
        echo "Activity";
    } elseif ($i == 1) {
        echo "Competition";
    } else {
        echo "Certification";
    }

    echo "</h2>";

      // Check if any data was fetched
      if ($result->num_rows > 0) {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-striped table-hover' style='width: 80%;' >
        <thead class = 'table-primary'>
        <tr>
            <th width='3%'>No</th>
            <th width='30%'>Activity Name</th>";
            echo "<th width='8%'>Activity Level</th>";
            echo "<th width='5%'>Year</th>
            <th width='5%'>Sem</th>
            <th>Remark</th>
            <th width='8%'></th>
        </tr>
        </thead>";
        $counter = 1;
        // Fetch and display data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $counter . "</td>";
            echo "<td class='text-break'>" . $row['act_name'] . "</td>";
            echo "<td>" . $row['act_level'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" . $row['sem'] . "</td>";
            echo "<td class='text-break'>" . $row['remark'] . "</td>";
            echo "<td class='action'><button class='edit-button btn btn-warning btn-sm' data-activities-id='" . $row['act_id'] . "'>Edit</button>&nbsp;"; 
            echo "<a class='delete-button btn btn-danger btn-sm' href='my_activities_delete_action.php?act_id=" . $row['act_id'] . "' >Delete</a></td>";

            echo "</tr>";
            $counter++;
        }

        // Close the table
        echo "</table>";
        echo "</div>";
    } else {
        // Display a message when there's no data
        echo "<div class='table-responsive'>";
        echo "<table class='table custom-table table-bordered table-striped table-hover' style='width: 80%;'>
            <thead class = 'table-primary'>
            <tr>
            <th width='3%'>No</th>
            <th width='30%'>Activity Name</th>";
            echo "<th width='8%'>Activity Level</th>";
            echo "<th width='5%'>Year</th>
            <th width='5%'>Sem</th>
            <th>Remark</th>
            
            </tr>
            </thead>
            <tr>
                <td colspan='6'><p>No data available for " . ucfirst($act_type) . "</p></td>
            </tr>
        </table>
        </div>";
    }
}

?>


           
            </main>
            <br>
            <br>
            <footer>
                <small><i>Copyright &copy; 2023 FCI</i></small>
            </footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
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
        // Add an event listener to all "Edit" buttons with the class 'edit-button'
    var deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Get the Activities_id from the 'data-activities-id' attribute
        var activitiesId = this.getAttribute('data-activities-id');

        // Construct the URL for the edit page with the Activities_id as a parameter
        var editPageUrl = 'my_activities_delete_action.php?act_id=' + activitiesId;

        // Redirect to the edit page
        window.location.href = editPageUrl;
    });
    });

    var editButtons = document.querySelectorAll('.edit-button');
    editButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Get the Activities_id from the 'data-activities-id' attribute
        var activitiesId = this.getAttribute('data-activities-id');

        // Construct the URL for the edit page with the Activities_id as a parameter
        var editPageUrl = 'my_activities_edit.php?act_id=' + activitiesId;

        // Redirect to the edit page
        window.location.href = editPageUrl;
    });
    });
    </script>