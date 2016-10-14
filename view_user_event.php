<?php

   include 'dbconn.php';

$sql = "SELECT * FROM eventbudget WHERE event_owner=?";

$cmd = $con ->prepare($sql);
$cmd->execute(array($_SESSION['eeid']));
$event_count = $cmd-> rowCount();
$result = $cmd->fetchAll();
?>