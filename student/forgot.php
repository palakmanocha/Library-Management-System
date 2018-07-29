<?php
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
session_start();

if(isset($_SESSION['user']))
{
  header('location:dashboard/');
}
$db = mysqli_connect('localhost','root','palak','Library_Management_System');

if ($_REQUEST['email']) {

  $sql = "SELECT Email, Mobile FROM Student_Details WHERE Email = '".$_REQUEST['email']."'";
  $result = mysqli_query($db, $sql);

  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result)>0) {
    $to = $row['Email'];
    $mobile = $row['Mobile'];

    $_SESSION['email'] = $to;
    $_SESSION['otp'] = rand(100000,999999);

    $sms = "One Time Password for your account $to is ".$_SESSION['otp']." .              UIET Library";

    require '../PHPMailerAutoload.php';
    require '../../credentials.php';
    include('../way2sms-api.php');

    // Email

    $mail = new PHPMailer;

    $mail->SMTPDebug = 3;

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = EMAIL;
    $mail->Password = PASS;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom(EMAIL, 'UIET Library');
    $mail->addAddress($to);

    $mail->isHTML(true);

    $mail->Subject = 'One Time Password' ;
    $mail->Body = "<div style='color:black;'>One Time Password to reset your account password <i> $to </i> is ".$_SESSION['otp']." .<br><br><hr>This is an auto generated email | Please don\'t reply <br> <b>Copyright © 2018, UIET Library</b></div>";
    $mail->send();

    // sms
    sendWay2SMS('9671704351' , 'prateek' ,$mobile , $sms);

    echo "
      <script>
        $(document).ready(function(){
          document.getElementById('email').style.display = 'none';
          document.getElementById('otp').style.display = 'block';
          document.getElementById('pass').style.display = 'none';
          document.getElementById('button').innerText = 'Proceed';
        });
      </script>
    ";
  }
  else {
    echo "
      <script>
        alert('Email address you have entered is not registered with us.');
      </script>
    ";
  }

}

if ($_REQUEST['otp']) {
  $otp1 = $_REQUEST['otp'];
  if ($otp1 == $_SESSION['otp']) {
    echo "
      <script>
        $(document).ready(function(){
          document.getElementById('email').style.display = 'none';
          document.getElementById('otp').style.display = 'none';
          document.getElementById('pass').style.display = 'block';
          document.getElementById('button').innerText = 'Confirm';
        });
      </script>
    ";
  }
  else {
    echo "
      <script>
        alert('OTP you have entered is incorrect.');
      </script>
    ";
  }

}
if ($_REQUEST['pass']) {
  $pass = $_REQUEST['pass'];
  $sql = "UPDATE Student_Details SET Password = '$pass' WHERE Email = '".$_SESSION['email']."' ";
  if (mysqli_query($db, $sql)) {
    session_destroy();
    echo "
      <script>
        alert('Password updated successfully.');
        window.location.href = '.';
      </script>
    ";
  }
  else {
    echo "
      <script>
        alert('Password updation failed.');
      </script>
    ";
  }
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
    <title>Forgot Password</title>
    <style>
      #otp{
        display: none;
      }
      #pass{
        display: none;
      }
    </style>
    <script type="text/javascript">


    </script>
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
      <h1>Forgot Password</h1>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div id="email">
          <label for="email">Email</label>
          <input type="text" name="email">
        </div>

        <div id="otp">
          <label for="otp">An OTP has been sent to your email address.</label>
          <input type="number" name="otp" placeholder="Enter OTP">

        </div>

        <div id="pass">
          <label for="pass">New Password</label><br>
          <input type="password" name="pass">
        </div>

        <button id="button" type="submit" name="button">Get OTP</button>
      </form>
      <a class="a" href=".">Back to login page</a><br><br>
    </div>
  </body>
</html>
