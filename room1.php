    <?php
	
	      if(isset($_POST['upload_rooms'])){

          $room_name= 	$_POST['room_name'];
          $room_capacity=	$_POST['room_capacity'];
          $room_image= 	$_FILES['room_image'];
          $room_status= $_POST['room_status'];
          $room_price= 		$_POST['room_price'];

          $roomname = $room_image['name'];
            //  print_r($room_image);

            /* // $roomname = '';
              $roompath = 'user_files/' . $fullname . '/room';

              $roomtype = $room_image['type'];
              $rtype = '';*/

              /*if($roomtype == 'image/jpeg'){
                  $rtype = '.jpeg';
              }
              else if ($roomtype == 'image/jpg') {
                  $rtype = '.jpg';
              }
              else if ($roomtype == 'image/png') {
                  $rtype = '.png';
              }*/
              /*$roomname = $room_image['name'].$rtype;*/

              /*if (!(file_exists($roompath.'/'.$room))) {

                  move_uploaded_file($pic, $filepath.'/'.$mypic);

              }*/


      $sql = "INSERT INTO room(room_name,room_capacity,room_image,room_status,room_price,eeid)VALUES(?, ?, ?, ?, ?, ?)";
      $stm = $con->prepare($sql);

       if ($stm->execute(array($room_name,$room_capacity,$room_image['name'],$room_status,$room_price,$_SESSION['eeid']))) {
      //if ($stm->execute(array($room_name,$room_capacity,$roomname,$room_status,$room_price,$_SESSION['eeid']))) {

          /* move_uploaded_file($room_image['tmp_name'], 'user_files/' . $fullname . '/room/' . $room_image['name']);*/
          // if (!(file_exists($roompath.'/'.$roomname))) {

           move_uploaded_file($room_image['tmp_name'],'user_files/'.$fullname.'/room/'.$room_image['name']);
               //move_uploaded_file($room_image['tmp_name'],'chillaxr/user_files-enthu/'.$fullname.'/room/'.$room_image['name']);

          // }
           //unset($_SESSION['message']);
           $_SESSION['message'] = "New Room Successfully Added!";
           header("location:room.php");
       }//  else{ echo $stm->execute(array($room_name, $room_capacity, $room_image['name'], $room_status, $room_price, $_SESSION['eeid'])); }
       else
        {  echo "<script>alert('failed');</script>";   }

	}


?>