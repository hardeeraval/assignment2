<?php
$servername = "localhost"; 
$username = "root"; 
$password = "Canada2611@"; 
$dbname = "my_new_database"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
