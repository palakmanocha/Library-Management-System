<?php
session_start();
$b_Id = $_GET['Book_Id'];
if($b_Id)
{
$db = mysqli_connect('localhost','root','palak','Library_Management_System');
$sql = "SELECT * FROM Student_Details WHERE Username ='".$_SESSION['user']."'";
$result = mysqli_query($db,$sql);

$sql1 = "SELECT * FROM Book_Details WHERE Book_Id='$b_Id'";
$result1 = mysqli_query($db,$sql1);

if($result && $result1)
{
  $stud = mysqli_fetch_assoc($result);
  $book = mysqli_fetch_assoc($result1);

  $cur_date = date_create(date('Y-m-d'));
  $due_date = date_create(date('Y-m-d'));

  date_add($due_date,date_interval_create_from_date_string("15 days"));

  $sql2 = "INSERT INTO Books_Issued VALUES ('".$b_Id."', '".date_format($cur_date,'Y-m-d')."' , '".date_format($due_date,'Y-m-d')."' , '".$book['Title']."', '".$book['Author']."', '".$stud['Name']."', '".$stud[RollNo]."', '".$stud['Email']."', '".$stud['Username']."')";

  if(mysqli_query($db,$sql2))
  {
    $av = $book['Available']-1;
    $sql3 = "UPDATE Book_Details SET Available = ".$av."  WHERE Book_Id = '$b_Id'";
    if(mysqli_query($db,$sql3)){
      echo "
      <script>
        alert('Book has been Issued Succesfully!');
        window.location.href='index.php';
      </script>";
    }
  }

}
else {
    echo "
    <script>
      alert('Book not Issued!');
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
