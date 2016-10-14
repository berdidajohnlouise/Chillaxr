<?php
	include 'dbconn.php';
	$sql = "SELECT * FROM tbl_time_resv INNER JOIN reservation ON tbl_time_resv.attr_tr_pk_resv = reservation.ReservationID INNER JOIN entertainmentestablishment ON reservation.eeid = entertainmentestablishment.eeid  INNER JOIN eventbudget ON reservation.eventid = eventbudget.eventbudgetid WHERE entertainmentestablishment.eeid = ?";
    $stm = $con->prepare($sql);
    $stm->execute(array($_GET['eeid']));
    $user = $stm->fetchAll(PDO::FETCH_OBJ);
    header('Content-Type: application/json');
    echo json_encode($user);
?>
