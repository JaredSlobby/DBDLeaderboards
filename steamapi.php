<?php
        include ('database.php');
        $api_key = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
        $steamid = $_SESSION['userData']['steam_id'];
        $api_url = "https://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=381210&key=$api_key&steamid=$steamid";

        $profile_api_url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$api_key&steamids=$steamid";

        $json = json_decode(file_get_contents($api_url), true);
        $profile_json = json_decode(file_get_contents($profile_api_url), true);


        $steamAPI = $json["playerstats"]["stats"];
        $steamProfile = $profile_json["response"]["players"][0];

        
?>

