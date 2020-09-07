<?php
session_start();
require_once '../DB/config.php';
if (!isset($_SESSION['logged_in'])) {
	header('location: ../index.php');
	exit();
}

if (isset($_POST['addJob'])) {
	$name = $_POST['name'];
	$title = $_POST['title'];
	$loc = $_POST['loc'];
	$sal = $_POST['sal'];
	if (empty($name) || empty($title) || empty($loc) || empty($sal) ) {
		$_SESSION['message'] = "Please, fill all the input fields";
		header('location:../Views/addJob.php');
	}else{
		$id = $_SESSION['userId'];
		$q = "INSERT INTO job (name, title,loc, sal, userId) VALUES ('$name','$title', '$loc', '$sal','$id')";
		if (mysqli_query($conn, $q)) {
			$_SESSION['message'] = "New Job added successfully";
		}else{
			$_SESSION['message'] = "DB error!!";
			
		}
		header('location:../Views/addJob.php');
	}
}