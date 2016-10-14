<?php 
	if(!isset($_SESSION['enthu_id'])){

		echo "<script language='JavaScript' type='text/JavaScript'>
		alert('You must Login Enthu');
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


