<?php
include('config.php');
session_start();
?>

<style>
    body {
        background: linear-gradient(135deg, hsla(208, 67%, 81%, 1) 0%, hsla(37, 65%, 85%, 1) 50%, hsla(301, 65%, 83%, 1) 100%);
}
table {
        margin-left: auto;
        margin-right: auto;
    }
     h1{
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
    <title>Edit Challenge</title>
</head>

<body class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <?php

$c_id = $_GET['c_id'];
$_SESSION['c_id'] = $c_id;
$sql = "SELECT * FROM challenges WHERE c_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $c_id);
$stmt->execute();
$result = $stmt->get_result();

        $row = mysqli_fetch_assoc($result);

    
    ?>

    <div style="padding:0 10px;" id="challengeDiv">
        <h1 align="center">Edit Challenge and Plan</h1>
        <p align="center">Required field with mark*</p>
        

        <form method="POST" action="my_challenge_edition.php" id="myForm" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Semester*</td>
                    <td >:</td>
                    <td>
                    <select class="form-select" size="1" name="sem" required>
                    <option value="1" <?php if ($row['sem'] == '1') echo 'selected'; ?>>1</option>
                    <option value="2" <?php if ($row['sem'] == '2') echo 'selected'; ?>>2</option>
                    </select>

                    </td>
                </tr>
                <tr>
                    <th>Year*</td>
                    <td>:</td>
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
                    <th>Challenge*</td>
                    <td>:</td>
                    <td>
                    <textarea class="form-select" rows="4" name="challenge" cols="20" required><?php echo $row['challenge']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Plan*</td>
                    <td>:</td>
                    <td>
                    <textarea class="form-select" rows="4" name="plan" cols="20" required><?php echo $row['plan']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Remark</td>
                    <td>:</td>
                    <td>
                    <textarea class="form-select" rows="4" name="remark" cols="20"><?php echo $row['remark']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="right">
                    <input class="btn btn-outline-secondary" type="button" value="Clear" name="B2" onclick="clearForm()">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <input class="btn btn-success" type="submit" value="Submit" name="B1">   
                        <a class="btn btn-secondary" href="my_challenges.php">Back</a>
                    </td>
                </tr>
                
            </table>
        </form>
    </div>

    <p></p>
    <footer>
        <p>Copyright (c) 2023 - My Name</p>
    </footer>

    <script>


        // clear form to empty the form for new data
        function clearForm() {
    var form = document.getElementById("myForm");
    if (form) {
        var inputs = form.getElementsByTagName("input");
        var textareas = form.getElementsByTagName("textarea");
        var selects = form.getElementsByTagName("select");

        // clear all inputs
        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].type !== "button" && inputs[i].type !== "submit" && inputs[i].type !== "reset") {
                inputs[i].value = "";
            }
        }

        // clear all textareas
        for (var i = 0; i < textareas.length; i++) {
            textareas[i].value = "";
        }

        // clear all selects
        for (var i = 0; i < selects.length; i++) {
            selects[i].selectedIndex = -1;
        }
    } else {
        console.error("Form not found");
    }
}

    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>