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

  $sql2 = "INSERT INTO Books_Bought VALUES ('".$b_Id."', '".date_format($cur_date,'Y-m-d')."' ,  '".$book['Title']."', '".$book['Author']."', '".$stud['Name']."', '".$stud[Roll_No]."', '".$stud['Email']."', '".$stud['Username']."')";

  if(mysqli_query($db,$sql2))
  {
    $av = $book['Available']-1;
    $sql3 = "UPDATE Book_Details SET Available = ".$av."  WHERE Book_Id = '$b_Id'";
    if(mysqli_query($db,$sql3)){
      echo "
      <script>
        window.location.href='index.php';
        alert('Book has been Bought Successfully!  Go to https://www.onlinesbi.com/sbicollect/icollecthome.htm and pay Rs.".$book['Price']."');
      </script>";
    }
  }

}
else {
    echo "
    <script>
      alert('Book not Bought!');
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
