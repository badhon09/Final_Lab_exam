<?php

	$host 	= "127.0.0.1";
	$dbuser = "root";
	$dbpass	= "";
	$dbname	= "labexam";

	function dbConnection(){

		global $host;
		global $dbuser;
		global $dbpass;
		global $dbname;

		return $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);
	}

?>