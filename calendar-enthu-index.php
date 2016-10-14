<?php
	include 'session.php';
	include 'checksession.php';
	include 'dbconn.php';
	
	  //include 'session.php';
	unset($_SESSION['msg']);
  //include'loginck.php';
	//include 'budgetexec.php';
	if(isset($_SESSION ['username'])){
		
		$username = $_SESSION['username'];
		//getuser($userid)
		$sql = "SELECT * FROM enthusiast WHERE username=?";
		$stm = $con->prepare($sql);
		$stm->execute(array($username));
		$user = $stm->fetch();
		$seller = $_SESSION['id'] = $user['username'];
		$_SESSION['EnthusiastID'] = $user['EnthusiastID'];

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
include 'calendar-enthu.php';
//include '/thesis/main-menu.php';
//include 'calendar.css';
//include 'main-menu.php';

$calendar = new Calendar();

echo $calendar->show();
?>
</body>
</html>       
