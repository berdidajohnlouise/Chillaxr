<?php 
	include 'session-enthu.php';
	include 'dbconn.php';

	$enthusiast_username = $_SESSION['enthusiast_username'];

	//logout($userid)

	$sql = "UPDATE enthusiast Set enthusiast_status='OFF' WHERE enthusiast_username=?";
	$stm = $con->prepare($sql);
	$stm->execute(array($enthusiast_username));

	$con = NULL;

	session_unset();
	session_destroy();

	header("location:index.php");

?>