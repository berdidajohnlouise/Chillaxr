<?php 
	include 'dbconn.php';
	$eeid = $_GET['eeid'];
	$sql = "SELECT establishment_timeopen, establishment_timeclose FROM entertainmentestablishment WHERE eeid = ?";
    $stm = $con->prepare($sql);
    $stm->execute(array($eeid));
    $user = $stm->fetchAll(PDO::FETCH_OBJ);
    header('Content-Type: application/json');
    echo json_encode($user);
?>