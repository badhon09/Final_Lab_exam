<?php
	require_once('../service/userService.php');

	if(isset($_POST['submit'])){

		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];

		
			
			$user = [
				'username'	=>$username,
				'password'	=>$password,
				'email'		=>$email
			];

			$status = create($user);
		
			if($status){
				header('location: ../views/admin_login.php');
			}else{
				header('location: ../views/admin_signup.php');
			}
		
		
	}
?>