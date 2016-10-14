<?php 
	include 'session.php';
	include 'dbconn.php';

	$eeid = $_SESSION['eeid'];

	//logout($userid)

	$sql = "UPDATE entertainmentestablishment Set status='OFF' WHERE eeid=?";
	$stm = $con->prepare($sql);
	$stm->execute(array($eeid));

	$con = NULL;

	session_unset();
	session_destroy();

	header("location:index.php");

?>