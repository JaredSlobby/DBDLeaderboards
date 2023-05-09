<?php  
    session_start();
    include ('database.php');
    $steamID = $_SESSION['userData']['steam_id'];

    $sql = "SELECT * FROM leaderboards WHERE SteamId = '$steamID'";
    $result = $conn->query($sql);

if (!$result) 
{
    die("Error: " . $conn->error);
}

if ($result->num_rows > 0) 
{
    // Record exists, exit to index.php
    $redirect_url = "index.php";
    header("Location: $redirect_url"); 
    exit();
} 
else 
{
    include ('steamapi.php');
    
    
}

$result->close();
$conn->close();

?>