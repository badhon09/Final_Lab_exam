<?php
session_start();
require_once '../DB/config.php';
if (!isset($_SESSION['logged_in']) || $_SESSION['userType']!="admin") {
	header('location: ../index.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Author</title>
</head>
<body>
	<center>
		<?php
		if (isset($_SESSION['message'])) {
			echo $_SESSION['message'];
		}
		?>
	</center>
	<form action="../Controller/addEmp.php" method="post">
		<fieldset>
			<legend>Add New Author</legend>
			<table>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><input type="text" name="phone"></td>
				</tr>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="text" name="password"></td>
				</tr>
				<tr>
					<td>Company Name:</td>
					<td><input type="text" name="comp"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="addEmp" value="Add Employee">
						<a href="dashboard.php">Back</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>