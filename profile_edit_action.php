<?php
include("config.php");
session_start();

$stuName = mysqli_real_escape_string($conn, $_POST['stuName']);
$matricNo = mysqli_real_escape_string($conn, $_POST['matricNo']);
$program = mysqli_real_escape_string($conn, $_POST['program']);
$stuEmail = mysqli_real_escape_string($conn, $_POST['stuEmail']);
$intakeBatch = mysqli_real_escape_string($conn, $_POST['intakeBatch']);
$mentorName = mysqli_real_escape_string($conn, $_POST['mentorName']);
$state = mysqli_real_escape_string($conn, $_POST['state']);
$phoneNo =mysqli_real_escape_string($conn, $_POST['phoneNo']);
$profilePic = mysqli_real_escape_string($conn, $_POST['profilePic']);
$studyMotto = mysqli_real_escape_string($conn, $_POST['studyMotto']);

$target_dir = "profile_pic/";
$target_file = "";
$uploadOk = 1; // Initialize to 1
$imageFileType = "";
$uploadfileName = "";

$matricNo = $_SESSION['matricNo'];

$filetmp = $_FILES["fileToUpload"];

// Check if there is an image to be uploaded
if ($filetmp["name"] != "") {
    $uploadfileName = basename($filetmp["name"]);
    $target_file = $target_dir . $uploadfileName;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo '<script>';
        echo 'alert("ERROR: Sorry, the image file ' . $uploadfileName . ' already exists.");';
        echo 'window.location.href = "profile_edit.php";';
        echo '</script>';

        $uploadOk = 0;
    }

    if ($filetmp["size"] > 5000000) {
        echo '<script>';
        echo 'alert("ERROR: Sorry, your file is too large. Try resizing your image.");';
        echo 'window.location.href = "profile_edit.php";';
        echo '</script>';
        $uploadOk = 0;
    }

    // Allow only these file formats
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo '<script>';
        echo 'alert("ERROR: Sorry, only JPG, JPEG, PNG & GIF files are allowed.");';
        echo 'window.location.href = "profile_edit.php";';
        echo '</script>';
        $uploadOk = 0;
    }

    // If $uploadOk is still 1, move the file to the target directory
    if ($uploadOk) {
        if (move_uploaded_file($filetmp["tmp_name"], $target_file)) {
            // Update database only if the file is successfully moved
            $sql = "UPDATE register
                    SET stuName = '$stuName',
                        program = '$program',
                        stuEmail = '$stuEmail',
                        intakeBatch = '$intakeBatch',
                        mentorName = '$mentorName',
                        state = '$state',
                        phoneNo = '$phoneNo',
                        profilePic = '$uploadfileName',
                        studyMotto = '$studyMotto'
                    WHERE matricNo = '$matricNo'";

            if (mysqli_query($conn, $sql)) {
                header("Location: index.php"); // Redirect to a welcome page
            } else {
                echo '<script>';
                echo 'alert("Error updating user information: ' . mysqli_error($conn) . '");';
                echo 'window.location.href = "profile_edit.php";';
                echo '</script>';
            }
        } else {
            echo '<script>';
            echo 'alert("ERROR: There was an error uploading your file.");';
            echo 'window.location.href = "profile_edit.php";';
            echo '</script>';
        }
    }
} else {
    // No image to upload, update other fields only
    $sql = "UPDATE register
            SET stuName = '$stuName',
                program = '$program',
                stuEmail = '$stuEmail',
                intakeBatch = '$intakeBatch',
                mentorName = '$mentorName',
                state = '$state',
                phoneNo = '$phoneNo',
                studyMotto = '$studyMotto'
            WHERE matricNo = '$matricNo'";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo '<script>';
        echo 'alert("Error updating user information: ' . mysqli_error($conn) . '");';
        echo 'window.location.href = "profile_edit.php";';
        echo '</script>';
    }
    
}

mysqli_close($conn);
?>
