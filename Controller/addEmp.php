<?php
session_start();
require_once '../DB/config.php';
if (!isset($_SESSION['logged_in']) || $_SESSION['userType']!="admin") {
	header('location: ../index.php');
	exit();
}

if (isset($_POST['addEmp'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$userType = 'author';
	$comp = $_POST['comp'];
	if (empty($name) || empty($phone) || empty($username) || empty($password) || empty($comp)) {
		$_SESSION['message'] = "<font color='red'>Please, fill all the input fields</font><br>";
		header('location:../Views/addEmp.php');
	}else{
		$q = "INSERT INTO users (name, phone, username, password, userType, comp) VALUES ('$name', '$phone', '$username','$password','$userType', '$comp')";
		if (mysqli_query($conn, $q)) {
			$_SESSION['message'] = "<font color='green'>Employee added</font><br>";
		}else{
			$_SESSION['message'] = "<font color='red'>DB error!!</font><br>";
			
		}
		header('location:../Views/addEmp.php');
	}
}