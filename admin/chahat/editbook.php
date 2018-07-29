<?php

  $con = mysqli_connect('localhost','root','root');


  if(!$con)
  {
    echo "not connected to server";

  }

  if(!mysqli_select_db($con ,'Library_Management_System'))
  {
    echo "database not selected";
  }
$title = $_POST['tt'];
$author = $_POST['an'];
$pd = $_POST['pd'];
$Status = $_POST['st'];
$sub = $_POST['sb'];
$tn = $_POST['tn'];
$bi= $_POST['bi'];
$price = $_POST['prc'];
$image = $_POST['cp'];

  //$email =
  /*$target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    update Book_Details set Title ='$title' && Author ='$author' &&  Cover='$image' && Total_no = $tn && Available =$Status && Price = $price where Book_Id = '$bi';"

    $image=basename( $_FILES["imageUpload"]["name"],".jpg"); // used to store the filename in a variable*/



  $sql = "update Book_Details set Price = $price,Available =$Status,Total_no = $tn,Cover='$image',Author ='$author',Title ='$title' where Book_Id = '$bi';";
  $result = mysqli_query($con,$sql);
  if($result)
  {
    echo "<script>
      alert('data updated successfully');
      </script>";
  }
  else
  {
    echo "data not updated";
  }


  header('Location: admem.php');













 ?>
