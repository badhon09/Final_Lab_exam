<?php
session_start();
require_once '../DB/config.php';
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in']!=1) {
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
<table>
	<tr>
		<td>
			<?php
			if ($_SESSION['userType']=="admin") {
			?>
			<tr>
				<td>
					<a href="addEmp.php"> Add Employee</a> |
				</td>
				<td>
					<a href="empList.php"> Employee List</a> |
				</td>
				<td>
					<a href="searchEmp.php"> Search Employee</a> |
				</td>
				<td>
					<a href="../Controller/logout.php">Logout</a>
				</td>
			</tr>

			<?php }else if ($_SESSION['userType']=="author") { ?>
			<tr>
				<td>
					<a href="jobList.php"> Job List</a> |
				</td>
				<td>
					<a href="addJob.php"> Add Job</a> |
				</td>
				<td>
					<a href="../Controller/logout.php">Logout</a>
				</td>
			</tr>
			<?php } ?>
		</td>
	</tr>
</table>
</body>
</html>

