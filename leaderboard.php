<?php include ('database.php');

$sql = "SELECT * FROM Leaderboards ORDER BY TotalBloodPoints DESC";
$result = $conn->query($sql);

if (!$result) 
{
    die("Error: " . $conn->error);
}

if ($result->num_rows > 0) 
{
    echo "<table class='styled-table'>";
    echo "<thead>";
    echo "<tr><th>Rank</th><th>SteamId</th><th>TotalBloodPoints</th><th>MaxPrestige</th><th>FullLoadoutSurvivor</th><th>FullLoadoutKiller</th><th>UltraRareAddonsSurvivor</th><th>UltraRareAddonsKiller</th></tr>";
    echo "</thead>";
    $count = 1;
    while ($row = $result->fetch_assoc()) 
    {
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $count . "</td>";
        echo "<td>" . $row['SteamId'] . "</td>";
        echo "<td>" . $row['TotalBloodPoints'] . "</td>";
        echo "<td>" . $row['MaxPrestige'] . "</td>";
        echo "<td>" . $row['FullLoadoutSurvivor'] . "</td>";
        echo "<td>" . $row['FullLoadoutKiller'] . "</td>";
        echo "<td>" . $row['UltraRareAddonsSurvivor'] . "</td>";
        echo "<td>" . $row['UltraRareAddonsKiller'] . "</td>";  
        $count++;  
    }
    echo "</tbody>";
    echo "</table>";
} 
else 
{
    echo "No results found.";
}

$result->close();
$conn->close();
?>

<html>

<style> 
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
</style>

</html>