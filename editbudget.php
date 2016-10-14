

<?php
// configuration
include('dbconn.php');
 

$sql = "UPDATE eventbudget 
        SET price=?, description= ? 
		WHERE evenbudgetid=?";
$q = $con->prepare($sql);
$q->execute(array($description,$price,$evenbudgetid));

?>