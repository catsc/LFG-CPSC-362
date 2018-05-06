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
<link rel="stylesheet" href="style.css">
</head>
<body>

<ul>
<li><a class="active" href="#home">Home</a></li>
<li><a href="#news">Bulletin Board</a></li>
<li><a href="#search">Find Group</a></li>
<li><a href="#Editgroup">Edit My Group</a></li>
<li><a href="#about">about</a></li>
<div class="dropdown">
<a href="#" class="dropbtn">User Name</a>
<div class="dropdown-content">
<a href="#">My Profile</a>
<a href="#">Edit My Profile</a>
<a href="#">Log out</a>
</div>
</div>
</ul>

<h1>About Us</h1>
<p>
We are a 6 people group called LFG 362, we are aim to solve your study problem.
</p>
</body>
</html>
