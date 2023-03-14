<?php
$servername="databases.000webhost.com";
$username="id20446924_skcbweb";
$password="Multimedia2023*";
$db="id20446924_latihan";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
