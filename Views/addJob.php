<?php
session_start();
require_once '../DB/config.php';
if (!isset($_SESSION['logged_in'])) {
	header('location: ../index.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
	<center>
		<?php
		if (isset($_SESSION['message'])) {
			echo $_SESSION['message'];
		}
		?>
	</center>
	<form action="../Controller/addJob.php" method="post">
		<fieldset>
			<legend>Add New Job</legend>
			<table>
					<tr>
						<td>Comp name</td>
						<td><input type="text" name="name"></td>
					</tr>
					<tr>
						<td>Job title</td>
						<td><input type="text" name="title"></td>
					</tr>
					<tr>
						<td>Job Location</td>
						<td><input type="text" name="loc"></td>
					</tr>
					<tr>
						<td>Salary</td>
						<td><input type="text" name="sal"></td>
					</tr>
					<tr>
						<td>
							
						</td>
						<td>
							<input type="submit" name="addJob" value="Add Job">
							<a href="dashboard.php">Back</a>
						</td>
					</tr>
				</table>
		</fieldset>
	</form>
</body>
</html>