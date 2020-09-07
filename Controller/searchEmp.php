<?php
session_start();
require_once '../DB/config.php';
if (!isset($_SESSION['logged_in']) || $_SESSION['userType']!="admin") {
	header('location: ../index.php');
	exit();
}


if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$q = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
	if(mysqli_num_rows($q)>=1)
	{
		$data = "<table border=1>
				<tr>
					<td>Name</td>
					<td>Phone</td>
					<td>Username</td>
					<td>Password</td>
					<td>Company</td>

				</tr>";

		while ($row = mysqli_fetch_assoc($q)) {
		$data .= "<tr>
					<td>{$row['name']}</td>
					<td>{$row['phone']}</td>
					<td>{$row['username']}</td>
					<td>{$row['password']}</td>
					<td>{$row['comp']}</td>
				</tr>";
		}
		$data .= "</table>";
				
		echo $data;
	}else{
		echo "No entry";
	}
}