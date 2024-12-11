<?php
include('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $i_sem = mysqli_real_escape_string($conn, $_POST['sem']);
    $i_year = mysqli_real_escape_string($conn, $_POST['year']);
    $cgp = mysqli_real_escape_string($conn, $_POST['cgp']);
    $leadership = mysqli_real_escape_string($conn, $_POST['leadership']);
    $graduate_aim = mysqli_real_escape_string($conn, $_POST['graduate_aim']);
    $matricNo = $_SESSION['matricNo'];

    // Check if the student exists
    $checkStudentQuery = "SELECT * FROM register WHERE matricNo = '$matricNo'";
    $checkStudentResult = mysqli_query($conn, $checkStudentQuery);

    if (mysqli_num_rows($checkStudentResult) == 0) {
        // Student does not exist, handle the error
        echo "<script type='text/javascript'>
              alert('Invalid student ID.');
              window.location.href = 'add_kpi.php'; // Redirect to indicator_form page
            </script>";
    } else {
        // Student exists, check if a record with the same matricNo, i_sem, and i_year already exists
        $checkDuplicateQuery = "SELECT * FROM indicators WHERE matricNo = '$matricNo' AND i_sem = '$i_sem' AND i_year = '$i_year'";
        $checkDuplicateResult = mysqli_query($conn, $checkDuplicateQuery);

        if (mysqli_num_rows($checkDuplicateResult) > 0) {
            // Duplicate record found, handle the error
            echo "<script type='text/javascript'>
                  alert('A record with the same semester and year already exists.');
                  window.location.href = 'add_kpi.php'; // Redirect to indicator_form page
                </script>";
        } else {
            // No duplicate record found, proceed with the insert
            $sql = "INSERT INTO indicators (i_id, matricNo, i_sem, i_year, CGP, leadership, graduate_aim)
                    VALUES (NULL, '$matricNo', '$i_sem', '$i_year', '$cgp', '$leadership', '$graduate_aim')";

            // Execute the SQL query and handle errors
            if (mysqli_query($conn, $sql)) {
                header("Location: my_kpi.php"); // Redirect to indicator page
                exit(); // Terminate the script after redirection
            } else {
                echo "Error inserting data: " . mysqli_error($conn);
            }
        }
    }
}

mysqli_close($conn);
?>
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
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css_inv1/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web">
  <title>Activities Form</title>
</head>
<body class="d-flex flex-column min-vh-100 justify-content-center align-items-center">

  <main>
    <h1>Indicator Form</h1>
    
    <form method="post" action="" enctype="multipart/form-data">
    <table width="90%">
    <tr>
      <th><label for="sem">Sem:</label></td>
      <td>
        <select class="form-select" name="sem" id="sem">
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
      </td>
    </tr>

    <tr>
      <th><label for="year">Year:</label></td>
      <td>
        <select class="form-select" name="year" id="year" required>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </td>
    </tr>

    <tr>
      <th><label for="cgp">CGPA:</label></td>
      <td><input type="number" class="form-control" step="0.01" min="0" max="4" id="cgp" name="cgp" placeholder="CGP" required></td>
    </tr>

    <tr>
      <th><label for="leadership">Leadership:</label></td>
      <td><input type="number" class="form-control" id="leadership" name="leadership" min="0" required></td>
    </tr>

    <tr>
      <th><label for="graduate_aim">Graduate Aim:</label></td>
      <td>
        <select class="form-select" name="graduate_aim" id="graduate_aim" required>
          <option value="On Time">On Time</option>
          <option value="Postpone">Postpone</option>
        </select>
      </td>
    </tr>
    
    </table></br>
    <div class="center-button">
        <button class="btn btn-success" type="submit">Save</button>
        <a class="btn btn-secondary" href="my_kpi.php">Back</a>
    </div>
  </form>
<br>


  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>