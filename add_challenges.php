<?php
// Include the database connection file
include 'config.php';
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare data
    $sem = $_POST["sem"];
    $year = $_POST["year"];
    $challenge = trim($_POST["challenge"]);
    $plan = trim($_POST["plan"]);
    $remark = trim($_POST["remark"]);
    $matricNo = $_SESSION['matricNo'];

    // Insert data into the 'challenges' table
    $sql = "INSERT INTO challenges (sem, year, challenge, plan, remark, matricNo) VALUES ('$sem', '$year', '$challenge', '$plan', '$remark','$matricNo')";

    if (mysqli_query($conn, $sql)) {
        echo '<p align="center">Data inserted successfully!</p>';

        // Redirect to my_challenge.php after successful insertion
        header("Location: my_challenges.php");
        exit(); // Make sure to exit after the header redirection
    } else {
        echo '<p align="center">Error: ' . mysqli_error($conn) . '</p>';
    }
}

// Close the database connection
mysqli_close($conn);
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
     h1{
        text-align: center;
    }
</style>

<head>
    <title>Add Challenge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css_inv1/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <h1>Insert Challenge</h1>
    <div style="padding:0 10px;" id="challengeDiv">

        <p align="center">Required field with mark*</p>

        <form method="POST" action="add_challenges.php" id="myForm">
            <table>
                <tr>
                    <th>Semester*</td>
                    <td width="1px">:</td>
                    <td>
                        <select class="form-select" size="1" name="sem" required>
                            <option value="">--Select--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Year*</td>
                    <td>:</td>
                    <td>
                    <select class="form-select" size="1" name="year" required>
                            <option value="">--Select--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </td>
                    </td>
                </tr>
                <tr>
                    <th>Challenge*</td>
                    <td>:</td>
                    <td>
                        <textarea class="form-control" rows="4" name="challenge" cols="20" required></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Plan*</td>
                    <td>:</td>
                    <td>
                        <textarea class="form-control" rows="4" name="plan" cols="20" required></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Remark</td>
                    <td>:</td>
                    <td>
                        <textarea class="form-control" rows="4" name="remark" cols="20"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="right">
                        <input class="btn btn-success" type="submit" value="Add" name="B1">
                        <a class="btn btn-secondary" href="my_challenges.php">Back</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

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