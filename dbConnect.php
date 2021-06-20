<?php
	define('HOST','localhost');
	define('USER','root');
	define('PASS','');
	define('DB','invoice');
	$con = mysqli_connect(HOST,USER,PASS,DB);
	if(!$con)
	{
		die("Database Connection Error!");
	} 
?>