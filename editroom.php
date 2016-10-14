<?php
	include('dbconn.php');
	$roomid=$_GET['roomid'];
	$result = $con->prepare("SELECT * FROM room WHERE eventbudgetid= :userid");
	$result->bindParam(':userid', $eventbudgetid);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<form action="editroom.php" method="POST">
<input type="hidden" name="roomid" value="<?php echo $roomid; ?>" />

Capacity<br>
														
															
<input type="text" name="room_capacity" value = "<?php echo $room['room_capacity'];?>" required><br>
		     													 



Price<br>
<input type="decimal" name="price" value="<?php echo $row['price']; ?>" /><br>
<input type="submit" name="update_rooms" value="Save" />
</form>
<?php
	}
?>

<?php
// configuration
include('dbconn.php');
 
// new data
$room_capacity = $_POST['room_capacity'];
			
			$price = $_POST['price'];
			$roomid = $_POST['roomid'];
// query
$sql = "UPDATE eventbudget 
        SET name=?, description=?, price=?
		WHERE evenbudgetid=?";
$q = $con->prepare($sql);
$q->execute(array($name,$description,$price,$evenbudgetid));
header("location: inakala.php");
 
?>