<?php
    session_start();
    //redirect to login page if not logged in yet
    if(!isset($_SESSION['u_id'])){
        header("Location: ./login.html?pleaseLogIn");
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>About Us</title>
<link rel="stylesheet" href="forum.css" type="text/css" />
<link rel="stylesheet" href="navigator.css" type="text/css" />
    </head>
    <body>

<header>
<h1> LOGO</h1>
</header>

        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="forum.php">Bulletin Board</a></li>
            <li><a href="FindSG.php">Find Group</a></li>
            <li><a href="#editGroup">Edit My Group</a></li>
            <li><a href="about.php">About</a></li>
            <div class="dropdown">
                <?php
                    $uid = $_SESSION['u_id'];
                    echo "<a href='profile.php' class='dropbtn'>$uid</a>";
                    ?>
                <div class="dropdown-content">
                    <a href="profile.php">My Profile</a>
                    <a href="#editProfile">Edit My Profile</a>
                    <a href="includes/logout.inc.php?signout=true">Log out</a>
                </div>
            </div>
        </ul>
        
        <h1>About Us</h1>
        <p>
        We are a 6 people group called LFG 362, we are aim to solve your study problem.
        </p>
    </body>
</html>