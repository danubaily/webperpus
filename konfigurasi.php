<?php
$servername="localhost";
$username="root";
$password="akutahu";
$db="perpustakaan";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>