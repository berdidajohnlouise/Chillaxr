<?php

      if(isset($_POST['upload_event'])){
      		include('dbconn.php');
          $name= $_POST['event_name'];
		      $room=$_POST['room'];
					$packageimage = $_FILES['package_image'];
          $description= $_POST['event_desc'];
          $time_range = $_POST['time_range'];
          $price= $_POST['event_price'];

	/*
		$sql1 = "SELECT * FROM eventbudget WHERE event_owner=?";
		$stm1 = $con->prepare($sql1);
		$stm1->execute(array($user['eeid']));
		$event_count = $stm1->fetch();

			$sql2 = "SELECT room_capacity FROM room WHERE room_name=? ";
			$stm2 = $con->prepare($sql2);
			$stm2->execute(array($rmname));
			$cap = $stm2->fetch();*/

		//if(count($event_count) != 0){

			// $cap = getcap($rmname);


			$sql = "INSERT INTO eventbudget (eventbudget_name,eventbudget_description,eventbudget_price,eventbudget_image,roomid,event_owner,time_range)VALUES (?,?,?,?,?,?,?)";
            $stm = $con->prepare($sql);

            if ($stm->execute(array($name,$description,$price,$packageimage['name'],$room,$eeid,$time_range))) {

                move_uploaded_file($packageimage['tmp_name'],'Images/'.$packageimage['name']);
                unset($_SESSION['message']);
                $_SESSION['message'] = "New Event Budget Successfully Added!";

			        $sql = "UPDATE room SET room_status=1 WHERE roomid=?";
			        $stm = $con ->prepare($sql);
			        $stm->execute(array($room));

                header("location:event-budget.php");
            }
		//}

	}

?>
