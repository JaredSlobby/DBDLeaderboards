<?php
//Connect 
$servername = "localhost";
$username = "root";
$password = "Sharkies#2511"; 
$database = "DBD";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
?>