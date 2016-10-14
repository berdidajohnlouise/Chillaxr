  
          <?php 
          if(isset($_POST['signup'])){
          header('location:signup-enthu.php');
          exit();
          }

          ?>
          <ul class="nav nav-tabs" >
            <nav class="navbar navbar-inverse navbar-fixed-top  ">
              <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="index-enthu.php"><img src="img/logo4.png" alt="Brand" heigth="50px" width="50px"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-left">
            <ul class="nav navbar-nav">
                   <li><a href="#"><label style="padding-left:3px">Home</label></a></li>
              
                  <li><a href="list-establishment-enthu.php"><label style="padding-left:3px">Establishments</label></a></li>
               
              <!-- <li><a href="#"><label style="padding-left:3px">Services</label></a></li> -->
              
               
                 <?php if(isset($_SESSION['id'])){  ?>

            <li>
              <a href="profile-enthu.php"><label style="padding-left:3px">Profile</a>
            </li>
             </ul>
         </form>

             <?php } ?>
              <form class="navbar-form navbar-right">
            <ul class="nav navbar-nav">

           <li class="dropdown pull-right">
              <?php if(isset($_SESSION['id'])){ ?>
               <a href="#" data-toggle="dropdown" class="dropdown-toggle"> <img class="img-circle" style="float:left;margin-right:2px;" src="user_files-enthu/<?php echo $fullname;?>/profile_pic/<?php echo $user['image']; ?>" height="25px" width="25px"/> <?php echo ucfirst($user['name']);?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
            <li>
              <a href="edit_profile-enthu.php">Edit profile</a>
            </li>
            <li class="divider">
            </li>
            <li>
              <a href="logout-enthu.php">Logout</a>
            </li>
              </ul>
             </ul>
             </form> 
               </div><!--/.navbar-collapse -->

         
      </div>
    </nav><!--end of nav-bar-->
          
               <?php }else{ ?>
              
             
              
       
          <form class="navbar-form navbar-right">
            <ul class="nav navbar-nav">
              <li><a href="login-enthu.php">Log in</a></li>
             </ul>
          </form>
        
        </ul> 
      </div>
      </nav>
            
            <?php }?>
 