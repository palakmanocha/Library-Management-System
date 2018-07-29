<?php
  $user = $_POST['user'];
  $pass = $_POST['pass'];


  $db = mysqli_connect('localhost','root','prateek','Library_Management_System');
  $query = "SELECT Email, Username, Password FROM Student_Details";

  $result = mysqli_query($db, $query);
  if ($result = ) {
    echo $result[];
  }
  else {
    echo "123";
  }


  // if ($result['Username'] == $user || $result['Email'] == $user && $result['Password'] == $pass) {
  //   echo "
  //     <script>
  //       alert('$user + $pass');
  //     </script>
  //   ";
  // }
  // else {
  // }

 ?>
