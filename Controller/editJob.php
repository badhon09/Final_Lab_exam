<?php
session_start();
require_once '../DB/config.php';
if (!isset($_SESSION['logged_in']) ) {
	header('location: ../index.php');
	exit();
}

if (isset($_POST['editJob']) ) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$title = $_POST['title'];
	$loc = $_POST['loc'];
	$sal = $_POST['sal'];
	if (empty($name) || empty($title) || empty($loc) || empty($sal)) {
		$_SESSION['message'] = "Please, fill all the input fields";
		header('location:../Views/editJob.php?id='.$id);
	}else{
		$q = "UPDATE users SET name = '$name', title='$title', loc='$loc', sal='$sal' WHERE id='$id'";
		if (mysqli_query($conn, $q)) {
			$_SESSION['message'] = "Success";
		}else{
			$_SESSION['message'] = "DB error!!!";
			
		}
		header('location:../Views/jobList.php');
	}
}