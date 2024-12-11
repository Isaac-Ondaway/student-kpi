<?php
/**
 * using mysqli_connect for database connection
 */
$databaseHost = 'localhost';
$databaseUsername = 'root';//
$databasePassword = '';//example pwd
$databaseName = 'inv1';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
?>