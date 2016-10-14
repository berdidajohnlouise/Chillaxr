<?php 
	include 'dbconn.php';
	include 'session-enthu.php';
	
	$enthusiast_status=true;
	$enthusiast_username_err="";
	$enthusiast_password_err = "";
	$cpassword_err = "";
	$enthusiast_name_err = "";
	$enthusiast_contact_err = "";
	$enthusiast_email_err = "";
	$enthusiast_address_err = "";
	//$paypal_err = "";
	$birthdate_err = "";
	//$agree_err = "";
	$birthdate = "";
	$age_err="";
	//$agree="";	

	if(isset($_POST['submit'])){
		$enthusiast_username = $_POST['enthusiast_username'];
		$enthusiast_password = $_POST['enthusiast_password'];
		$cpassword = $_POST['cpassword'];
		$enthusiast_name = $_POST['enthusiast_name'];
		$enthusiast_contact = $_POST['enthusiast_contact'];
		$enthusiast_email = $_POST['enthusiast_email'];
		$enthusiast_address = $_POST['enthusiast_address'];
		$enthusiast_contact = $_POST['enthusiast_contact'];
		//$paypal = $_POST['paypal'];
		$gender = $_POST['gender'];
		$birthdate = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
		
		//@$agree = $_POST['agree'];

		$age = getage($birthdate);

		

		if(empty($enthusiast_username)){

			$enthusiast_username_err = "Please enter your username!";
			$enthusiast_status=false;
			
		}elseif(strlen($enthusiast_username)<7){
				$enthusiast_username_err = "Username must have atleast 6 chars!";
				$enthusiast_status=false;
			}
		
		if(empty($enthusiast_password)){
			$enthusiast_password_err = "Please enter your password!";
			$enthusiast_status=false;
		}

		if(empty($cpassword)){
			$cpassword_err = "Please confirm your password!";
			$enthusiast_status=false;
		}elseif($enthusiast_password !== $cpassword){
			$enthusiast_password_err = "Password did not match!";	
			$enthusiast_status=false;
		}

		if(empty($enthusiast_name)){
			$enthusiast_name_err = "Please enter your Establishment Name!";
			$enthusiast_status=false;
		}
		if(empty($enthusiast_contact)){
			$enthusiast_contact_err = "Invalid contact number!";
			$enthusiast_status=false;
		}

		if(empty($enthusiast_email)){
			$enthusiast_email_err = "Please enter your Establishment Email Add!";
			$enthusiast_status=false;
		}

		if(empty($enthusiast_address)){
			$enthusiast_address_err = "Please enter your address!";
			$enthusiast_status=false;
		}

		


		

		if($age < 18){
			$age_err = "You must be 18 years old and above!";
			$enthusiast_status=false;
		}



		



		if($enthusiast_status){

			include 'dbconn.php';
			$pic = 'gravatar.jpg';
			$enthusiast_password = MD5($enthusiast_password);
			$sql = "INSERT INTO enthusiast(enthusiast_username,enthusiast_password,enthusiast_name,enthusiast_contact,enthusiast_email,enthusiast_address,enthusiast_sex,enthusiast_bday,enthusiast_image)values(?,?,?,?,?,?,?,?,?)";
			$stm = $con->prepare($sql);
			
			if($stm->execute(array($enthusiast_username,$enthusiast_password,$enthusiast_name,$enthusiast_contact,$enthusiast_email,$enthusiast_address,$gender,$birthdate,$pic))){
					$_SESSION['enthusiast_username'] = $enthusiast_username;

					$sql1 = "SELECT * FROM enthusiast where enthusiast_username = ? and enthusiast_password=?";
					$stm1 = $con->prepare($sql1);
					$stm1->execute(array($enthusiast_username,$enthusiast_password));
					$res = $stm1->fetch();

					$_SESSION['id'] = session_id();
					$_SESSION['enthu_id'] = $res['EnthusiastID'];
					$dir = getcwd();
					$fullname = ucfirst($enthusiast_name);
					
					if(mkdir($dir."/user_files-enthu/$fullname",0777)){
						if(mkdir($dir."/user_files-enthu/$fullname/announcement",0777)){
							mkdir($dir."/user_files-enthu/$fullname/announcement/photo",0777);
						}
						mkdir($dir."/user_files-enthu/$fullname/promo",0777);
						if(mkdir($dir."/user_files-enthu/$fullname/services",0777)){
							mkdir($dir."/user_files-enthu/$fullname/services/photos",0777);
						}
						mkdir($dir."/user_files-enthu/$fullname/room",0777);
						mkdir($dir."/user_files-enthu/$fullname/profile_pic",0777);

					}

                   echo $sql; // 2nd step sa error tracing.. iya e echo ang SQL query nmo. ang g echo copy.ha dayun e paste sa phpmyadmin sql query e run f naa bay error or wala. f walay error ma insert to ang value sa imung query.
					header("Location: profile-enthu.php");
					$_SESSION['message'] = $message;
					
			}else{
				print_r($stm->errorInfo());
			}

			$con = null;
		}


	}

?>
