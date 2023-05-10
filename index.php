<?php  
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Menu Demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <a href="#" class="logo">DBD Leaderboards</a>
        <nav>           
            <ul>
                <li><a href="#" style="vertical-align:middle">Top 100</a></li>
                <li><a href="#" style="vertical-align:middle">About Us</a></li>
                <li><a href="#" style="vertical-align:middle">FAQ</a></li>
                <li><a href="#" style="vertical-align:middle">Blog</a></li>
                <div class="dropdown">
                    <?php 
                    //Check if session variable exists
                    if(!isset($_SESSION['logged_in']) || empty($_SESSION['logged_in']))
                    {
                        ?>
                                <a href="init-openid.php"><img src="Images/Steam.png" style="vertical-align:middle"></a>
                                </button>                            
                                <?php
                    }
                    else
                    {               
                            if($_SESSION['logged_in'] == false)
                            {
                                ?>
                                <a href="init-openid.php"><img src="Images/Steam.png" style="vertical-align:middle"></a>
                                </button>
                                <?php
                                
                            }
                            else if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in']))
                            {
                                ?>
                                <button class="dropbtn" onclick="myFunction()"><img class="circular--square" style="vertical-align:middle" src="<?php echo $_SESSION['userData']['avatar'] ?>"/><?php echo $_SESSION['userData']['name'] ?><i class="fa fa-caret-down"></i>
                                </button>
                                <div class="dropdown-content" id="myDropdown">
                                    <a href="stats.php">Profile</a>
                                    <a href="#">Settings</a>
                                    <a href="logout.php">Sign out</a>
                                </div>
                                <?php

                            }
                    }
                            ?>
                
                
            </ul>
        </nav>
    </header>

<?php 
include ('leaderboard.php');
?>


    <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() 
{
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) 
  {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) 
    {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
</body>
</html>
<?php

