<?php
include('config.php');
session_start();
?>
<style>
    body {
        background: linear-gradient(135deg, hsla(208, 67%, 81%, 1) 0%, hsla(37, 65%, 85%, 1) 50%, hsla(301, 65%, 83%, 1) 100%);
}
</style>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
<style>
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
    <title>Edit Profile</title>
  </head>
  <body class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <?php
    $matricNo = $_SESSION['matricNo'];
    $sql = "SELECT * FROM register WHERE matricNo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $matricNo); // Assuming 'matricNo' is a string; adjust the type if needed
    $stmt->execute();
    $result = $stmt->get_result();

    $user = $result->fetch_assoc(); // Assuming one user per 'matricNo'
    ?>

    <h1>Edit Profile</h1>
    <form class="" action="profile_edit_action.php" method="post" enctype="multipart/form-data">
    <table width="90%">
        <tr>
            <th><label for="ProfilePic">Profile Picture:</label></td>
            <td><input type="file" class="form-control" name="fileToUpload" id="fileToUpload" accept=".jpg, .jpeg, .png">
        </tr>
        <tr>
            <th><label for="stuName">Name:</label></td> 
            <td><input type="text" class="form-control" id="stuName" name="stuName" value="<?php echo $user['stuName'];?>"></td>
        </tr>
        <tr>
            <th><label for="matricNo">Matric No:</label></td>
            <td><input type="text"  class="form-control" id="matricNo" name="matricNo" value="<?php echo $user['matricNo'];?>"disable readonly></td>
        </tr>
        <tr>
            <th><label for="stuEmail">Email:</label></td>
            <td><input type="text" class="form-control" id="stuEmail" name="stuEmail" value="<?php echo $user['stuEmail'];?>"></td>
        </tr>
        <tr>
            <th><label for="program">Program:</label></td>
            <td><input type="text" class="form-control" id="program" name="program" value="<?php echo $user['program'];?>"></td>
        </tr>
        <tr>
            <th><label for="state">State of Origin:</label></td>
            <td><input type="text" class="form-control" id="state" name="state" value="<?php echo $user['state'];?>"></td>
        </tr>
        <tr>
            <th><label for="intakeBatch">Intake Batch:</label></td>
            <td><input type="text" class="form-control" id="intakeBatch" name="intakeBatch" value="<?php echo $user['intakeBatch'];?>"></td>
        </tr>
        <tr>
            <th><label for="phoneNo">Phone:</label></td>
            <td><input type="text" class="form-control" id="phoneNo" name="phoneNo" value="<?php echo $user['phoneNo'];?>"></td>
        </tr>
        <tr>
            <th><label for="mentorName">Mentor Name:</label></td>
            <td><input type="text" class="form-control" id="mentorName" name="mentorName" value="<?php echo $user['mentorName'];?>"></td>
        </tr>
        <tr>
            <th><label for="studyMotto">Study Motto:</label></td>
            <td><input type="text" class="form-control" id="studyMotto" name="studyMotto" value="<?php echo $user['studyMotto'];?>"></td>
        </tr>
    </table>
    <br>
    <div class="center-button">
        <button class="btn btn-success" type="submit">Save</button>
        <a class="btn btn-secondary" href="index.php">Back</a>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>