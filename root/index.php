<?php
 session_start();
 //redirect to login page if not logged in yet
 if(!isset($_SESSION['u_id'])){
  header("Location: ./login.html?please_log_in");
  exit();
 }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Made with Thimble</title>
    <link rel="stylesheet" href="style.css">
    <style>
      .dropdown {
        position: relative;
        display: inline-block;
        float:right;
      }
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 50px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
      }
      .dropdown:hover .dropdown-content {
        display: block;
      }
    </style>
  </head>
  <body>
    <header>
      <h1> logo</h1>
    </header>
    <!--
<div class="dropdown">
      <?php
        $uid = $_SESSION['u_id'];
        echo "<span>$uid</span>";
      ?>
      
      <div class="dropdown-content">
        <a href="profile.php">My Profile</a>
        <p>My Group</p>
        <a href="includes/logout.inc.php?signout=true">Sign Out</a>
      </div>
    </div>

    -->
    

    <!--Copy this into index, create, find, forum, and maybe profile-->
<ul>
    <li><a class="active" href="index.php">Home</a></li>
    <li><a href="forum.php">Bulletin Board</a></li>
    <li><a href="FindSG.php">Find Group</a></li>
    <li><a href="#editGroup">Edit My Group</a></li>
    <li><a href="#about">About</a></li>
    <div style="float:right" class="dropdown">
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

    <main>
      <form>
        <input type="button" value="Find Study Group" onclick="window.location.href='FindSG.php'" />
        
        
        <input type="button" value="Create Study Group" onclick="window.location.href='Create.php'" />
        
        <input type="button" value="View Forum" onclick="window.location.href='forum.php'" />
      
      
      </form>
    
    
    </main>
  </body>
</html>