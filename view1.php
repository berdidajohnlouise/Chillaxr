<?php

	

	
	unset($_SESSION['msg']);

	if(isset($_SESSION['mem_id'])){

		$mem_id = $_SESSION['mem_id'];
		$user = getuser($mem_id);
		$seller = $_SESSION['id'] = $user['mem_id'];
		



	}

?>