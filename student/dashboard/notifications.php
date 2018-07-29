<?php
session_start();
if(isset($_GET['notifications'])){
  $db = mysqli_connect('localhost','root','palak','Library_Management_System');
  $sql ="UPDATE Student_Details SET Notifications = ".$_GET['notifications']." WHERE Username = '".$_SESSION['user']."'  ";
  $result = mysqli_query($db,$sql);
  if($result){
    echo "
      <script>
        alert('Preference updated');
        window.location.href='.';
      </script>";
  }
  else{
    echo "
      <script>
        alert('Unable to Update Preference ');
        window.location.href='.';
      </script>";
  }
}

 ?>
