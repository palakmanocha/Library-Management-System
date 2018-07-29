<?php
  $name = $_POST['name'];
  $degn = $_POST['dgn'];
  $email = $_POST['email'];
  $mobile = $_POST['mob'];
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  $db = mysqli_connect('localhost','root','palak','Library_Management_System');

  $sql = "INSERT INTO Admin_Details (Name, Designation, Email, Mobile, Username, Password) VALUES ('$name', '$degn', '$email', '$mobile', '$user','$pass')";

  if (mysqli_query($db, $sql)) {
    echo "
      <script>
        window.location.href = 'add_member.html';
        alert('Member Added Succesfully');
      </script>
    ";
  }
  else{
    echo "
      <script>
        window.location.href = 'add_member.html';
        alert('Member not registered');
      </script>
    ";
  }

?>
