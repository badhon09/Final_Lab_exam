<?php
session_start();
require_once '../DB/config.php';
if (!isset($_SESSION['logged_in']) || $_SESSION['userType']!="admin") {
	header('location: ../index.php');
	exit();
}

if (isset($_POST['editEmp']) ) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$userType = 'author';
	$comp = $_POST['comp'];
	if (empty($name) || empty($phone) || empty($username) || empty($password) || empty($comp)) {
		$_SESSION['message'] = "Please, fill all the input fields";
		header('location:../Views/editEmp.php?id='.$userId);
	}else{
		$q = "UPDATE users SET name = '$name', phone='$phone', username='$username', password='$password', comp='$comp' WHERE id='$id'";
		if (mysqli_query($conn, $q)) {
			$_SESSION['message'] = "Success";
		}else{
			$_SESSION['message'] = "DB error!!!";
			
		}
		header('location:../Views/empList.php');
	}
}