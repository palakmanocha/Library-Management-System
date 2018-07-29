<?php

	$con = mysqli_connect('localhost','root','palak');


	if(!$con)
	{
		echo "not connected to server";

	}

	if(!mysqli_select_db($con ,'Library_Management_System'))
	{
		echo "database not selected";
	}



    $title = $_POST['tt'];


if (isset($_POST['an'])) {
    $author = $_POST['an'];
}
if (isset($_POST['pd'])){
$pd = $_POST['pd'];
}

if (isset($_POST['st']))
{
	$Status = $_POST['st'];
}
if (isset($_POST['sb'])){
    $sub = $_POST['sb'];
}
if (isset($_POST['tn'])){
	$tn = $_POST['tn'];
}
if (isset($_POST['bi'])){
	$bi= $_POST['bi'];
}
if (isset($_POST['prc']))
{
	$price = $_POST['prc'];
}

	$image = $_POST['fileToUpload'];

	$target_dir = "../../books/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}

	$sql = "insert into Book_Details(Title,Author,Cover,Total_no,Available,Price,Book_Id) values ('$title','$author','$target_file',$tn,$Status,$price,'$bi')";
	$result = mysqli_query($con,$sql);
	if($result)
	{
		echo "<script>
			alert('data inserted successfully');
			</script>";
	}
	else
	{
		echo('not inserted');
	}

// header('Location: admem.php');echo "cho "
echo "
<script>
	window.location.href='admem.php';
</script>

";










 ?>
