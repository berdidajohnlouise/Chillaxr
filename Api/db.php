<?php 
function connect()
{
	return new PDO('mysql:/host=localhost;dbname=chillaxr','root','');
}
function addEnthusiast($a,$b,$c,$d,$e,$f,$g,$h)
{
	$db = connect();
	$sql = "INSERT into enthusiast(enthusiast_username,enthusiast_password,
		  enthusiast_name,enthusiast_contact,enthusiast_email,enthusiast_address,
		  enthusiast_sex,enthusiast_bday)values(?,?,?,?,?,?,?,?)";
   $pdo = $db->prepare($sql);
   $pdo->execute(array($a,$b,$c,$d,$e,$f,$g,$h));
   $db = null;
}
function getEnthusiast($a,$b)
{
	$db = connect();
	$sql = "SELECT * from enthusiast where enthusiast_username = ? and enthusiast_password=? and enthusiast_status='1'";
	$pdo = $db->prepare($sql);
	$pdo->execute(array($a,$b));
	$row = $pdo->fetch();
	$db = null;
	return $row;
}
function getEnthusiastById($id)
{
	$db = connect();
	$sql = "SELECT * from enthusiast where EnthusiastID=?";
	$pdo = $db->prepare($sql);
	$pdo->execute(array($id));
	$row = $pdo->fetch();
	$db = null;
	return $row;
}

function updateEnthusiast($a,$b,$c,$d,$e,$f,$id)
{
	$db = connect();
	$sql = "UPDATE enthusiast set enthusiast_name=?,enthusiast_contact=?,enthusiast_email=?,
			enthusiast_address=?,enthusiast_sex=?,enthusiast_bday=? where EnthusiastID=?";
	$pdo = $db->prepare($sql);
	$pdo->execute(array($a,$b,$c,$d,$e,$f,$id));
	$db = null;
}
function getRooms($id){
	$db = connect();
	$sql = "SELECT * from room where eeid=?";
	$pdo = $db->prepare($sql);
	$pdo->execute(array($id));
	$row = $pdo->fetchAll();
	$db = null;
	return $row;
}
function getEstablishment(){
	$db = connect();
	$sql = "SELECT * from entertainmentestablishment";
	$pdo = $db->prepare($sql);
	$pdo->execute();
	$row = $pdo->fetchAll();
	$db = null;
	return $row;
}
function getPackage($id)
{
	$db = connect();
	$sql = "SELECT * from eventbudget where roomid=?";
	$pdo = $db->prepare($sql);
	$pdo->execute(array($id));
	$row = $pdo->fetch();
	$db = null;
	return $row;	
}

function getRoomsById($id){
	$db = connect();
	$sql = "SELECT * from room where roomid=?";
	$pdo = $db->prepare($sql);
	$pdo->execute(array($id));
	$row = $pdo->fetch();
	$db = null;
	return $row;
}

function getRoomById($id){
	$db = connect();
	$sql = "SELECT * from room where eeid=?";
	$pdo = $db->prepare($sql);
	$pdo->execute(array($id));
	$row = $pdo->fetchAll();
	$db = null;
	return $row;
}

function addReservation($a,$b,$c,$d)
{
	$db = connect();
	$sql = "INSERT into reservation(eventid,reservation_date,reservation_graceTime,EnthusiastID)
	    values(?,?,?,?)";
   $pdo = $db->prepare($sql);
   $pdo->execute(array($a,$b,$c,$d));
   $db = null;
}
function addHistory($a,$b,$c,$d)
{
	$db = connect();
	$sql = "INSERT into history(user,action,datez,time)values(?,?,?,?)";
   $pdo = $db->prepare($sql);
   $pdo->execute(array($a,$b,$c,$d));
   $db = null;
}
function getHistory($id)
{
	$db = connect();
	$sql = "SELECT * from history where user=? order by id desc";
	$pdo = $db->prepare($sql);
	$pdo->execute(array($id));
	$row = $pdo->fetchAll();
	$db = null;
	return $row;	
}
function deleteHistory($id)
{
	$db = connect();
	$sql = "DELETE from history where id=?";
	$pdo = $db->prepare($sql);
	$pdo->execute(array($id));
	$db = null;
}
function deleteAllHistory($user)
{
	$db = connect();
	$sql = "DELETE from history where user=?";
	$pdo = $db->prepare($sql);
	$pdo->execute(array($user));
	$db = null;
}

function uploadImage($a,$b,$c,$id)
{
	$db = connect();
	$sql = "UPDATE enthusiast set enthusiast_image = ? where EnthusiastID=?";
    $pdo = $db->prepare($sql);
    $pdo->execute(array($a,$id));
    $db = null;	
    file_put_contents($c,base64_decode($b)); 
}
function follow($a,$b)
{
	$db = connect();
	$sql = "INSERT into follow(user,eeid)values(?,?)";
    $pdo = $db->prepare($sql);
    $pdo->execute(array($a,$b));
    $db = null;	
}
function getFollow($a,$b)
{
	$db = connect();
	$sql = "SELECT * from follow where user=? and eeid=?";
    $pdo = $db->prepare($sql);
    $pdo->execute(array($a,$b));
    $row = $pdo->fetch();
    $db = null;		
    return $row;
}
function unfollow($a,$id)
{
	$db = connect();
	$sql = "UPDATE follow set status = 0 where user=? and eeid=?";
    $pdo = $db->prepare($sql);
    $pdo->execute(array($a,$id));
    $db = null;	
}
function followz($a,$id)
{
	$db = connect();
	$sql = "UPDATE follow set status = 1 where user=? and eeid=?";
    $pdo = $db->prepare($sql);
    $pdo->execute(array($a,$id));
    $db = null;	
}

function getAnnouncement($a)
{
	$db = connect();
	$sql = "SELECT * from announcement where eeid=?";
	$pdo = $db->prepare($sql);
	$pdo->execute(array($a));
	$row = $pdo->fetchAll();
	$db = null;
	return $row;
}
function getCategory($a)
{
	$db = connect();
	$sql =  "SELECT * from category where id=?";
	$pdo = $db->prepare($sql);
	$pdo->execute(array($a));
	$row = $pdo->fetch();
	$db = null;
	return $row;
}
?>