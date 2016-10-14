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
	 	 	$sql = "SELECT * FROM enthusiast WHERE enthusiast_username=?";
	 		$stm = $con->prepare($sql);

			if($stm->execute(array($username))){

				$enthusiast = $stm->fetch();
				if($stm->rowCount()<>1){


					echo "<script>
							<!--
								alert('Your Username or Password maybe incorrect !');
								//-->
								</script>";

				}elseif($enthusiast['enthusiast_password']==MD5($password)){


						$con1 = dbconn();

						$sql1 = "UPDATE enthusiast Set status='ON' WHERE enthusiast_username=?";
						$stm1 = $con1->prepare($sql1);
						$stm1->execute(array($enthusiast['enthusiast_username']));

//						$con1 = NULL;
                        session_start();
                        $_SESSION['id'] = session_id();
                        $_SESSION['enthusiast_username'] = $enthusiast['enthusiast_username'];
                        $_SESSION['enthu_id'] = $enthusiast['EnthusiastID'];
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

		$sql = "UPDATE enthusiast Set status='OFF' WHERE enthusiast_username=?";
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
	 	 	$sql = "SELECT * FROM entertainmentestablishment WHERE username=?";
	 		$stm = $con->prepare($sql);

			if($stm->execute(array($username))){

				$entertainmentestablishment = $stm->fetch();
				if($stm->rowCount()<>1){


					echo "<script>
							<!--
								alert('Your Username or Password maybe incorrt! ');
								//-->
								</script>";

				}elseif($entertainmentestablishment['password']==MD5($password)){

						$_SESSION['id'] = session_id();
						$_SESSION['user'] = $entertainmentestablishment;
						$_SESSION['eeid'] =$entertainmentestablishment['eeid'];

						$con1 = dbconn();

						$sql1 = "UPDATE entertainmentestablishment Set establishment_status='ON' WHERE eeid=?";
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

	 function get_event_budget($id){

		$con = dbconn();
		$sql = "SELECT * FROM eventbudget WHERE event_owner=?";
		$stm = $con ->prepare($sql);
		$stm->execute(array($id));
		$budget = $stm->fetchAll();
		$con = null;

		return $budget;
	}

	function get_room($id){
		$con = dbconn();
		$sql = "SELECT * FROM room WHERE roomid=?";
		$stm = $con->prepare($sql);
		$stm->execute(array($id));
		$rooms = $stm->fetch();
		$con = null;

		return $rooms;
	}

	function get_all_announcement($eeid){

		$con = dbconn();
		$sql = "SELECT * FROM announcement WHERE eeid=? ORDER BY announcement_date";
		$stm = $con ->prepare($sql);
		$stm->execute(array($eeid));
		$announcements = $stm->fetchAll();
		$con = null;

		return $announcements;
	}

    function get_announce_id($id){
        $con = dbconn();
        $sql = "SELECT * FROM announcement WHERE announcement_id=?";
        $stm = $con ->prepare($sql);
        $stm->execute(array($id));
        $announcements = $stm->fetch();
        $con = null;

        return $announcements;

    }


    function insert_announcement($name,$desc,$image,$eeid,$fullname){

        $con = dbconn();
        $sql = "INSERT INTO announcement (announcement_name,announcement_details,announcement_img,eeid)VALUES (?, ?, ?, ?)";
        $stm = $con->prepare($sql);

        if ($stm->execute(array($name,$desc,$image['name'],$eeid))) {

            move_uploaded_file($image['tmp_name'], 'user_files/' . $fullname . '/announcement/photo/' . $image['name']);
            unset($_SESSION['message']);
            $_SESSION['message'] = "New Announcement Successfully Added!";
            header("location:announcement.php");
        }

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



	 function update_post_event($eventbudgetid, $description, $price){

	 	$con = dbconn();
	 	$sql = "UPDATE eventbudget SET description=?, price=? WHERE eventbudgetid=?";
	 	$stm = $con->prepare($sql);
	 	if($stm->execute(array($description, $price, $eventbudgetid))){
	 		$_SESSION['alertmsg_event'] = "Event info has been Updated!";
	 	}
	 	$con = null;
	 }
	  function update_announcement($fullname,$announcement_id,$announcement_name, $announcement_details, $announcement_img){



          $con = dbconn();
          $sql = "UPDATE announcement SET announcement_name=?,announcement_details=?,announcement_img=? WHERE announcement_id=?";
          $stm = $con->prepare($sql);
          if($stm->execute(array($announcement_name,$announcement_details,$announcement_img['name'],$announcement_id))){
              move_uploaded_file($announcement_img['tmp_name'], 'user_files/' . $fullname . '/announcement/photo/' . $announcement_img['name']);
              unset($_SESSION['message']);
              $_SESSION['message'] = "Announcement Successfully Updated!";
              header("location:announcement.php");
          }
          $con = null;
	 }
    function delete_announcement($id){
        $con = dbconn();
        $sql = "DELETE FROM announcement WHERE announcement_id=?";
        $stm = $con ->prepare($sql);
        $stm->execute(array($id));

        unset($_SESSION['message']);

        $_SESSION['message'] = "Announcement Successfully Deleted!";
        header("location:announcement.php");
    }

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

	function get_all_rooms($id){

		$con = dbconn();
		$sql = "SELECT * FROM room WHERE eeid=? AND room_status = 2";
		$stm = $con->prepare($sql);
		$stm->execute(array($id));
		$rooms = $stm->fetchAll();
		$con = null;

		return $rooms;

	}

    function get_room_status($id){

        $con = dbconn();
        $sql = "SELECT * FROM room_statuses WHERE id=?";
        $stm = $con ->prepare($sql);
        $stm->execute(array($id));

        $status  = $stm->fetch();

        return $status['status'];
    }

    function delete_event($id){

        $con = dbconn();
        $sql = "DELETE FROM eventbudget WHERE eventbudgetid=?";
        $stm = $con ->prepare($sql);
        $stm->execute(array($id));

        unset($_SESSION['message']);

        $_SESSION['message'] = "Event Budget Successfully Deleted!";
        header("location:event-budget.php");

    }

    function update_event($name,$des,$price,$package_image,$room,$id){

        $con = dbconn();
        $sql = "UPDATE eventbudget SET eventbudget_name=?,eventbudget_description=?,eventbudget_price=?,eventbudget_image=?,roomid=? WHERE eventbudgetid=?";
        $stm = $con ->prepare($sql);
        $stm->execute(array($name,$des,$price,$package_image['name'],$room,$id));
				move_uploaded_file($package_image['tmp_name'],'Images/'.$package_image['name']);
        unset($_SESSION['message']);

        $_SESSION['message'] = "Event Budget Successfully Updated!";
        header("location:event-budget.php");

    }


function update_room($fullname,$cur_image_name,$room_name, $room_capacity,$room_image, $room_price,$room_status,$roomid){



    if(isset($room_image) && $cur_image_name != $room_image['name'] ){
        $image_name = $room_image['name'];
    }else{
        $image_name = $cur_image_name;
    }

    $con = dbconn();
    $sql = "UPDATE room SET room_name=?,room_capacity=?,room_image=?,room_price=?,room_status=? WHERE roomid=?";
    $stm = $con->prepare($sql);
    if($stm->execute(array($room_name,$room_capacity,$image_name,$room_price,$room_status,$roomid))){
        move_uploaded_file($room_image['tmp_name'], 'user_files/' . $fullname . '/room/' . $image_name);
        unset($_SESSION['message']);
        $_SESSION['message'] = "Room Successfully Updated!";
        header("location:room.php");
    }
    $con = null;
}

function delete_room($roomid){

    $con = dbconn();
    $sql = "DELETE FROM room WHERE roomid=?";
    $stm = $con ->prepare($sql);

    if($stm->execute(array($roomid))){
        unset($_SESSION['message']);
        $_SESSION['message'] = "Room Successfully Deleted!";
        header("location:room.php");
    }

    $con = null;
}

function get_room_id($roomid){

    $con = dbconn();
    $sql = "SELECT * FROM room WHERE roomid=?";
    $stm = $con ->prepare($sql);
    $stm->execute(array($roomid));

    $room  = $stm->fetch();

    return $room;

}

function all_room_statuses(){

        $con = dbconn();
        $sql = "SELECT * FROM room_statuses";
        $stm = $con ->prepare($sql);
        $stm->execute();

        $room  = $stm->fetchAll();

        return $room;

    }



    function get_event_id($id){

        $con = dbconn();
        $sql = "SELECT * FROM eventbudget WHERE eventbudgetid=?";
        $stm = $con ->prepare($sql);
        $stm->execute(array($id));

        $event  = $stm->fetch();

        return $event;
    }

    function update_services($desc,$id){

        $isexist = services_exist($id);

        if($isexist==""){
            $con = dbconn();
            $sql = "INSERT INTO services (services_description,EEID)VALUES(?,?)";
            $stm = $con->prepare($sql);
            if ($stm->execute(array($desc, $id))) {

                unset($_SESSION['msg']);
                $_SESSION['msg'] = "Services Successfully Updated!";
                header("location:edit-profile.php");
            }
            $con =null;
        }
        else {
            $con = dbconn();
            $sql = "UPDATE services SET services_description=? WHERE eeid=?";
            $stm = $con->prepare($sql);
            if ($stm->execute(array($desc, $id))) {

                unset($_SESSION['msg']);
                $_SESSION['msg'] = "Services Successfully Updated!";
                header("location:edit-profile.php");
            }
            $con = null;
        }
    }

    function services_exist($id){
        $con = dbconn();
        $sql = "SELECT * FROM services WHERE EEID=?";
        $stm = $con->prepare($sql);
        $stm->execute(array($id));
        $isexist = $stm->fetch();

        return $isexist['services_description'];
    }

    function get_services($id){
        $con = dbconn();
        $sql = "SELECT * FROM services WHERE eeid=?";
        $stm = $con ->prepare($sql);
        $stm->execute(array($id));

        $services  = $stm->fetch();

        return $services;
    }

    function get_all_establishment(){
        $con = dbconn();
        $sql = "SELECT * FROM entertainmentestablishment";
        $stm = $con ->prepare($sql);
        $stm->execute(array());

        $estab  = $stm->fetchAll();

        return $estab;
    }

		function get_all_ktv(){
			$con = dbconn();
			$sql = "Select * from entertainmentestablishment where categoryid = 4";
			$stm = $con->prepare($sql);
			$stm->execute(array());
			$ktv = $stm->fetchall();

			return $ktv;
		}

		function get_all_moviehouse(){
			$con = dbconn();
			$sql = "Select * from entertainmentestablishment where categoryid = 2";
			$stm = $con->prepare($sql);
			$stm->execute(array());
			$ktv=$stm->fetchall();

			return $ktv;
		}

function get_category($id){
    $con = dbconn();
    $sql = "SELECT * FROM category WHERE id=?";
    $stm = $con ->prepare($sql);
    $stm->execute(array($id));

    $cat  = $stm->fetch();

    return $cat['categoryid'];
}

function get_office_stats($open,$close){
    date_default_timezone_set('Asia/Manila');
    //61200
    $current_date = date('Y-m-d h:i:s');
   // $date_o = date('Y-m-d '.$open);
   // $date_c = date('Y-m-d '.$close);
    $date = date('Y-m-d');
    $o = strtotime($date." ".$open);
    $c = strtotime($date." ".$close);

    $diff = $c-$o;
    $a = $current_date - $o;
    $b = $current_date - $c;

    if(($a < $diff) || ($b > $diff)){
        $msg = "Sorry were Closed!";
    }else{

        $msg = "Were Still Open!";
    }

    return $msg;
}

    function get_estab($id){
        $con = dbconn();
        $sql = "SELECT * FROM entertainmentestablishment WHERE eeid=?";
        $stm = $con ->prepare($sql);
        $stm->execute(array($id));

        $estab  = $stm->fetch();

        return $estab;
   }

    function count_room_available($eeid){
        $con = dbconn();
        $sql = "SELECT * FROM room WHERE eeid=? AND room_status=2";
        $stm = $con->prepare($sql);
        $stm->execute(array($eeid));

        $estab  = $stm->fetchAll();
        $count = count($estab);
        return $count;
    }

function get_all_packages($event_owner){
	 $con = dbconn();
	 $sql = "SELECT * FROM eventbudget inner join room on eventbudget.roomid = room.roomid WHERE event_owner = ?";
	 $stm = $con->prepare($sql);
	 $stm->execute(array($event_owner));

	 $packages = $stm->fetchAll();
	 $con = null;
	 return $packages;

}

function get_all_category(){
    $con = dbconn();
    $sql = "SELECT * FROM category";
    $stm = $con ->prepare($sql);
    $stm->execute();
    $category = $stm->fetchAll();
    $con = null;
    return $category;
}

function get_enthu_history($userid){
    $con = dbconn();
    $sql = "SELECT * FROM enthusiast WHERE EnthusiastID=?";
    $stm = $con ->prepare($sql);
    $stm->execute(array($userid));
    $myuser = $stm->fetch();
    $con = null;
    return $myuser['enthusiast_name'];
}

function enthu_follow($enthuid,$estabid){
    $isexist = get_follow_stat($enthuid,$estabid);

    $con = dbconn();
    $followstat = "";
    $follow_stat = "";
    if($isexist==""){
        $follow_stat = followbtn_insert($enthuid,$estabid);
    }
    else{
        $followstat = get_follow_stat($enthuid,$estabid);
        if($followstat=="1"){
           unfollowbtn_update($enthuid,$estabid);
        }
        else{
            followbtn_update($enthuid,$estabid);
        }
    }

}

function followbtn_insert($enthuid,$estabid){
    $con = dbconn();
    $stat = "1";
    $sql = "INSERT INTO follow (user,eeid,status)values(?,?,?)";
    $stm = $con ->prepare($sql);
    if($stm->execute(array($enthuid,$estabid,$stat))){
    	header("location:index.php?id=" . $estabid);
    }

    $con = null;


}

function followbtn_update($enthuid,$estabid){
    $con = dbconn();
    $sql = "UPDATE follow Set status='1' WHERE user=? AND eeid=?";
    $stm = $con ->prepare($sql);
    if($stm->execute(array($enthuid,$estabid))){

    }
    $con = null;


}

function unfollowbtn_update($enthuid,$estabid){
    $con = dbconn();
    $sql = "UPDATE follow Set status='0' WHERE user=? AND eeid=?";
    $stm = $con ->prepare($sql);

    if($stm->execute(array($enthuid,$estabid))){

    }

    $con = null;


}

function get_follow_stat($enthuid,$estabid){
    $con = dbconn();
    $sql = "SELECT * FROM follow WHERE user=? AND eeid=?";
    $stm = $con ->prepare($sql);
    $stm->execute(array($enthuid,$estabid));
    $foll_stat = $stm->fetch();
    $con = null;
    return $foll_stat['status'];
}

function get_all_followers($estabid){
    $con = dbconn();
    $sql = "SELECT * FROM follow WHERE eeid=?";
    $stm = $con ->prepare($sql);
    $stm->execute(array($estabid));
    $foll_stat = $stm->fetch();
    $con = null;
    return $foll_stat['status'];
}

function get_count_cancel($eeid, $res_stat){
    $con = dbconn();
    $sql = "SELECT count(reservation_status) AS cnt_cancel FROM reservation WHERE eeid=? AND reservation_status=?";
    $stm = $con ->prepare($sql);
    $stm->execute(array($eeid,$res_stat));
    $userfollower = $stm->fetch();
    $con = null;
    return $userfollower['cnt_cancel'];
}

function get_view_all_followers($enthuid){
    $con = dbconn();
    $sql = "SELECT * FROM enthusiast WHERE EnthusiastID=?";
    $stm = $con ->prepare($sql);
    $stm->execute(array($enthuid));
    $userfollower = $stm->fetch();
    $con = null;
    return $userfollower;
}

function get_history($id){
    $con = dbconn();
    $sql = "SELECT * FROM history WHERE user=?";
    $stm = $con ->prepare($sql);
    $stm->execute(array($id));
    $h = $stm->fetchAll();
    $con = null;
    return $h;
}

function insert_feed($eeid,$enthu_id,$feedback){
    $con = dbconn();
    $sql = "INSERT INTO feedback (EEID,EnthusiastID,Feedback)values(?,?,?)";
    $stm = $con ->prepare($sql);


    if($stm->execute(array($eeid,$enthu_id,$feedback))){
        header("location:index.php?id=".$eeid);
    }

    $con = null;
}
function get_all_feedback($eeid){
    $con = dbconn();
    $sql = "SELECT * FROM feedback WHERE EEID=?";
    $stm = $con ->prepare($sql);
    $stm->execute(array($eeid));
    $feed = $stm->fetchAll();
    $con = null;
    return $feed;
}

function get_enthu($id){

    $con = dbconn();
    $sql = "SELECT * FROM enthusiast WHERE EnthusiastID=?";
    $stm = $con ->prepare($sql);
    $stm->execute(array($id));
    $enthu = $stm->fetch();

    return $enthu;
}

function ago($date){
    date_default_timezone_set('Asia/Manila');

    $current = date('Y-m-d H:i:s');

    $diff = strtotime($current)-strtotime($date);


    if($diff >= 31536000){

        $year=intval($diff/31536000);
        $msg = ($year == 1)?$year." year ago": $year." years ago";

    }
    else if($diff >= 2592000){
        $months=intval($diff/2592000);
        $msg = ($months == 1)?$months." month ago": $months." months ago";
    }
    else if($diff >= 86400){
        $days=intval($diff/86400);
        $msg = ($days == 1)?$days." day ago": $days." days ago";
    }
    else if($diff >= 3600){
        $hours=intval($diff/3600);
        $msg = ($hours == 1)?$hours." hour ago": $hours." hours ago";

    }
    else if($diff >= 60){
        $mins=intval($diff/60);
        $msg = ($mins == 1)?$mins." minute ago": $mins." minutes ago";

    }
    else{
        $secs=$diff%60;
        $msg = ($secs == 1)?$secs." second ago": $secs." seconds ago";
    }

    return $msg;

}



function getnumoffollow($eeid){
    $con = dbconn();
    $sql = "SELECT count(id) as Num_of_Followers FROM follow WHERE eeid=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($eeid));
    $user = $stm->fetch();

    return $user['Num_of_Followers'];
}

function get_related_estab($id){

    $con = dbconn();
    $sql = "SELECT * FROM entertainmentestablishment WHERE categoryid=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($id));
    $est = $stm->fetchall();

    return $est;
}
function get_all_reserve_room($roomid){

	$con = dbconn();
	$sql ="SELECT * FROM reservation  where roomid = ? and reservation_date = date(now())";
	$stm = $con->prepare($sql);
	$stm->execute(array($roomid));
	$est = $stm->fetchall();

	return $est;
}

function update_location($lat,$long,$eeid){

        $con = dbconn();
	 	$sql = "UPDATE entertainmentestablishment SET lat=?,long=? WHERE eeid=?";
	 	$stm = $con->prepare($sql);
	 	if($stm->execute(array($lat,$long,$eeid))){
            $_SESSION['msg'] = "Location Map Has been Updated!";
            header("location:edit-profile.php");
        }
	 	$con = null;
}

function insert_product($name,$price,$image,$eeid,$fullname){
$con = dbconn();
    $sql = "INSERT INTO product(product_name,product_price,product_image,eeid)VALUES (?, ?, ?, ?)";
    $stm = $con->prepare($sql);

    if ($stm->execute(array($name,$price,$image['name'],$eeid))) {

        move_uploaded_file($image['tmp_name'], 'user_files/' . $fullname . '/services/photos/' . $image['name']);
        unset($_SESSION['message']);
        $_SESSION['message'] = "New Product  Successfully Added!";
        header("location:product.php");
    }
}
function get_product($id){
    $con = dbconn();
    $sql = "SELECT * FROM product WHERE eeid=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($id));
    $product = $stm->fetchAll();

    return $product;
}
function update_product($name,$price,$image,$eeid,$fullname){
    $con = dbconn();
    $sql = "UPDATE product SET product_name=?,product_price=?,product_image=? WHERE eeid=?";
    $stm = $con->prepare($sql);

    if ($stm->execute(array($name,$price,$image['name'],$eeid))) {

        move_uploaded_file($image['tmp_name'], 'user_files/' . $fullname . '/services/photos/' . $image['name']);
        unset($_SESSION['message']);
        $_SESSION['message'] = "Product Successfully Updated!";
        header("location:product.php");
    }
}
function delete_product($id){
    $con = dbconn();
    $sql = "DELETE FROM product WHERE product_id=?";
    $stm = $con->prepare($sql);

    if($stm->execute(array($id))){
        unset($_SESSION['message']);
        $_SESSION['message'] = "Product Successfully Deleted!";
        header("location:product.php");
    }
}
function get_product_id($id){
    $con = dbconn();
    $sql = "SELECT * FROM product WHERE product_id=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($id));
    $product = $stm->fetch();

    return $product;
}

function check_reservation($eventid, $timerange, $date, $time, $eeid){
   $con = dbconn();
   $sql= "SELECT * FROM reservation WHERE eventid = ? AND reservation_date = ? AND reservation_time = ? AND eeid = ? ";
   $stm = $con->prepare($sql);
   if($stm->execute(array($eventid,$date,$time,$eeid))){
   	 $data = $stm->fetch();
   	 if($stm->rowCount() > 0){
   	 	if($data['reservation_status'] == '1'){
   	 		return false;
   	 	}else{ return true; }
	 }else{
	 	return false;
	 	/*if(check_reservation_timerange($eventid,$timerange,$date,$time,$eeid)){
	 		return false;
	 	}
	 	else{
	 		return true;
	 	}*/
	 }
   }
}

function check_reservation_timerange($eventid, $timerange, $date, $time, $eeid){
	$t_range = 0;
	$time_range = 0;
	$time2 = 0;
	$time3 = 0;
	if ($timerange == '1 Hour') {	$t_range = 1;	}
	if ($timerange == '2 Hours') {	$t_range = 2;	}
	if ($timerange == '3 Hours') {	$t_range = 3;	}
	if ($timerange == '4 Hours') {	$t_range = 4;	}
	if ($timerange == '5 Hours') {	$t_range = 5;	}
	$con = dbconn();
   $sql= "SELECT * FROM reservation WHERE eventid = ? AND reservation_date = ? AND reservation_time = ? AND eeid = ? ";
   $stm = $con->prepare($sql);
   if($stm->execute(array($eventid,$date,$time,$eeid))){
   	 $data = $stm->fetch();
   	 if ($data['reservation_timerange'] == '1 Hour') {   $time_range = 1;  }
   	 elseif ($data['reservation_timerange'] == '2 Hours') {  $time_range = 2;   }
   	 elseif ($data['reservation_timerange'] == '3 Hours') {  $time_range = 3;   }
   	 elseif ($data['reservation_timerange'] == '4 Hours') {  $time_range = 4;   }
   	 elseif ($data['reservation_timerange'] == '5 Hours') {  $time_range = 5;   }
   	 if(intval($data['reservation_time']) > 12) {  $time2 =  intval($data['reservation_time']) - 12;   }
   	 if(intval($time) > 12) {  $time3 =  intval($time) - 12;   }
   	 if(($time2 + $time_range) > $time3){  return true;  }
   	 else{ return false;  }
	}
	else{
		return false;
	}
}


function insert_reservation($eventid,$timerange,$date,$time,$enthuid,$eeid,$time2,$roomid){
    $status=4;
    $length=10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*(';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

   /* $new_date = explode("/",$date);
    $date = $new_date[2]."-".$new_date[0]."-".$new_date[1];*/
    $con = dbconn();
    $sql = "INSERT INTO reservation (eventid,reservation_date,reservation_invoice,reservation_timerange,reservation_status,EnthusiastID,eeid,reservation_time,roomid)VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
    $stm = $con->prepare($sql);

    if ($stm->execute(array($eventid,$date,$randomString,$timerange,$status,$enthuid,$eeid,$time,$roomid))) {

    	$id = $con->lastInsertId();
    	$sql2 = "INSERT INTO tbl_time_resv (attr_tr_range,attr_tr_pk_resv) VALUES (?,?)";
    	$stm2 = $con->prepare($sql2);

    	/*foreach ($time2 as $key) {
    		$stm2->execute(array($key,$id));

    	}*/
    	foreach ($time2 as $key) {
    		$timerng = checktimerange($eeid,$date,$key);
    		if ($timerng != null) {
    			$stm2->execute(array($timerng,$id));
    		}

    	}

        echo "<script>
		alert('You have Successfully Sent your Request. Once your request is confirmed, please show this reservation code to the counter.'". $randomString .");
		//-->
		</script>
		";


        header("location:monitoring.php");
    }
}

function checktimerange($eeid,$date,$time){
	$con = dbconn();
	$temptime = null;
	$exist = 1;
    $sql = "SELECT * FROM tbl_time_resv INNER JOIN reservation ON tbl_time_resv.attr_tr_pk_resv = reservation.ReservationID WHERE reservation.eeid=? AND reservation.reservation_date=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($eeid,$date));
    $res = $stm->fetchAll();
    foreach ($res as $val) {
    	if (strval($val['attr_tr_range']) == strval($time)) {
    		$exist = 0;
    	}
    }
    if($exist == 1){  $temptime = $time;  }
    return $temptime;
}

function get_reservation_by_enthu($enthuid){

	//"SELECT * FROM reservation inner join room on reservation.roomid = room.roomid inner join eventbudget on reservation.eventid = eventbudget.eventbudgetid WHERE reservation.EnthusiastID=? ORDER BY reservation.reservation_date DESC";

    $con = dbconn();
    $sql = "SELECT * FROM reservation inner join room on reservation.roomid = room.roomid inner join eventbudget on reservation.eventid = eventbudget.eventbudgetid WHERE reservation.EnthusiastID=? ORDER BY reservation.reservation_date DESC";
    $stm = $con->prepare($sql);
    $stm->execute(array($enthuid));
    $res = $stm->fetchAll();

    return $res;
}

function geteventroom($eventid){
	$con = dbconn();
	$sql = "Select eventbudget_name from eventbudget where eventbudgetid = ? limit 1";
	$stm = $con->prepare($sql);
	$stm->execute(array($eventid));
	$res = $stm->fetch();

	return $res;
}

function get_estab_name($eeid){
    $con = dbconn();
    $sql = "SELECT * FROM entertainmentestablishment WHERE eeid=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($eeid));
    $res = $stm->fetch();

    return $res['establishment_name'];
}

function get_reservation_by_resv_code($code){
	$con =  dbconn();
	$sql = "SELECT * FROM reservation WHERE reservation_invoice = ?";
	$stm = $con->prepare($sql);
	$stm->execute(array($code));
	$res = $stm->fetchAll();

	return $res;
}

function get_reservation_by_estab($id){
    $con = dbconn();
    $sql = "SELECT * FROM reservation WHERE eeid=? AND reservation_status = 4";
    $stm = $con->prepare($sql);
    $stm->execute(array($id));
    $res = $stm->fetchAll();

    return $res;
}

function get_enthu_name($id){
    $con = dbconn();
    $sql = "SELECT * FROM enthusiast WHERE EnthusiastID=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($id));
    $res = $stm->fetch();

    return $res;
}

function get_reservation_status($id){
    $con = dbconn();
    $sql = "SELECT * FROM reservation_statuses WHERE status=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($id));
    $res = $stm->fetch();

    return $res;
}

function get_package_name($id){
	$con = dbconn();
	$sql = "SELECT * FROM eventbudget WHERE eventbudgetid = ?";
	$stm = $con->prepare($sql);
	$stm->execute(array($id));
	$res = $stm->fetch();
        return $res['eventbudget_name'];
}

function get_package_roomid($id){
	$con = dbconn();
	$sql = "SELECT * FROM eventbudget WHERE eventbudget_name = ?";
	$stm = $con->prepare($sql);
	$stm->execute(array($id));
	$res = $stm->fetch();
        return $res['roomid'];
}

function update_reservation($status,$resid){
    $con = dbconn();
    $sql = "UPDATE reservation SET reservation_status=? WHERE ReservationID=?";
    $stm = $con->prepare($sql);
    if($stm->execute(array($status,$resid))){
        //header("location:dashboard.php");
    }
    $con = null;
}

function counthour($eeid,$time,$date,$package){
    $con = dbconn();
    //$check = true;
    $cnt = 0;
    $start_cnt_res = 0;
    $i = 0;
    //$i2 = 0;
    $time_array[] = null;
    $res_array[] = null;
    /*$sql = "SELECT * FROM reservation WHERE eeid=? AND reservation_date=?";*/
    $sql = "SELECT * FROM tbl_time_resv INNER JOIN reservation ON tbl_time_resv.attr_tr_pk_resv = reservation.ReservationID WHERE reservation.eeid=? AND reservation.reservation_date=? AND reservation.eventid=? AND reservation.reservation_status='4'";
    $stm = $con->prepare($sql);
    $stm->execute(array($eeid,$date,$package));
    $res = $stm->fetchAll();
    foreach ($time as $val) {
    	$time_array[] = $val;
    }
    $cnt = count($time);
    if ($res!=null) {
    	$cnt = 0;
    	foreach ($res as $key){
    		$res_array[] = $key['attr_tr_range'];
    		//$cnt_res++;
    	}
    	//if (count($time_array) > count($res_array)) {
	    	for ($j=1; $j < count($time_array); $j++) {
	    		/*if (strval($time_array[$j]) == strval($res_array[$i])) {
	    			$i++;
	    			if ($i >= count($res_array)) {
	    				$i = count($res_array) - 1;
	    			}
	    		}
	    		else{
	    			$cnt++;
	    		}*/
    			$seen = 0;
	    		for ($k=1; $k < count($res_array); $k++) {
	    			if (strval($time_array[$j]) == strval($res_array[$k])) {
	    				$seen = 1;
	    			}
	    		}
	    		if($seen != 1){  $cnt++;  }
	    	}
    	/*echo "<script>alert('".$res_array[1]."')</script>";*/
    	//}
    	/*else{
    		for ($j=0; $j < count($res_array); $j++) {
	    		if (strval($res_array[$j]) == strval($time_array[$i])) {
	    			$i++;
	    			//if ($i >= count($res_array)) {
	    			//	$i = count($res_array) - 1;
	    			//}
	    		}
	    		else{
	    			$cnt++;
	    		}
	    	}
    	}*/
    }
    else{
    	$cnt = 0;
    	for ($i=0; $i < count($time); $i++) {
    		$cnt++;
    	}
    }
    $con = null;

    //return $time_array[1];
    //return $check;
    //return implode(", ", $res_array);
    return $cnt;
}

function checktime($eeid,$time,$date){
    $con = dbconn();
    //$check = true;
    $cnt = 0;
    $start_cnt_res = 0;
    $i = 0;
    $gettime1 = '';
    //$i2 = 0;
    /*$sql = "SELECT * FROM reservation WHERE eeid=? AND reservation_date=?";*/
    $sql = "SELECT * FROM tbl_time_resv INNER JOIN reservation ON tbl_time_resv.attr_tr_pk_resv = reservation.ReservationID WHERE reservation.eeid=? AND reservation.reservation_date=?";
    $stm = $con->prepare($sql);
    $stm->execute(array($eeid,$date));
    $res = $stm->fetchAll();
    $time_array[] = null;
    foreach ($time as $val) {
    	$time_array[] = $val;
    }
    $time1 = strval($time_array[1]);
    if ($res!=null) {
    	$res_array[] = null;
    	foreach ($res as $key){
    		$res_array[] = $key['attr_tr_range'];
    		//$cnt_res++;
    	}
    	for ($j=0; $j < count($time_array); $j++) {
    		$seen = 0;
    		for ($i=0; $i < count($res_array); $i++) {
    	/*echo "<script>alert('shit');</script>";*/
    			if(strval($time_array[$j]) == strval($res_array[$i])){
    				$seen = 1;
    			}
    		}
    		if($seen != 1){  $time1 = strval($time_array[$j]);  break; }
    		/*if (strval($time_array[$j]) == strval($res_array[$i])) {
    			$i++;
    			//if ($i >= count($res_array)) {
    			//	$i = count($res_array) - 1;
    			//}
    		}
    		else{
    			$time1 = strval($time_array[$j]);
    			break;
    		}*/

    	}
    }
    else{
    	$time1 = strval($time_array[1]);
    }
    $con = null;

    //return $time_array[1];
    //return implode("", $time_array);
    return $time1;
}

function upload_room($room_name,$room_capacity,$room_image,$room_status,$room_price,$fullname){
	$con = dbconn();
	$roomname = $room_image['name'];

     $sql = "INSERT INTO room(room_name,room_capacity,room_image,room_status,room_price,eeid)VALUES(?, ?, ?, ?, ?, ?)";
     $stm = $con->prepare($sql);

     if ($stm->execute(array($room_name,$room_capacity,$room_image['name'],$room_status,$room_price,$_SESSION['eeid']))) {
      //if ($stm->execute(array($room_name,$room_capacity,$roomname,$room_status,$room_price,$_SESSION['eeid']))) {

          /* move_uploaded_file($room_image['tmp_name'], 'user_files/' . $fullname . '/room/' . $room_image['name']);*/
          // if (!(file_exists($roompath.'/'.$roomname))) {
         move_uploaded_file($room_image['tmp_name'],'user_files/'.$fullname.'/room/'.$room_image['name']);
               //move_uploaded_file($room_image['tmp_name'],'chillaxr/user_files-enthu/'.$fullname.'/room/'.$room_image['name']);

          // }
         unset($_SESSION['message']);
         $_SESSION['message'] = "New Room Successfully Added!";
         header("location:room.php");
       }
       else
       	{  echo "<script>alert(room name);</script>";   }
}
?>
