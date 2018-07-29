<?php
if (isset($_POST['submit']))
{
  $name = $_POST['name'];
  $roll_no = $_POST['roll_no'];
  $branch = $_POST['branch'];
  $year = $_POST['year'];
  $mob = $_POST['mob'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $user= $_POST['user'];
  $pass= $_POST['pass'];

  // PHP Validations

  $valid = TRUE;
  if (empty($name) || empty($roll_no) || empty($branch) || empty($year) || empty($mob) || empty($email) || empty($dob) || empty($user) || empty($pass)) {
    echo "<script>alert('All Fields are mandatory.');</script>";
  }
  else
  {
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $valid = FALSE;
      $msg = "invalid username";
    }
    if(!preg_match("/^[0-9a-zA-Z]*$/",$pass)){
      $valid = FALSE;
      $msg = "invalid password";

    }
    if(strlen($pass)<8 || strlen($pass)>16){
      $valid = FALSE;
      $msg = "invalid password length";

    }
    if(strlen($user) > 20){
      $valid=FALSE;
      $msg = "invalid user length";

    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $valid = FALSE;
      $msg = "invalid email";

    }
    if (!filter_var($mob, FILTER_VALIDATE_INT)) {
      $valid = FALSE;
      $msg = "invalid mobile number";

    }
    if ($valid)
    {
      $target_dir = "../uploads/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              echo '<script>alert("File is an image - " . $check["mime"] . ".");</script>';
              $uploadOk = 1;
          } else {
              echo "<script>alert('File is not an image.');";
              $uploadOk = 0;
          }
      }

      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
          $uploadOk = 0;
      }

      if ($uploadOk == 0) {
          echo "<script>alert('Sorry, your file was not uploaded.');</script>";

      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
          {
            echo "<script>alert('The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.');</script>";
            $db = mysqli_connect('localhost','root','palak','Library_Management_System');
            $sql = "INSERT INTO Student_Details (Name, RollNo, Branch, Year, Mobile, Email, DOB, Username, Password, Profile_Pic) VALUES ('$name', '$roll_no', '$branch', '$year', $mob, '$email', '$dob', '$user','$pass','$target_file')";

            if (mysqli_query($db, $sql)) {
              echo "
              <script>
              window.location.href = 'index.php';
              alert('You are Registered successfully');
              </script>
              ";
            }
            else{
              unlink($target_file);
              echo "
              <script>
              window.location.href = 'index.php';
              alert('Registration unsuccessful');
              </script>
              ";
            }
          }
          else {
              echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
          }
      }

    }
    else {
      echo "
      <script>alert('Enter Valid Inputs $msg');</script>
      ";
    }

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
    <link rel="stylesheet" href="userreg.css">
    <link rel="icon" href="../images/s-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Student | Register</title>
    <script type="text/javascript">

      function PreviewImage() {
          var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

          oFReader.onload = function (oFREvent) {
              document.getElementById("uploadPreview").src = oFREvent.target.result;
          };
      };

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
        <a href="../index.html"><img class="home" src="../images/home-logo.png" alt=""></a>
      </div>
    </nav>
    <img src="../images/book7.jpeg" class="bg-div">
    <div class="main">
      <img class="user" src="../images/final.png" alt="">
      <h1>Register Here</h1>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post"> <!-- reg.php -->

        <label for="name">Name</label>
        <input id="nm" type="text"  name="name">

        <label for="roll_no">Roll Number</label>
        <input id="num" type="text"  name="roll_no">

        <label for="branch">Branch</label>
        <select name="branch">
          <option class="options" value="">Select</option>
          <option class="options" value="CSE">Computer Science</option>
          <option class="options" value="IT">Information Technology</option>
          <option class="options" value="ECE">Electronics & Communication</option>
          <option class="options" value="EEE">Electrical & Electronics</option>
          <option class="options" value="CSE">Mechanical</option>
          <option class="options" value="BioTech">Bio-Technology</option>
        </select>

        <label for="year">Year</label>
        <select name="year">
          <option class="options" value="">Select</option>
          <option class="options" value="1">First</option>
          <option class="options" value="2">Second</option>
          <option class="options" value="3">Third</option>
          <option class="options" value="4">Fourth</option>
        </select>

        <label for="mob">Mobile No.</label>
        <input id="mb" type="number" name="mob">

        <label for="email">Email</label>
        <input id="email" type="email" name="email">

        <label for="dob">Date Of Birth</label>
        <input id="db" type="date" name="dob">

        <label for="user">Username</label>
        <input id="user" type="text" name="user">

        <p id="use" style="display:none;">
          Username should contain atmost 20 characters
        </p><br>

        <label for="pass">Password</label>
        <input id="pass" type="password" name="pass">

        <p id="message" style="display:none;">
          Password with  8 to 16 characters and one digit.
        </p>

        <div style="height:160px; width:155px;outline:1px solid; margin-top:2vh;margin-bottom:2vh;" class="display">
          <img height="100%" width="100%" id="uploadPreview" src="" alt="">
        </div>
        <input id="uploadImage" onchange="PreviewImage();" type="file" name="fileToUpload">

        <button name="submit" type="submit" >Register</button>
      </form>
      <span class="a">Already have an Account? </span><a href="index.php">login Here </a>
    </div>
    <script type="text/javascript">

      var passw = document.getElementById('pass');
      passw.onfocus =function() {
        document.getElementById("message").style.display = "block";
      }
      passw.onblur =function() {
        document.getElementById("message").style.display = "none";
      }
      passw.onkeyup=function(){

        var j = document.getElementById('pass').value.length;
        var num = /[0-9]/g;
        var d = document.getElementById('pass').value.match(num);

      if(d==null || j<8 || j>20)
      {
        var m = document.getElementById('message');
        m.classList.add("invalid");
      }
      else {
        var m = document.getElementById('message');
        m.classList.remove("invalid");
        m.classList.add("valid");
      }
     }
     var usern = document.getElementById('user');
     usern.onfocus=function(){
       document.getElementById('use').style.display="block";
     }
     usern.onblur=function(){
       document.getElementById('use').style.display="none";
     }

     usern.onkeyup=function(){
     var n= usern.value.length;
     if(n>20)
     {
       document.getElementById('use').classList.add('invalid');
       document.getElementById('use').classList.remove('valid');
     }
     else {
       document.getElementById('use').classList.add('valid');
       document.getElementById('use').classList.remove('invalid');
     }
    }
    </script>
  </body>
</html>
