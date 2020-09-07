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
	<title>Employee List</title>
</head>
<body>

	<h1>Employee List here</h1>
	<a href="dashboard.php"><h3>Back</h3></a>
	<table border=1> 
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Phone</td>
			<td>Username</td>
			<td>Password</td>
			<td>Company</td>
			<td>Action</td>
		</tr>
		<?php
				$q1 = mysqli_query($conn,"SELECT * FROM users WHERE userType!='admin'");
				$i=0;
				while ($row=mysqli_fetch_assoc($q1)) {
				?>
				<tr>
					<td><?=++$i?></td>
					<td><?=$row['name']?></td>
					<td><?=$row['phone']?></td>
					<td><?=$row['username']?></td>
					<td><?=$row['password']?></td>
					<td><?=$row['comp']?></td>
					<td><a href="editEmp.php?id=<?=$row['id']?>">Edit</a> | <a href="../Controller/deleteEmp.php?id=<?=$row['id']?>">Delete</a></td>
				</tr>
			<?php } ?>
	</table>
</body>
</html>