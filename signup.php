
<?php
  include 'function.php';
  include 'signupexec.php';
  include'loginck.php';

?>


<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Subscriber</title>

 <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

<style>
    body
    {
      background:url(home.jpg) ;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;

    }


  </style>
</head>

<body >
  <center><h2 style="color:white"><b>chillaxr Registration Form</b> </h2></center>
	 <p><br></p>



<div class="container">
<div class="row">
<div class="col-md-15">
<div class="panel panel-default">
  <div class="panel-body">

   <div class="page-header" style="margin-top:5px;"><h4>Register Now </h4>
       <small> Fill up the needed information below:</small> </div>
   <form class="form-horizontal" role="form"   method="POST">

            <div class="form-group <?php if(!empty($username_err)){ ?> has-error has-feedback <?php }  ?>">

              <label for="username" class="col-sm-2 control-label " >
                Username
              </label>
              <div class="col-sm-5">

                <input class="form-control" id="username" type="text" name="username" placeholder="Username" style="border-color:
                <?php if(!empty($password_err)){ echo "red";} ?>" value="<?php if(isset($username)){echo $username;}?>" >
              </div>


              <div class="col-sm-5" >
                <?php if(!empty($username_err)){ ?>
                <label class="control-label" >
                <span class="glyphicon glyphicon-exclamation-sign" class="err"></span>&nbsp;<?php echo $username_err;?>
                </label>
                <?php } ?>
              </div>
            </div>

            <div class="form-group <?php if(!empty($password_err)){ echo "has-error"; echo " has-feedback"; }?>">

              <label for="password" class="col-sm-2 control-label text-left">
                Password
              </label>
              <div class="col-sm-5">
                <input class="form-control" id="password" type="password" name="password" placeholder="Password" value="" style="border-color:
                <?php if(!empty($password_err)){ echo "red";} ?>">
              </div>
              <div class="col-sm-5">
                <?php if(!empty($password_err)){ ?>
                <label class="control-label">
                <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<?php echo $password_err;?>
                </label>
                <?php } ?>
              </div>
            </div>
            <div class="form-group <?php if(!empty($cpassword_err)){ echo "has-error"; echo " has-feedback"; }?>">

              <label for="cpassword" class="col-sm-2 control-label">
                Confirm Password
              </label>
              <div class="col-sm-5">
                <input class="form-control" id="cpassword" type="password" name="cpassword" placeholder="Confirm Password" value="" style="border-color:
                <?php if(!empty($cpassword_err)){ echo "red";} ?>">
                </div>
              <div class="col-sm-5">
                <?php if(!empty($cpassword_err)){ ?>
                <label class="control-label">
                <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<?php echo $cpassword_err;?>
                </label>
                <?php } ?>
              </div>
            </div>

            <div class="form-group <?php if(!empty($name_err)){ echo "has-error"; echo " has-feedback"; }?>">

              <label for="name" class="col-sm-2 control-label">
                Establishment Name
              </label>
              <div class="col-sm-5">
                <input class="form-control" id="name" type="text" name="name" placeholder="Establishment Name" value="<?php if(isset($name)){echo $name;}?>" style="border-color:<?php if(!empty($fname_err)){ echo "red";} ?>" >
                </div>
              <div class="col-sm-5">
                <?php if(!empty($name_err)){ ?>
                <label class="control-label">
                <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<?php echo $name_err;?>
                </label>
                <?php } ?>
              </div>
            </div>


              <div class="form-group <?php if(!empty($contact_err)){ echo "has-error"; echo " has-feedback"; }?>">

              <label for="contactno" class="col-sm-2 control-label">
                Contact-No.
              </label>
              <div class="col-sm-5">
                <input class="form-control" id="contact" type="text" name="contact" placeholder="Contact Number" value="<?php if(isset($contact)){echo $contact;}?>" style="border-color:<?php if(!empty($contact_err)){ echo "red";} ?>">
                </div>
              <div class="col-sm-5">
                <?php if(!empty($contact_err)){ ?>
                <label class="control-label">
                <span class="glyphicon glyphicon-exclamation-sign">&nbsp;</span><?php echo $contact_err;?>
                </label>
                <?php } ?>
              </div>
            </div>

              <div class="form-group <?php if(!empty($email_err)){ echo "has-error"; echo " has-feedback"; }?>">

              <label for="inputEmail3" class="col-sm-2 control-label">
                Email
              </label>
              <div class="col-sm-5">
                <input class="form-control" id="inputEmail3" type="email" name="email" placeholder="Email" value="<?php if(isset($email)){echo $email;}?>" style="border-color:<?php if(!empty($email_err)){ echo "red";} ?>">

                </div>
              <div class="col-sm-5" class="alert alert-danger">
                <?php if(!empty($email_err)){ ?>
                <label class="control-label">
                <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<?php echo $email_err;?>
                </label>
                <?php } ?>
              </div>
            </div>





             <div class="form-group <?php if(!empty($eelat_err)){ echo "has-error"; echo " has-feedback"; }?>">

              <label for="lat" class="col-sm-2 control-label">
               Establishment Address
              </label>
              <div class="col-sm-5">
                <input class="form-control" id="eelat" type="text" name="eelat" placeholder=" Establishment Address" value="<?php if(isset($eelat)){echo $eelat;}?>" style="border-color:<?php if(!empty($eelat_err)){ echo "red";} ?>">
                </div>
              <div class="col-sm-5">
                <?php if(!empty($eelat_err)){ ?>
                <label class="control-label">
                <span class="glyphicon glyphicon-exclamation-sign">&nbsp;</span><?php echo $eelat_err;?>
                </label>
                <?php } ?>
              </div>
            </div>


            <div class="form-group <?php if(!empty($owner_err)){ echo "has-error"; echo " has-feedback"; }?>">

              <label for="owner" class="col-sm-2 control-label">
                Owner Name
              </label>
              <div class="col-sm-5">
                <input class="form-control" id="owner" type="text" name="owner" placeholder="Owner Name" value="<?php if(isset($owner)){echo $owner;}?>" style="border-color:<?php if(!empty($owner_err)){ echo "red";} ?>">

                </div>
              <div class="col-sm-5" class="alert alert-danger">
                <?php if(!empty($owner_err)){ ?>
                <label class="control-label">
                <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<?php echo $owner_err;?>
                </label>
                <?php } ?>
              </div>
             </div>







        <div class="form-group <?php if(!empty($category_err)){ echo "has-error"; echo " has-feedback"; }?>">
            <label for="category" class="col-sm-2 control-label">
               Type of Establishment
            </label>
            <div class="col-sm-5" class="select" >
            <select name="category" value="<?php if(isset($category)){echo $category;}?>" style="border-color:<?php if(!empty($category_err)){ echo "red";} ?>">
                         <!--<option  value="Movie House" size="5" >Movie House  </option>
                        <option  value="KTV Studio"  >KTV Studio       </option>-->
                       <?php
                            $cy = get_all_category();
                       foreach($cy as $cytype){ ?>
                           <option value="<?php echo $cytype['id'];?>"><?php echo $cytype['categoryid'];?></option>
                       <?php }?>

                       ?>


                       </select>
                  </div>
                        <div class="col-sm-5" >
                <?php if(!empty($category_err)){ ?>
                <label class="control-label" >
                <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<?php echo $category_err;?>
                </label>
                <?php } ?>
          </div>
        </div>


          <div class="form-group">
            <label for="timeopen" class="col-sm-2 control-label">
              Time Open
            </label>
            <input type="time" name="timeopen" required><br>

           </div>

            <div class="form-group">
            <label for="timeclose" class="col-sm-2 control-label">
              Time Close
            </label>
            <input type="time" name="timeclose" required><br>

           </div>

          <div class="form-group <?php if(!empty($agree_err)){ echo "has-error"; echo " has-feedback"; }?>">


              <div class="checkbox"class="col-sm-5"><!--
                <label class="control-label" style="margin-left:18%;">
                <input  type="checkbox" name="agree"  value="yes" style="border-color:<?php /*if(!empty($agree_err)){ echo "red";} */?>">I agree to the <a href="#" target="_blank">Terms and Condition</a>
                </label>-->

              <?php if(!empty($agree_err)){ ?>
                <label class="control-label">
                <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<?php echo $agree_err;?>
                </label>
                <?php } ?>
              </div>




          </div>


            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">

                <button type="submit" name="submit"class="btn btn-primary">
                  Submit Registration
                </button>
                  <button type="button" class="btn btn-success" ><a href="login.php"><span style="color:white;">Cancel</a></span></button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-5">
        </div>

  </div>



       </div>
     </div>
   </div>
   </div>
   </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
