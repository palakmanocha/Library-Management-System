<?php

session_start();


   $RollNo= $_SESSION['rollno'];





$conn = mysqli_connect("localhost","root","palak","Library_Management_System");
   $sql = "delete from Student_Details where RollNo = '$RollNo';";
    $result = $conn -> query($sql);



    if($result == true)
    {
    	echo '<script language="javascript">';
    echo 'alert(" record deleted")';
       echo '</script>';







    }

    else
    {
    	echo "unsuccsessfully";
    }


    header('Location: admem.php');









 ?>
