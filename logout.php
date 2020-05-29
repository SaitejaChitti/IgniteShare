<?php 
	session_start();
	if(isset($_SESSION['name'])){
	session_unset($_SESSION['name']);
	}
	session_destroy();
	header('location: login.php');
?>