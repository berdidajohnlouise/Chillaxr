<?php 
	include 'session.php';
	include 'dbconn.php';

	require 'checksession.php';
	$msg = "";

 function createHours($id='hours_select', $selected=null)
                              {
                                     /*** range of hours ***/
                                     $r = range(1, 12);

                                 /*** current hour ***/
                                   $selected = is_null($selected) ? date('h') : $selected;

                                    $select = "<select name=\"$id\" id=\"$id\">\n";
                                      foreach ($r as $hour)
                                      {
                                         $select .= "<option value=\"$hour\"";
                                         $select .= ($hour==$selected) ? ' selected="selected"' : '';
                                          $select .= ">$hour</option>\n";
                                      }
                                   $select .= '</select>';
                                 return $select;
                               }

 
                            function createMinutes($id='minute_select', $selected=null)
                                {
                                         /*** array of mins ***/
                                         $minutes = array(0, 15, 30, 45);

                                     $selected = in_array($selected, $minutes) ? $selected : 0;

                                         $select = "<select name=\"$id\" id=\"$id\">\n";
                                         foreach($minutes as $min)
                                     {
                                            $select .= "<option value=\"$min\"";
                                            $select .= ($min==$selected) ? ' selected="selected"' : '';
                                            $select .= ">".str_pad($min, 2, '0')."</option>\n";
                                      }
                                         $select .= '</select>';
                                   return $select;
                                 }

                  
                               function createAmPm($id='select_ampm', $selected=null)
                                {
                                        $r = array('AM', 'PM');


                                        /*** set the select minute ***/
                                    $selected = is_null($selected) ? date('A') : strtoupper($selected);

                                     $select = "<select name=\"$id\" id=\"$id\">\n";
                                      foreach($r as $ampm)
                                      {
                                         $select .= "<option value=\"$ampm\"";
                                         $select .= ($ampm==$selected) ? ' selected="selected"' : '';
                                          $select .= ">$ampm </option>\n";
                                       }
                                      $select .= '</select>';
                                       return $select;
                                    }

	if(isset($_SESSION['eeid'])){

		$eeid = $_SESSION['eeid'];

		$sql = "SELECT * FROM entertainmentestablishment WHERE eeid=?";
		$stm = $con->prepare($sql);
		$stm->execute(array($eeid));
		$user = $stm->fetch();
		$seller = $_SESSION['id'] = $user['eeid'];
		$fullname = ucfirst($user['establishment_name']);
		$con = null;

		//$exp_bday = explode("-", $user['bday']);
		//$b_year = $exp_bday[0];
		//$b_month = $exp_bday[1];
		//$b_day = $exp_bday[2];
	
	if(isset($_POST['update'])){
		include 'dbconn.php';
		$eeid = $user['eeid'];
		$name = $_POST['name'];
		$contact= $_POST['contact'];
		
		$email = $_POST['email'];
		$owner = $_POST['owner'];
		$eelat = $_POST['eelat'];
		//$eelong = $_POST['eelong'];
		$paypal = $_POST['paypal'];
		//$categoryid = $_POST['categoryid'];
		
		
		$new_fullname = ucfirst($name);

 
		$sql = "UPDATE entertainmentestablishment SET establishment_name=?,establishment_contact=?,establishment_email=?,establishment_owner=?,establishment_address=?,establishment_paypal=?  WHERE eeid=$eeid";

		$stm = $con->prepare($sql);
		if($stm->execute(array($name,$contact,$email,$owner,$eelat,$paypal))){
			rename("user_files/".$fullname."/", "user_files/".$new_fullname."/");

			unset($_SESSION['msg']);
			$msg = "Your Profile is has been Updated!";
			$_SESSION['msg'] = $msg;
			header("location:edit_profile.php");
		}else{
			unset($_SESSION['msg']);
			$msg = "Failed to Update Profile!";
			$_SESSION['msg'] = $msg;
			header("location:edit_profile.php");
		}
	}

	if(isset($_POST['upload'])){
		include 'dbconn.php';
		$pic = $_FILES['file'];
		$eeid = $user['eeid'];


		 move_uploaded_file($pic['tmp_name'], 'user_files/'.$fullname.'/profile_pic/'.$pic['name'] );

		$sql = "UPDATE entertainmentestablishment SET establishment_image=? WHERE eeid=$eeid";
		$stm = $con->prepare($sql);
		if($stm->execute(array($pic['name']))){
			unset($_SESSION['msg']);
			$msg = "Your Profile Picture has been Updated!";
			$_SESSION['msg'] = $msg;
			header("location:edit_profile.php");
			

		}else{
			unset($_SESSION['msg']);
			$msg = "Failed to Update Picture!";
			$_SESSION['msg'] = $msg;
			header("location:edit_profile.php");
		}
	}
	
		
	}


	$con = null;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Edit Profile</title>

	<meta name="description" content="Source code generated using layoutit.com">
	<meta name="author" content="LayoutIt!">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	

  </head>
  <body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
				<div class="col-md-12">
					
					<div class="row">
						<div class="col-md-8">
								<?php include('main-menu.php');?>
						</div>
					</div>
					<br><br><br><br><br><br>
					<div class="row">
						
							
						<?php if(isset($_SESSION['msg'])){?>	
						<div width="100%">

								<div class="alert alert-success" class="center">
									<p class="text-center"><?php echo $_SESSION['msg'];?></p>
								</div>
							</div>
							<?php } ?>
						<div class="col-md-3">
						</div>
						   <div class="col-md-8">
						   	

                            <form class="form-horizontal" role="form"   method="POST" enctype="multipart/form-data">
                                 <div class="page-header" style="margin-top:5px;"><h4> Edit Profile </h4>
                               </div>

                                <div class ="form-group">

                                <label for="pic" class="col-sm-3 control-label-left">
                                Change Profile Picture
                                </label>
                                    <div class="col-sm-8">
                                    <input type="file" name="file" value="profile_avatar/<?php echo $user['establishment_image']; ?>" required/><br>
                                    <button type="submit" name="upload" class="btn btn-success" >
                                            Update Picture
                                        </button>
                                    </div>

                              </div>
                            </form>
							<form class="form-horizontal" role="form"   method="POST">
											
								<div class="form-group">
									 
									<label for="name" class="col-sm-3 control-label-left">
									Establishment Name
									</label>
									<div class="col-sm-5">
									<input class="form-control" id="name" type="text" name="name" placeholder="Entertainment Establishment" value="<?php echo $user['establishment_name'];?>" >
									</div>	
									
								</div>


								<div class="form-group">
									 
									<label for="contact" class="col-sm-3 control-label-left">
										Contact No.
									</label>
									<div class="col-sm-5">
									<input class="form-control" id="contact" type="text" name="contact" placeholder="Contact No." value="<?php echo $user['establishment_contact'];?>" >
									</div>	
									
								</div>

                                      
								
								<div class="form-group">
									 
									<label for="inputEmail3" class="col-sm-3 control-label-left">
										Email
									</label>
									<div class="col-sm-5">
										<input class="form-control" id="inputEmail3" type="email" name="email" placeholder="Email" value="<?php echo $user['establishment_email'];?>">

										</div>	
									
								</div>


								<div class="form-group">
									 
									<label for="owner" class="col-sm-3 control-label-left">
										Owner Name
									</label>
									<div class="col-sm-5">
										<input class="form-control" id="owner" type="text" name="owner" placeholder="Owner Name" value="<?php echo $user['establishment_owner'];?>" >
										</div>	
									

								</div>

								 

								<div class="form-group">
									 
									<label for="eelat" class="col-sm-3 control-label-left">
										Establishment Address
									</label>
									<div class="col-sm-5">
										<input class="form-control" id="eelat" type="text" name="eelat" placeholder="Establishment Address" value="<?php echo $user['establishment_address'];?>">
										</div>	
									
								</div>

								
                                     

								<div class="form-group">
									<label for="paypal" class="col-sm-3 control-label-left">
										PayPal Account
									</label>
									<div class="col-sm-5">
									<input class="form-control" id="paypal" type="text" name="paypal" placeholder="Paypal " value="<?php echo $user['establishment_paypal'];?>" >
									</div>	
								</div>

						 <!--<div class="form-group">
                                  <label for="category" class="col-sm-3 control-label-left">
                                     Type of Establishment
                                   </label>
                                   <div class="col-sm-5" class="select" >
                                    <select name="category"  value="<?php //echo $user ['category'];?>">
                                       <option id="category1" value="Movie House" size="5" >Movie House  </option>
                                        <option id="category2" value="KTV Studio"  >KTV Studio       </option>
                                        <option id="category3" value="Gaming Studio"  >Gaming Studio        </option>
                                    </select>
                                  </div>     
                              </div>-->




	

							
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-5">
										 
										<button type="submit" name="update" class="btn btn-success" data-toggle="modal" data-target="#mymodal">
											Update Profile
										</button>
									</div>
								</div>
							</form>
						
						<div class="col-md-1">class="btn btn-block waves-effect waves-light orange lighten-8 right"
						</div>
					</div>
				</div>

				</div>
				</div>
			</div>
			
		</div>		
	</div>
</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
  </body>
</html>