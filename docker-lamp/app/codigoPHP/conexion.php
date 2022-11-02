<?php
$servername = "db";
$username = "admin";
$password = "test";
$dbName= "database";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbName);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
