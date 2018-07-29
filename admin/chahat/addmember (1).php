<?php
	error_reporting(E_ALL);
        ini_set('display_errors', 1);
	$con = mysqli_connect('localhost','root','root');


	if(!$con)
	{
		echo "not connected to server";

	}

	if(!mysqli_select_db($con ,'Library_Management_System'))
	{
		echo "database not selected";
	}

	$ds = $_POST['ds'];
	$name = $_POST['name'];
	$id = $_POST['id'];
	$email = $_POST['email'];
	$Mobile_no = $_POST['mob'];
	$DOB = $_POST['dob'];
	$Username= $_POST['uname'];
	$password= $_POST['passw'];
	//$email =


	$sql = "insert into Admin_details(Id,Name,Contact,designation,EmailID,Username,Password) values ($id,'$name',$Mobile_no,$year,$Mobile_no,'$ds','$Username','$password')";
	$result = mysqli_query($con,$sql);
	



	header('location : index.html');









 ?>
