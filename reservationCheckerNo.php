<?php
	include 'dbconn.php';
	$sql = "Select * from tbl_time_resv inner join reservation on reservation.ReservationID = tbl_time_resv.attr_tr_pk_resv inner join entertainmentestablishment on entertainmentestablishment.eeid = reservation.eeid where entertainmentestablishment.eeid = ? and reservation.eventid = 0";
    $stm = $con->prepare($sql);
    $stm->execute(array($_GET['eeid']));
    $user = $stm->fetchAll(PDO::FETCH_OBJ);
    header('Content-Type: application/json');
    echo json_encode($user);
?>
