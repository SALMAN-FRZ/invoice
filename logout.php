<?php
if (isset($_GET['id'])) {
	include_once ("session_manager.php");
	
	
	session_destroy();
	
	 //		//		redirect to login page
			header('Location: login.php?login=true');
	return;
}


?>