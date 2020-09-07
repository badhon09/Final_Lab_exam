<?php
session_start();
require_once '../DB/config.php';
if (!isset($_SESSION['logged_in']) || $_SESSION['userType']!="admin") {
	header('location: ../index.php');
	exit();
}
$empId= $_GET['id'];
$q1=mysqli_query($conn, "SELECT * FROM users WHERE id='{$empId}'");
$row=mysqli_fetch_assoc($q1);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Employee</title>
</head>
<body>
	<center>
		<?php
		if (isset($_SESSION['message'])) {
			echo $_SESSION['message'];
		}
		?>
	</center>
	<form action="../Controller/editEmp.php" method="post">
		<fieldset>
			<legend>Edit Employee</legend>
			<table>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="name" value="<?=$row['name']?>"></td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><input type="text" name="phone" value="<?=$row['phone']?>"></td>
				</tr>
				<tr>
					<td>UserName:</td>
					<td><input type="text" name="username" value="<?=$row['username']?>"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="text" name="password" value="<?=$row['password']?>"></td>
				</tr>
				<tr>
					<td>Company:</td>
					<td><input type="text" name="comp" value="<?=$row['comp']?>"></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value="<?=$row['id']?>"></td>
					<td>
						<input type="submit" name="editEmp" value="Update">
						<a href="empList.php">Back</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>