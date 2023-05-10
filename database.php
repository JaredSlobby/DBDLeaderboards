<?php
//Connect 
$servername = "XXXXXXXX";
$username = "XXXXXXXX";
$password = "XXXXXXXX"; 
$database = "XXXXXXXX";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
?>
