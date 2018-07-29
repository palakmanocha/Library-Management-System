<?php
session_start();
$db = mysqli_connect('localhost','root','palak','Library_Management_System');
$sql = "UPDATE Student_Details SET Username = '".$_POST['user']."', Password ='".$_POST['pass']."', DOB ='".$_POST['dob']."', Mobile=".$_POST['mob']." WHERE RollNo = '".$_SESSION['roll_no']."' ";
$sql1 = "UPDATE Books_Issued SET Username = '".$_POST['user']."' WHERE RollNo = '".$_SESSION['roll_no']."'"  ;

$result=mysqli_query($db,$sql);
$result1 = mysqli_query($db,$sql1);

$_SESSION['user'] = $_POST['user'];

if(mysqli_affected_rows($db)>=0){
  echo "
    <script>
      alert('Credentials Updated Succesfully');
      window.location.href='.';
    </script>
  ";

}
else{
  echo "
    <script>
      alert('Unsuccesfull Attempt');
      window.location.href='.';
    </script>
  ";
}





 ?>
