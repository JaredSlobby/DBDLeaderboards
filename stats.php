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
    // Display the data
    while ($row = $result->fetch_assoc()) 
    {
        echo 'Steam ID: ' . $row['SteamId'] . '<br>';
        echo 'Total Blood Points Earned: ' . $row['TotalBloodPoints'] . '<br>';
        echo 'Highest Prestige: ' . $row['MaxPrestige'] . '<br>';
        echo '<br>';
    }
} 
else 
{
    include ('steamapi.php');
    
    
}
// Primary key value of the record
 // Replace with the actual primary key value you want to find the position for

// Get the position of the record
$sql = "SELECT SteamId,
(SELECT COUNT(*) FROM (SELECT SteamId, TotalBloodPoints FROM leaderboards ORDER BY TotalBloodPoints DESC) AS t2 WHERE t2.TotalBloodPoints >= t1.TotalBloodPoints) AS TotalBloodPointsPosition,
(SELECT COUNT(*) FROM (SELECT SteamId, MaxPrestige FROM leaderboards ORDER BY MaxPrestige DESC) AS t3 WHERE t3.MaxPrestige >= t1.MaxPrestige) AS MaxPrestigePosition,
(SELECT COUNT(*) FROM (SELECT SteamId, FullLoadoutSurvivor FROM leaderboards ORDER BY FullLoadoutSurvivor DESC) AS t4 WHERE t4.FullLoadoutSurvivor >= t1.FullLoadoutSurvivor) AS FullLoadoutSurvivorPosition,
(SELECT COUNT(*) FROM (SELECT SteamId, FullLoadoutKiller FROM leaderboards ORDER BY FullLoadoutKiller DESC) AS t5 WHERE t5.FullLoadoutKiller >= t1.FullLoadoutKiller) AS FullLoadoutKillerPosition,
(SELECT COUNT(*) FROM (SELECT SteamId, UltraRareAddonsSurvivor FROM leaderboards ORDER BY UltraRareAddonsSurvivor DESC) AS t6 WHERE t6.UltraRareAddonsSurvivor >= t1.UltraRareAddonsSurvivor) AS UltraRareAddonsSurvivorPosition,
(SELECT COUNT(*) FROM (SELECT SteamId, UltraRareAddonsKiller FROM leaderboards ORDER BY UltraRareAddonsKiller DESC) AS t7 WHERE t7.UltraRareAddonsKiller >= t1.UltraRareAddonsKiller) AS UltraRareAddonsKillerPosition
FROM leaderboards AS t1
WHERE SteamId = '$steamID'";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();

    // Display the positions for the specific SteamId
    echo "SteamId: " . $row['SteamId'] . "<br>";
    echo "TotalBloodPoints Position: " . $row['TotalBloodPointsPosition'] . "<br>";
    echo "MaxPrestige Position: " . $row['MaxPrestigePosition'] . "<br>";
    echo "FullLoadoutSurvivor Position: " . $row['FullLoadoutSurvivorPosition'] . "<br>";
    echo "FullLoadoutKiller Position: " . $row['FullLoadoutKillerPosition'] . "<br>";
    echo "UltraRareAddonsSurvivor Position: " . $row['UltraRareAddonsSurvivorPosition'] . "<br>";
    echo "UltraRareAddonsKiller Position: " . $row['UltraRareAddonsKillerPosition'] . "<br>";
} 
else 
{
    echo 'No records found.';
}

$result->close();
$conn->close();

?>