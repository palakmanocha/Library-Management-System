<?php
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  $db = mysqli_connect('localhost','root','palak','Library_Management_System');
  $sql = "SELECT Username FROM Admin_Details WHERE (Email = '$user' OR Username = '$user') AND Password = '$pass'";

  $result = mysqli_query($db, $sql);

  session_start();

  if (mysqli_num_rows($result)>0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user'] = $row['Username'];
    header('location: chahat/admem.php');
  }
  else {
    session_destroy();
    echo "
      <script>
      window.location.href = '.';
      alert('Enter Valid Credentials ! $sql');
      </script>
    ";
  }

?>
