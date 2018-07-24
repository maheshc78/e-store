<?php
$servername = "localhost";
$username = "id1557656_mahesh";
$password = "mahesh";
$db = "id1557656_estore";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection	
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); 
}
?>