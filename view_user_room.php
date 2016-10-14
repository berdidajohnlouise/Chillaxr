<?php

   include 'dbconn.php';

$sql = "SELECT * FROM room WHERE eeid=?";

$cmd = $con ->prepare($sql);
$cmd->execute(array($_SESSION['eeid']));
$room_count = $cmd-> rowCount();
$result = $cmd->fetchAll();
?>