<?PHP
include('config.php');
//this action is called when the Delete link is clicked
if(isset($_GET["c_id"]) && $_GET["c_id"] != ""){
 $c_id = $_GET["c_id"];
 $sql = "DELETE FROM challenges WHERE c_id=" . $c_id;
 echo $sql . "<br>";
 if (mysqli_query($conn, $sql)) {
    echo '<script>';
    echo 'alert("Delete successful!");';
    echo 'window.location.href = "my_challenges.php";';
    echo '</script>';
    exit();
} else {
    echo '<script>';
    echo 'alert("Error deleting record: ' . mysqli_error($conn) . '<br>");';
    echo 'window.location.href = "my_challenges.php";';
    echo '</script>';
}

}
mysqli_close($conn);
?>