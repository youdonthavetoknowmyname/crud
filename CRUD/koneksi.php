<?php 	
	$host = "localhost";
	$username = "root";
	$pass = "";
	$db = "crud";

	$koneksi = mysqli_connect($host, $username, $pass, $db);
	if (!$koneksi){
	 die("Connection Failed:".mysqli_connect_error());
	};
?>