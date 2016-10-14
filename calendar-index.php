<?php
	include 'session.php';
	include 'checksession.php';
	include 'dbconn.php';
	include 'event.php';
	
	  //include 'session.php';
	unset($_SESSION['msg']);
  //include'loginck.php';
	//include 'budgetexec.php';
	if(isset($_SESSION ['mem_id'])){
		
		$eeid = $_SESSION['mem_id'];
		//getuser($userid)
		$sql = "SELECT * FROM entertainmentestablishment WHERE mem_id=?";
		$stm = $con->prepare($sql);
		$stm->execute(array($eeid));
		$user = $stm->fetch();
		//$seller = $_SESSION['id'] = $user['eeid'];
		$_SESSION['mem_id'] = $user['mem_id'];

		$fullname = ucfirst($user['name']);

		//include'sell_image.php';
	 }
		

?>
<html>
<head>   
<link href="calendar.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include 'main-menu.php';
include 'calendar.php';
//include '/thesis/main-menu.php';
//include 'calendar.css';
//include 'main-menu.php';

$calendar = new Calendar();

echo $calendar->show();
?>
</body>
</html>       
