<?php 
	if(!isset($_SESSION['eeid'])){
		echo "<script language='JavaScript' type='text/JavaScript'>
		<!--
		alert('You must Login!');
		//-->
		</script>
		";

		echo "<script language='JavaScript' type='text/JavaScript'>
		<!--
		window.location='login.php';
		//-->
		</script>
		";
		exit();
	}
?>


