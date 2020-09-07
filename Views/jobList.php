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
	<title>Job List</title>
</head>
<body>

	<h1>Job List Here</h1>
	<a href="dashboard.php"><h3>Back</h3></a>
	<table border=1> 
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Title</td>
			<td>Location</td>
			<td>Salary</td>
			<td>Actions</td>
		</tr>
		<?php
				$userId = $_SESSION['userId'];
				$q1 = mysqli_query($conn,"SELECT * FROM job WHERE userId='$userId'");
				$i=0;
				while ($row=mysqli_fetch_assoc($q1)) {
				?>
				<tr>
					<td><?=++$i?></td>
					<td><?=$row['name']?></td>
					<td><?=$row['title']?></td>
					<td><?=$row['loc']?></td>
					<td><?=$row['sal']?></td>
					<td><a href="editJob.php?id=<?=$row['id']?>">Edit</a> | <a href="../Controller/deleteJob.php?id=<?=$row['id']?>">Delete</a></td>
				</tr>
			<?php } ?>
	</table>
</body>
</html>