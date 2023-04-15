<?php
  $servername = "Your server name, Example : `localhost`";
  $dbname = "The name of your database";
  $username = "username";
  $password = "A secure password";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

?>