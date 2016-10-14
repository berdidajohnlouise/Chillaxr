<?php
	include 'dbconn.php';
	include 'session.php';

	$status=true;
	$username_err="";
	$password_err = "";
	$cpassword_err = "";
	$name_err = "";
	$contact_err = "";
	$email_err = "";
	$owner_err = "";
	$eelat_err = "";
	//$eelong_err = "";
//	$paypal_err = "";
	$category_err = "";
	$sub_err="";
	//$agree_err = "";
	//$agree="";

$timeopen = $timeclose = '';
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$name = $_POST['name'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$owner = $_POST['owner'];
		$eelat = $_POST['eelat'];
		//$eelong = $_POST['eelong'];
		//$paypal = $_POST['paypal'];
	    $category= $_POST['category'];
	    $timeopen = $_POST['timeopen'];
	    $timeclose = $_POST['timeclose'];
	    //$sub= $_POST['sub'];

	//	@$agree = $_POST['agree'];



		if(empty($username)){

			$username_err = "Please enter your username!";
			$status=false;

		}elseif(strlen($username)<7){
				$username_err = "Username must have atleast 6 chars!";
				$status=false;
			}

		if(empty($password)){
			$password_err = "Please enter your password!";
			$status=false;
		}

		if(empty($cpassword)){
			$cpassword_err = "Please confirm your password!";
			$status=false;
		}elseif($password !== $cpassword){
			$password_err = "Password did not match!";
			$status=false;
		}

		if(empty($name)){
			$name_err = "Please enter your Establishment Name!";
			$status=false;
		}
		if(empty($contact)){
			$contact_err = "Invalid contact number!";
			$status=false;
		}

		if(empty($email)){
			$email_err = "Please enter your Establishment Email Add!";
			$status=false;
		}

		if(empty($owner)){
			$owner_err = "Please enter Owner Name!";
			$status=false;
		}

         if(empty($eelat)){
           $eelat_err= "Please enter the adress!";
         	$status=false;
         }



		// if(empty($paypal)){
		// 	$paypal_err = "Please enter your paypal account!";
		// 	$status=false;
		// }



		if(empty($category)){
			$category_err = "Please enter type of establishment!";
			$status=false;
		}

		// 	if(empty($sub)){
		// 	$sub_err = "Please enter type of subscription!";
		// 	$status=false;
		// }


		if($status){

			include 'dbconn.php';
			$pic = 'gravatar.jpg';
			$password = MD5($password);
			$sql = "INSERT INTO entertainmentestablishment(username,password,establishment_name,establishment_contact,establishment_email,establishment_owner,establishment_address,establishment_timeopen,establishment_timeclose,categoryid,establishment_image)values(?,?,?,?,?,?,?,?,?,?,?)";
			$stm = $con->prepare($sql);

			if($stm->execute(array($username,$password,$name,$contact,$email,$owner,$eelat,$timeopen,$timeclose,$category,$pic))){

					$stm = "SELECT * FROM entertainmentestablishment WHERE username=? AND password=?";
					$query = $con->prepare($stm);
					$query->execute(array($username,$password));
					$result = $query->fetch();

					$_SESSION['id'] = session_id();
					$_SESSION['eeid'] = $result['eeid'];
					$dir = getcwd();
					$fullname = ucfirst($name);

					if(mkdir($dir."/user_files/$fullname",0777)){
						if(mkdir($dir."/user_files/$fullname/announcement",0777)){
							mkdir($dir."/user_files/$fullname/announcement/photo",0777);
						}
						mkdir($dir."/user_files/$fullname/promo",0777);
						if(mkdir($dir."/user_files/$fullname/services",0777)){
							mkdir($dir."/user_files/$fullname/services/photos",0777);
						}
						mkdir($dir."/user_files/$fullname/text",0777);
						mkdir($dir."/user_files/$fullname/profile_pic",0777);
                        mkdir($dir."/user_files/$fullname/room",0777);



					}



                   echo $sql; // 2nd step sa error tracing.. iya e echo ang SQL query nmo. ang g echo copy.ha dayun e paste sa phpmyadmin sql query e run f naa bay error or wala. f walay error ma insert to ang value sa imung query.
					header("Location: dashboard.php");
					$_SESSION['message'] = $message;

			}else{
				print_r($stm->errorInfo());
			}

			$con = null;
		}


	}
	//print_r($_POST); // 1st step sa error tracing. iya e print ang value sa imung form.


?>
