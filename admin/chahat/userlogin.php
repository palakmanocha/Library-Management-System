<?php
  $username = $_POST['username'];
  $password = $_POST['password'];

  $db = mysqli_connect('localhost', 'root', 'root', 'Library_Management_System');
  $query = "SELECT * FROM Student_Details where Username='$username' && Password ='$password'";

  $result = mysqli_query($db, $query);

  if ($result) {
    if (mysqli_num_rows($result)) {
      // header('location : stud_dashboard.php');

      echo "login succesfull\n";
      $row=mysqli_fetch_assoc($result);
      printf ("%s %s \n",$row["Name"],$row["RollNo"]);
       mysqli_free_result($result);
    }


  else {
    echo "<script>alert('Enter valid username & password');</script>";
    // header('location : userlogin.html');
  }
}





 // if ($conn->connect_error) die($conn->connect_error);
 // $username = $_POST['username'];
 // $password = $_POST['password'];
 // $query = "SELECT * FROM Student_Details where Username='$username' && Password ='$password'";
 // $result = $conn->query($query);
 // if (!$result) die($conn->error);
 // $rows = $result->num_rows;
 // for ($j = 0 ; $j < $rows ; ++$j)
 // {
 // $result->data_seek($j);
 // echo 'NAME: ' . $result->fetch_assoc()['name'] . '<br>';
 // $result->data_seek($j);
 // echo 'RollNo: ' . $result->fetch_assoc()['roll_no'] . '<br>';
 // $result->data_seek($j);
 // echo 'Branch: ' . $result->fetch_assoc()['branch'] . '<br>';
 // $result->data_seek($j);
 // echo 'Year: ' . $result->fetch_assoc()['year'] . '<br>';
 // $result->data_seek($j);
 // echo 'MOBILE NO: ' . $result->fetch_assoc()['mob'] . '<br>';
 // $result->data_seek($j);
 // echo 'DOB: ' . $result->fetch_assoc()['dob'] . '<br>';
 // }
 // $result->close();
 // $conn->close();


?>
