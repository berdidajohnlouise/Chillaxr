<?php 
	
	
	 	
      if(isset($_POST['upload_event'])){
          $name= $_POST['name'];
          $description= $_POST['description'];
          $price= $_POST['price'];
 						
		
		$sql1 = "SELECT * FROM eventbudget WHERE event_owner=? ";
		$stm1 = $con->prepare($sql1);
		$stm1->execute(array($user['mem_id']));
		$event_count = $stm1->fetchAll();


		if(count($event_count) != 0){
					 $sql = "INSERT INTO eventbudget (name, description, price,event_owner)VALUES (?,?,?,?)";
            $stm = $con->prepare($sql);
           if ($stm->execute(array($name,$description,$price,$_SESSION['mem_id'])));
		

		
		

				
				$_SESSION['alertmsg_event'] = "Event Data Successfully Posted!";
			

		}else{

			$invalid_event=true;
				$_SESSION['alertmsg_event'] = "Event Already exist!";
		}

	}

?> 