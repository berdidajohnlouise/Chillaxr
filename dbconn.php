<?php

	try{

		$con = new PDO("mysql://host=localhost;dbname=chillaxr;",'root','');

	}catch(PDOException $err){
		$err = "Failed to connect database";
		echo $err;
	}

?>
