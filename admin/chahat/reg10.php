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

	$branch = $_POST['branch'];
	$name = $_POST['name'];
	$Roll_no = $_POST['roll_no'];
	$year = $_POST['year'];
	$Mobile_no = $_POST['mob'];
	$DOB = $_POST['dob'];
	$Username= $_POST['uname'];
	$password= $_POST['passw'];
	//$email =


	$sql = "insert into Student_Details(Name,RollNo,Branch,Year,mobile,DOB,Username,Password) values ('$name',$Roll_no,'$branch',$year,$Mobile_no,'$DOB','$Username','$password')";
	$result = mysqli_query($con,$sql);

	

	header('location : index.html');









 ?>
