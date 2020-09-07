<?php
session_start();
require_once '../DB/config.php';
if (isset($_SESSION['logged_in'])) {
	header('location: ../Views/dashboard.php');
	exit();
}

if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(empty($username) || empty($password)){
			$_SESSION['message'] = "<font color='red'>Please, fill all the input fields</font>";
			header('location: ../index.php');
		}else{

			$query=mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

		 if(mysqli_num_rows($query)>=1)
		   {
		   		$user= mysqli_fetch_assoc($query);

			    $_SESSION['userId'] = $user['id'];
				$_SESSION['name'] = $user['name'];
				$_SESSION['userType'] = $user['userType'];
				$_SESSION['logged_in'] = 1;
					setcookie('username', $username, time()+3600, "/");
					setcookie('password', $password, time()+3600, "/");
				header('location:../Views/dashboard.php');
		   }else{
		   		$_SESSION['message'] = '<font color="red">User does not exists!</font><br>';
		   		header('location:../index.php');
		   }
		}
	}




		
			
