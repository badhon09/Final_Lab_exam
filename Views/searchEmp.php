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
<a href="dashboard.php"><h3>Back</h3></a>
<table>
	<tr>
		<td>
			<input type="text" name="username" id="username" placeholder="Name">
			<input type="button" id="searchBtn" onclick="searchEmp()" value="Search">
			<div id="result"></div>
		</td>
	</tr>
</table>
<script type="text/javascript">
	function searchEmp() {
		var username = document.getElementById('username').value;
		if (username.length<=0) {
			alert("Field Can't be empty");
		}else{
			var xhttp = new XMLHttpRequest();
 			xhttp.open('POST', '../Controller/searchEmp.php', true);
 			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
 			xhttp.send("username="+username);
		    xhttp.onreadystatechange = function() {
		      if(this.readyState == 4 && this.status == 200){
					if(this.responseText != ""){
						document.getElementById('result').innerHTML = this.responseText;
					}else{
						document.getElementById('result').innerHTML = "No results";
					}
					
				}
		    }
		}
 		
	 	}
</script>
</body>
</html>