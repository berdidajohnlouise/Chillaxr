
<?php 
  
  include 'function.php';
  include 'signupexec-enthu.php';
 
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

            <div class="form-group <?php if(!empty($enthusiast_username_err)){ ?> has-error has-feedback <?php }  ?>"> 
               
              <label for="username" class="col-sm-2 control-label " >
                Username 
              </label>
              <div class="col-sm-5">

                <input class="form-control" id="enthusiast_username" type="text" name="enthusiast_username" placeholder="Username" style="border-color:
                <?php if(!empty($enthusiast_password_err)){ echo "red";} ?>" value="<?php if(isset($enthusiast_username)){echo $enthusiast_username;}?>" >
              </div>  


              <div class="col-sm-5" >
                <?php if(!empty($enthusiast_username_err)){ ?>
                <label class="control-label" >
                <span class="glyphicon glyphicon-exclamation-sign" class="err"></span>&nbsp;<?php echo $enthusiast_username_err;?>
                </label>
                <?php } ?>
              </div>
            </div>

            <div class="form-group <?php if(!empty($enthusiast_password_err)){ echo "has-error"; echo " has-feedback"; }?>">
               
              <label for="password" class="col-sm-2 control-label text-left">
                Password
              </label>
              <div class="col-sm-5">
                <input class="form-control" id="enthusiast_password" type="password" name="enthusiast_password" placeholder="Password" value="" style="border-color:
                <?php if(!empty($enthusiast_password_err)){ echo "red";} ?>">
              </div>  
              <div class="col-sm-5">
                <?php if(!empty($enthusiast_password_err)){ ?>
                <label class="control-label">
                <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<?php echo $enthusiast_password_err;?>
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

            <div class="form-group <?php if(!empty($enthusiast_name_err)){ echo "has-error"; echo " has-feedback"; }?>">
               
              <label for="name" class="col-sm-2 control-label">
                Full Name
              </label>
              <div class="col-sm-5">
                <input class="form-control" id="enthusiast_name" type="text" name="enthusiast_name" placeholder="Full Name" value="<?php if(isset($enthusiast_name)){echo $enthusiast_name;}?>" style="border-color:<?php if(!empty($enthusiast_name_err)){ echo "red";} ?>" >
                </div>  
              <div class="col-sm-5">
                <?php if(!empty($enthusiast_name_err)){ ?>
                <label class="control-label">
                <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<?php echo $enthusiast_name_err;?>
                </label>
                <?php } ?>
              </div>
            </div>

           
              <div class="form-group <?php if(!empty($enthusiast_contact_err)){ echo "has-error"; echo " has-feedback"; }?>">
               
              <label for="contact" class="col-sm-2 control-label">
                Contact-No.
              </label>
              <div class="col-sm-5">
                <input class="form-control" id="enthusiast_contact" type="text" name="enthusiast_contact" placeholder="Contact Number" value="<?php if(isset($enthusiast_contact)){echo $enthusiast_contact;}?>" style="border-color:<?php if(!empty($enthusiast_contact_err)){ echo "red";} ?>">
                </div>  
              <div class="col-sm-5">
                <?php if(!empty($enthusiast_contact_err)){ ?>
                <label class="control-label">
                <span class="glyphicon glyphicon-exclamation-sign">&nbsp;</span><?php echo $enthusiast_contact_err;?>
                </label>
                <?php } ?>
              </div>
            </div>

              <div class="form-group <?php if(!empty($enthusiast_email_err)){ echo "has-error"; echo " has-feedback"; }?>">
               
              <label for="inputEmail3" class="col-sm-2 control-label">
                Email
              </label>
              <div class="col-sm-5">
                <input class="form-control" id="inputEmail3" type="email" name="enthusiast_email" placeholder="Email" value="<?php if(isset($enthusiast_email)){echo $enthusiast_email;}?>" style="border-color:<?php if(!empty($enthusiast_email_err)){ echo "red";} ?>">

                </div>  
              <div class="col-sm-5" class="alert alert-danger">
                <?php if(!empty($enthusiast_email_err)){ ?>
                <label class="control-label">
                <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<?php echo $enthusiast_email_err;?>
                </label>
                <?php } ?>
              </div>
            </div>

            <div class="form-group <?php if(!empty($enthusiast_address_err)){ echo "has-error"; echo " has-feedback"; }?>">
               
              <label for="address" class="col-sm-2 control-label">
                Address
              </label>
              <div class="col-sm-5">
                <input class="form-control" id="enthusiast_address" type="text" name="enthusiast_address" placeholder="Address" value="<?php if(isset($enthusiast_address)){echo $enthusiast_address;}?>" style="border-color:<?php if(!empty($enthusiast_address_err)){ echo "red";} ?>" >
                </div>  
              <div class="col-sm-5">
                <?php if(!empty($enthusiast_address_err)){ ?>
                <label class="control-label">
                <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<?php echo $enthusiast_address_err;?>
                </label>
                <?php } ?>
              </div>
            </div>


            <div class="form-group">
               
              <label for="gender" class="col-sm-2 control-label">
                Gender
              </label>
              <div class="col-sm-5">
                <input  id="gender" type="radio" name="gender" value="Male" checked >Male
                <input  id="gender" type="radio" name="gender" value="Female" >Female
              </div>
            </div>

        
            <label for="gender" class="col-sm-2 control-label">
                Birthdate
            </label>
            <div class="col-sm-5" class="select">
            <select name="month">
                        
                        <option id="birth_month1" value="1" size="5" >Jan  </option>
                        <option id="birth_month2" value="2"  >Feb        </option>
                        <option id="birth_month3" value="3"  >Mar        </option>
                        <option id="birth_month5" value="4"  >Apr        </option>
                        <option id="birth_month5" value="5"  >May        </option>
                        <option id="birth_month5" value="6"  >Jun        </option>
                        <option id="birth_month7" value="7"  >Jul        </option>
                        <option id="birth_month8" value="8"  >Aug        </option>
                        <option id="birth_month9" value="9"  >Sep        </option>
                        <option id="birth_month5" value="10"  >Oct        </option>
                        <option id="birth_month11" value="11"  >Nov        </option>
                        <option id="birth_month12" value="12"  >Dec        </option>
                       </select>

                       <select name="day">
                       
                        <?php for($i=1;$i<=31;$i++){ ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }?>
                       </select>

                        <select name="year">
                        
                        <?php for($i=2015;$i>1900;$i--){ ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }?>
                       </select>
                    </div>
                    <div class="col-sm-5" >
                <?php if(!empty($age_err)){ ?>
                <label class="control-label" >
                <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;<?php echo $age_err;?>
                </label>
                <?php } ?>
          </div>
                 

            
        
          
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                 
                <button type="submit" name="submit"class="btn btn-primary">
                  Submit Registration
                </button>
                  <button type="button" class="btn btn-success" ><a href="signupindex.php"><span style="color:white;">Cancel</a></span></button>
              </div>
            </div>
          </form>
		    </div>
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


