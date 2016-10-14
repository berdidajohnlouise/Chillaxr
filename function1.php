<?php

	 function dbconn(){

	 	try{

		return	$con = new PDO("mysql://host=localhost;dbname=chillaxr;",'root','');

		}catch(PDOException $err){
			$err = "Failed to connect database";
			echo $err;
		}
	 }

	  function loginenthu($username,$password){
	 	 	$con = dbconn();
	 	 	$sql = "SELECT * FROM enthusiast WHERE username=?";
	 		$stm = $con->prepare($sql);

			if($stm->execute(array($username))){

				$enthusiast = $stm->fetch();
				if($stm->rowCount()<>1){

					
					echo "<script>
							<!--
								alert('Your Username or Password maybe incorrect !');
								//-->
								</script>";

				}elseif($enthusiast['password']==MD5($password)){

						$_SESSION['id'] = session_id();
						$_SESSION['user'] = $enthusiast;
						$_SESSION['username'] = $enthusiast['username'];
						$_SESSION['EnthusiastID'] = $enthusiast['EnthusiastID'];

						$con1 = dbconn();

						$sql1 = "UPDATE enthusiast Set status='ON' WHERE username=?";
						$stm1 = $con1->prepare($sql1);
						$stm1->execute(array($enthusiast['username']));

						$con1 = NULL;
						header('location:profile-enthu.php');
						exit();

				}else{
							echo "<script>
							<!--
								alert('Password did not Match!');
								//-->
								</script>";
							
					}

				
			}else{

					
					echo "<script>
							<!--
								alert('Login Failed!');
								//-->
								</script>";
							
			}

			$con = null;
	}


	 function logoutenthu($username){

	 	$con = dbconn();

		$sql = "UPDATE enthusiast Set status='OFF' WHERE username=?";
		$stm = $con->prepare($sql);
		$stm->execute(array($username));

		$con = NULL;

		session_unset();
		session_destroy();

		header("location:index2.php");
	 }


	  function getuserenthu($EnthusiastID){

	 	$con = dbconn();

	 	$sql = "SELECT * FROM enthusiast WHERE EnthusiastID=?";
		$stm = $con->prepare($sql);
		$stm->execute(array($EnthusiastID));
		$user = $stm->fetch();

		return $user;
	 }

	  function getage($birthdate){
	 	$dob = new DateTime($birthdate);

	 	$interval = $dob->diff(new DateTime);

	 	return $interval->y;
	 }

	 function login($username,$password){
	 	 	$con = dbconn();
	 	 	$sql = "SELECT * FROM entertainmentestablishment WHERE eeid=?";
	 		$stm = $con->prepare($sql);

			if($stm->execute(array($username))){

				$entertainmentestablishment = $stm->fetch();
				if($stm->rowCount()<>1){

					
					echo "<script>
							<!--
								alert('Your Username or Password maybe incorrect! ');
								//-->
								</script>";

				}elseif($entertainmentestablishment['password']==MD5($password)){

						$_SESSION['id'] = session_id();
						$_SESSION['user'] = $entertainmentestablishment;
						$_SESSION['eeid'] = $entertainmentestablishment['eeid'];
						$_SESSION['mem_id'] = $entertainmentestablishment['mem_id'];

						$con1 = dbconn();

						$sql1 = "UPDATE entertainmentestablishment Set status='ON' WHERE eeid=?";
						$stm1 = $con1->prepare($sql1);
						$stm1->execute(array($entertainmentestablishment['eeid']));

						$con1 = NULL;
						header('location:dashboard.php');
						exit();

				}else{
							echo "<script>
							<!--
								alert('Password did not Match!');
								//-->
								</script>";
							
					}

				
			}else{

					
					echo "<script>
							<!--
								alert('Login Failed!');
								//-->
								</script>";
							
			}

			$con = null;
	}


	 function logout($eeid){

	 	$con = dbconn();

		$sql = "UPDATE entertainmentestablishment Set status='OFF' WHERE eeid=?";
		$stm = $con->prepare($sql);
		$stm->execute(array($eeid));

		$con = NULL;

		session_unset();
		session_destroy();

		header("location:index2.php");
	 }


	  function getuser($mem_id){

	 	$con = dbconn();

	 	$sql = "SELECT * FROM entertainmentestablishment WHERE mem_id=?";
		$stm = $con->prepare($sql);
		$stm->execute(array($mem_id));
		$user = $stm->fetch();

		return $user;
	 }

	 function getbudget($eeid){

		$con = dbconn();
		$sql = "SELECT * FROM eventbudget WHERE event_owner=? ORDER BY eventbudgetid DESC";
		$stm = $con ->prepare($sql);
		$stm->execute(array($eeid));
		$budget = $stm->fetchAll();
		$con = null;

		return $budget;
	}

	function getroom($eeid){

		$con = dbconn();
		$sql = "SELECT * FROM room WHERE eeid=?  ORDER BY roomid DESC";
		$stm = $con ->prepare($sql);
		$stm->execute(array($eeid));
		$rooms = $stm->fetchAll();
		$con = null;

		return $rooms;
	}


	 function pagination($page){
	 	$con = dbconn();
	 	$sql = "SELECT * FROM eventbudget LIMIT $page,24";
		$stm = $con->prepare($sql);
		$stm->execute();
		$result = $stm->fetchAll();
		$con = null;

		return $result;
	 }

	 function pageceil(){

	 	$con = dbconn();
	 	$sql1 = "SELECT * FROM eventbudget";
		$stm1 = $con->prepare($sql1);
		
		$stm1->execute();
		$count1 = $stm1->rowCount();
		$count1 = ceil($count1/24);

		$con = null;

		return $count1;
	 }

	
	
	 function update_post_event($eventbudgetid,$price,$description){

	 	$con = dbconn();
	 	$sql = "UPDATE eventbudget SET price=?,description=? WHERE eventbudgetid=?";
	 	$stm = $con->prepare($sql);
	 	if($stm->execute(array($price,$description,$eventbudgetid))){
	 		$_SESSION['alertmsg_img'] = "Event info has been Updated!";
	 	}
	 	$con = null;
	 }
	 
	 
	function update_post_room($roomid, $room_capacity, $price){

	 	$con = dbconn();
	 	$sql = "UPDATE room SET room_capacity=?, price=? WHERE roomid=?";
	 	$stm = $con->prepare($sql);
	 	if($stm->execute(array($room_capacity, $price, $roomid))){
	 		$_SESSION['alertmsg_rooms'] = "Room info has been Updated!";
	 	}
	 	$con = null;

 

	 function getfullname($mem_id){

	 	$con = dbconn();
		$sql = "SELECT * FROM entertainmentestablishment WHERE mem_id=?";
		$stm = $con->prepare($sql);
		$stm->execute(array($mem_id));
		$user = $stm->fetch();
		$fullname = ucfirst($user['name']);
		$con = null;

		return $fullname;
	 }

	 function all_seller(){
    	$con = dbconn();
	 	$sql = "SELECT * FROM entertainmentestablishment";
	 	$stm = $con->prepare($sql);
	 	$stm->execute();
	 	$seller = $stm->fetchAll();
	 	$con = null;
	 	return $seller;
    }
    function get_seller($mem_id){
    	$con = dbconn();
	 	$sql = "SELECT * FROM entertainmentestablishment WHERE mem_id = ?";
	 	$stm = $con->prepare($sql);
	 	$stm->execute(array($mem_id));
	 	$seller = $stm->fetch();
	 	$con = null;
	 	return $seller;
    }

     function get_event($owner){

	 	$con = dbconn();
	 	$sql = "SELECT * FROM eventbudget WHERE event_owner = ?";
	 	$stm = $con->prepare($sql);
	 	$stm->execute(array($owner));
	 	$result = $stm->fetchAll();
	 	$con=null;

	 	return $result;

	 }

	 
	 function admin_login($username,$password){

		if($username == "admin" && $password == "admin"){
			$_SESSION['id'] = session_id();
			header("location:admin.php?rec=user");
		}else{
			echo "<script>
							<!--
								alert('Login Failed!');
								//-->
								</script>";
		}
	}

		function get_sales($mem_id){

		$con = dbconn();
		$sql = "SELECT * FROM purchases WHERE seller_id=?";
		$stm = $con ->prepare($sql);
		$stm->execute(array($mem_id));
		$sales = $stm->fetchAll();
		$con = null;

		return $sales;

	}

	function getrooms($mem_id){

		$con = dbconn();
		$sql = "SELECT * FROM room WHERE room_owner=?";
		$stm = $con ->prepare($sql);
		$stm->execute(array($mem_id));
		$rooms = $stm->fetchAll();
		$con = null;

		return $rooms;

	}
	
	function get_all_rooms(){

		$con = dbconn();
		$sql = "SELECT * FROM room WHERE status='Available'";
		$stm = $con ->prepare($sql);
		$stm->execute();
		$rooms = $stm->fetchAll();
		$con = null;

		return $rooms;

	}

?>