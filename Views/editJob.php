<?php
session_start();
require_once '../DB/config.php';
if (!isset($_SESSION['logged_in']) ) {
	header('location: ../index.php');
	exit();
}
$jobId= $_GET['id'];
$q=mysqli_query($conn, "SELECT * FROM job WHERE id='{$jobId}'");
$row=mysqli_fetch_assoc($q);


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
					<td>Title:</td>
					<td><input type="text" name="title" value="<?=$row['title']?>"></td>
				</tr>
				<tr>
					<td>Location:</td>
					<td><input type="text" name="loc" value="<?=$row['loc']?>"></td>
				</tr>
				<tr>
					<td>Salary:</td>
					<td><input type="text" name="sal" value="<?=$row['sal']?>"></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value="<?=$row['id']?>"></td>
					<td>
						<input type="submit" name="editJob" value="Update">
						<a href="jobList.php">Back</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>