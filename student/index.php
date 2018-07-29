<?php
session_start();

if(isset($_SESSION['user']))
{
  header('location:dashboard/');
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="../adminlogin.css">
    <link rel="icon" href="../images/s-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Student | Login</title>
  </head>
  <body>
    <nav class="nav-bar">
      <div class="nav1">
        <img class="logo" height="80%" src="../images/logo.png" alt="logo">
        <p class="logo-text">
          Library<br>Management<br>System
        </p>
      </div>
      <div class="nav2">
        <a href="../index.html"> <img class="home" src="../images/home-logo.png" alt="Home"> </a>
      </div>
    </nav>
    <img src="../images/book7.jpeg" class="bg-div">
    <div class="main">
      <img class="user" src="../images/final.png" alt="">
      <h1>Login Here</h1>
      <form action="stud_login.php" method="post">
        <label for="">Username or Email</label>
        <input type="text" name="user">

        <label for="pass">Password</label><br>
        <input type="password" name="pass">

        <button type="submit" name="button">Login</button>
      </form>
      <a class="a" href="forgot.php">Forgot Password?</a><br><br>
      <span class="a">Don't have an Account? </span><a href="userreg.php">Register Here </a>
    </div>
  </body>
</html>
