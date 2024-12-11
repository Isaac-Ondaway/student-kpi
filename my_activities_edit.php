<?php
include('config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
<style>
    body {
        background: linear-gradient(135deg, hsla(208, 67%, 81%, 1) 0%, hsla(37, 65%, 85%, 1) 50%, hsla(301, 65%, 83%, 1) 100%);
}
    table {
        margin-left: auto;
        margin-right: auto;
    }
    td input[type="text"] {
        width: 100%;
        box-sizing: border-box;
    }
    h1{
        text-align: center;
    }
    .center-button {
        text-align: center;
    }
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css_inv1/style.css">
    <title>Edit Activities</title>
  </head>
  <body class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <?php
    $act_id = $_GET['act_id'];
    $_SESSION['act_id'] = $act_id ;
    $sql = "SELECT * FROM activities WHERE act_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $act_id); 
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);

    ?>

    <h1>Edit Activity</h1>
    <form class="" action="my_activities_edition.php" method="post">
    <table>
        <tr>
            <th><label for="sem">Semester:</label></td> 
            <td>
            <select class="form-select" name="sem" id="sem" required>
                  <option value="1" <?php if ($row['sem'] == '1') echo 'selected'; ?>>1</option>
                  <option value="2" <?php if ($row['sem'] == '2') echo 'selected'; ?>>2</option>
            </select>
            </td>
        </tr>
        <tr>
            <th><label for="year">Year:</label></td> 
            <td>
            <select class="form-select" name="year" id="year" required>
                  <option value="1" <?php if ($row['year'] == '1') echo 'selected'; ?>>1</option>
                  <option value="2" <?php if ($row['year'] == '2') echo 'selected'; ?>>2</option>
                  <option value="3" <?php if ($row['year'] == '3') echo 'selected'; ?>>3</option>
                  <option value="4" <?php if ($row['year'] == '4') echo 'selected'; ?>>4</option>
            </select>
            </td>
        </tr>
        <tr>
            <th><label for="act_name">Activity Name:</label></td>
            <td><input class="form-control" type="text" required name="act_name" id="act_name" value="<?php echo $row['act_name'];?>"></td>
        </tr>
        <tr>
    <th><label for="act_type">Activity Type:</label></td> 
    <td>
        <select class="form-select" name="act_type" id="act_type" required onchange="updateActLevel()">
            <option value="Activities" <?php if ($row['act_type'] == 'Activities') echo 'selected'; ?>>Activities</option>
            <option value="Competition" <?php if ($row['act_type'] == 'Competition') echo 'selected'; ?>>Competition</option>
            <option value="Certificate" <?php if ($row['act_type'] == 'Certificate') echo 'selected'; ?>>Certificate</option>
        </select>
    </td>
</tr>
<tr>
    <th><label for="act_level">Activity Level:</label></td> 
    <td>
        <select class="form-select" name="act_level" id="act_level" required>
            <option value="Faculty" <?php if ($row['act_level'] == 'Faculty') echo 'selected'; ?>>Faculty</option>
            <option value="University" <?php if ($row['act_level'] == 'University') echo 'selected'; ?>>University</option>
            <option value="National" <?php if ($row['act_level'] == 'National') echo 'selected'; ?>>National</option>
            <option value="International" <?php if ($row['act_level'] == 'International') echo 'selected'; ?>>International</option>
            <option value="Certificate" <?php if ($row['act_level'] == 'Certificate') echo 'selected'; ?>>Certificate</option>
        </select>
    </td>
</tr>
        <tr>
            <th><label for="remark">Remark:</label></td> 
            <td><input class="form-control" type="text" id="remark" name="remark" value="<?php echo $row['remark'];?>"></td>
        </tr>
        
    </table>
    <br>
    <div class="center-button">
        <button class="btn btn-success" type="submit">Save</button>
        <a class="btn btn-secondary" href="my_activities.php">Back</a>
    </div>
</form>
<script>
    // Function to update Activity Level dropdown
    function updateActLevel() {
        var actTypeDropdown = document.getElementsByName("act_type")[0];
        var actLevelDropdown = document.getElementsByName("act_level")[0];

        // If Certificate is selected in act_type, set act_level to Certificate and disable the dropdown
        if (actTypeDropdown.value === "Certificate") {
            actLevelDropdown.value = "Certificate";
            actLevelDropdown.disabled = true;
        } else {
            actLevelDropdown.value = ""; // Reset the value
            actLevelDropdown.disabled = false;
        }

        // If the Activity Type is not Certificate, disable the Certificate option in the Activity Level dropdown
        var certificateOption = actLevelDropdown.querySelector('option[value="Certificate"]');
        if (certificateOption) {
            certificateOption.disabled = (actTypeDropdown.value !== "Certificate");
        }
    }

    // Wait for the DOM to fully load, then call the function
    document.addEventListener("DOMContentLoaded", function() {
        // Trigger the function initially to set the initial state
        updateActLevel();

        // Add change event listener to act_type dropdown
        var actTypeDropdown = document.getElementsByName("act_type")[0];
        actTypeDropdown.addEventListener("change", function() {
            updateActLevel(); // Call the function when act_type is changed
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>