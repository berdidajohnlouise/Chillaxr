<?php
	

	if(isset($_POST['loginenthu'])){
		
		$enthusiast_username = $_POST['enthusiast_username'];
		$enthusiast_password = $_POST['enthusiast_password'];

		loginenthu($enthusiast_username,$enthusiast_password);
	}
	

?>