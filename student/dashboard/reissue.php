<?php
session_start();
$b_Id = $_GET['Book_Id'];
if($b_Id)
{
  $db = mysqli_connect('localhost','root','palak','Library_Management_System');
  $cur_date = date_create(date('Y-m-d'));
  $due_date = date_create(date('Y-m-d'));
  date_add($due_date,date_interval_create_from_date_string("15 days"));

    $sql = "UPDATE Books_Issued SET Due_Date = '".date_format($due_date,'Y-m-d')."'  WHERE Book_Id = '$b_Id' AND Username = '".$_SESSION['user']."'";
    if(mysqli_query($db,$sql)){
      echo "
      <script>
        alert('Book has been Re-Issued Succesfully!');
        window.location.href='index.php';
      </script>";

    }

else {
    echo "
    <script>
      alert('Book not Re-Issued!');
      window.location.href='index.php';
    </script>";
}
}
else{
  echo "
  <script>
    window.location.href='index.php';
  </script>";
}
?>
