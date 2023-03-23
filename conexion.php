<?php
// Database credentials
  // connect to the database
  $servername = "localhost";
  $username = "Root";
  $password = "";
  $dbname = "gestion médiathèque";
  $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
