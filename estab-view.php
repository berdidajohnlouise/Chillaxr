
<?php $estabs = get_estab($_GET['id']);
$service = get_services($estabs['eeid']);
$events = get_event_budget($estabs['eeid']);
$enthuid ='';
if(isset($_SESSION['enthu_id'])){
  $enthuid = $_SESSION['enthu_id'];
}
?>
<style>
.isActive a.ui-state-default{
  background:none;
  background-color:pink;
}

td.ui-datepicker-today.ui-state-disabled{
  opacity:1;
}

.ui-datepicker-today a.ui-state-default,
.ui-datepicker-today span.ui-state-default{
  background:none;
  background-color:gray;
}
</style>


<script type="text/javascript">
window.onload = function(){
  var strlocation = '<?php if(isset($estabs['establishment_address'])) echo ucfirst($estabs['establishment_address']); ?>';
  var mylocation = strlocation.split(" ");
  var i = 0;
  do{
    mylocation[i] += "+";
    i++;
  } while(i < mylocation.length - 1);
  var newlocation = mylocation.join().replace(/,/g,'');

  $('#ourlocation').attr('src','https://www.google.com/maps/embed/v1/place?q='+newlocation+'&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU');

};



</script>




  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Establishment
          <small>Categories : </small>
          <small><a href="ktv.php" style="text-decoration:underline;">Ktv's </a>,</small>
          <small><a href="moviehouse.php" style="text-decoration:underline;">Movie House</a></small>
        </h1>


      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-8">
            <!-- TO DO List -->
            <div class="box box-primary">
              <div class="box-header">
                <!-- <i class="ion ion-clipboard"></i>
                <h3 class="box-title">To Do List</h3>-->
                <h2 style="color:grey;"><?php echo $estabs['establishment_name']; ?>
                  <button class="pull-right btn btn-xs btn-primary btn-flat"><span class="glyphicon glyphicon-eye-open"></span><??></button>
                </h2>
              </div><!-- /.box-header -->
              <div class="box-body">

                <div class="row">
                  <div class="col-sm-4">
                    <img src="user_files/<?php echo $estabs['establishment_name'];?>/profile_pic/<?php echo $estabs['establishment_image'];?>" width="100%" height="250px;" style="float;left"/>
                    <h5 style="color:#808080">
                      <i>Category:&nbsp;</i>
                      <small class="label label-info"><?php echo get_category($estabs['categoryid']);?></small>
                    </h5>
                    <h5 style="color:#808080">
                      <i> Office Hours:&nbsp;</i>
                      <small class="label label-primary" id="office-hours"><?php echo date('g:i A',strtotime($estabs['establishment_timeopen']))." - ". date('g:i A',strtotime($estabs['establishment_timeclose']));?></small>
                    </h5>
                    <h5 style="color:#808080">
                      <i>Rooms Available:&nbsp;</i>
                      <small class="label label-warning"><?php echo count_room_available($estabs['eeid']);?></small>
                    </h5>
                    <h5 style="color:#808080"style="overflow-y:visible;">
                      <i>Address: &nbsp;</i>
                      <small class="label label-warning" ><?php echo ucfirst($estabs['establishment_address']); ?></small>
                    </h5>
                    <!--                                  <small class="pull-right" style="color:#808080"><i><b>20</b>&nbsp; Followers</i></small>
                  -->
                </div>
                <div class="col-sm-8">
                  <p>
                    <?php echo $service['services_description'];?>
                  </p>
                  <br>
                </div>
              </div>

            </div><!-- /.box-body -->

            <div class="box-footer clearfix no-border">



              <!--<button class=" btn btn-flat btn-olive "><i class="glyphicon glyphicon-calendar"></i>&nbsp;|&nbsp;Reserve Now </button>-->
              <!--<button class="pull-right btn btn-flat btn-info "><i class="fa fa-users"></i>&nbsp;|&nbsp; Follow</button>-->

              <form role="form" method="post">
                <?php

                $followbtn = "";
                $follow_status = '';
                if(isset($_SESSION['enthu_id'])){
                  $follow_status = get_follow_stat($enthuid,$_GET['id']);
                  if ($follow_status == "1") {
                    $follow_status = "<button name='unfollow' class='pull-right btn btn-flat btn-info '><i class='fa fa-users'></i>&nbsp;|&nbsp; Unfollow</button>";
                  }
                  else{
                    $follow_status = "<button name='follow' class='pull-right btn btn-flat btn-info '><i class='fa fa-users'></i>&nbsp;|&nbsp; Follow</button>";
                  }


                  if (isset($_POST['follow'])) {
                    $follow_status = enthu_follow($_SESSION['enthu_id'],$_GET['id']);
                    //header("location:establishment.php?id=".$_GET['id']);
                  }

                  if (isset($_POST['unfollow'])) {
                    $follow_status = unfollowbtn_update($_SESSION['enthu_id'],$_GET['id']);
                    //header("location:establishment.php?id=".$_GET['id']);

                  }

                  $follow_status = get_follow_stat($enthuid,$_GET['id']);
                  if ($follow_status == "1") {
                    $follow_status = "<button name='unfollow' class='pull-right btn btn-flat btn-info '><i class='fa fa-users'></i>&nbsp;|&nbsp; Unfollow</button>";
                  }
                  else{
                    $follow_status = "<button name='follow' class='pull-right btn btn-flat btn-info '><i class='fa fa-users'></i>&nbsp;|&nbsp; Follow</button>";
                  }
                }

                echo $follow_status;
                ?>
              </form>
            </div>

          </div><!-- /.box -->

          <!-- Chat box -->
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-comments-o"></i>
              <h3 class="box-title">Feedback</h3>
              <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                <div class="btn-group" data-toggle="btn-toggle" >
                  <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                </div>
              </div>
            </div>

            <div class="box-body chat" id="chat-box">
              <?php

              $feedback = get_all_feedback($estabs['eeid']);


              foreach($feedback as $feed){
                $ent = get_enthu($feed['EnthusiastID']);

                ?>

                <!-- chat item -->
                <div class="item">
                  <img src="user_files-enthu/<?php echo $ent['enthusiast_name'];?>/profile_pic/<?php echo $ent['enthusiast_image'];?>" alt="user image" class="online">
                  <p class="message">
                    <a href="#" class="name">
                      <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>&nbsp;<?php echo ago($feed['Date']);?></small>
                      <?php echo $ent['enthusiast_name'];?>
                    </a>
                    <?php echo $feed['Feedback'];?>
                  </p>

                </div><!-- /.item -->
                <?php } ?>
                <!-- chat item -->

              </div><!-- /.chat -->
              <?php if(isset($_SESSION['enthu_id'])){?>
                <div class="box-footer">
                  <form role="form" method="post">
                    <div class="input-group">
                      <input type="hidden" name="eeid" value="<?php echo $estabs['eeid'];?>">
                    </div>
                    <div class="input-group">
                      <input type="hidden" name="enthu" value="<?php echo $_SESSION['enthu_id'];?>">
                    </div>
                    <div class="input-group">


                      <input type="text" name="feedback" class="form-control" placeholder="Type message...">

                      <div class="input-group-btn">
                        <button name="feed" class="btn btn-success">Post</button>
                      </div>

                    </div>
                  </form>
                </div>
                <?php }else{ ?>
                  <div class="box-footer">
                    <h4 align="center"> <i class="fa fa-comments-o"></i>&nbsp;You want to send Feedback?&nbsp;&nbsp;<a class="btn btn-info" href="login-enthu.php">Login Now</a></h4>
                    <h5 align="center">You have no account yet?&nbsp; <a href="signup-enthu.php">Sign Up Now</a></h5>
                  </div>
                  <?php } ?>
                </div><!-- /.box (chat box) -->

              </div>

              <div class="row">
                <div class="col-md-4">


                  <!-- Map box -->
                  <div class="box box-solid ">
                    <div class="box-header bg-light-blue-gradient">
                      <!-- tools box -->
                      <div class="pull-right box-tools">
                        <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                        <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                      </div><!-- /. tools -->

                      <i class="fa fa-map-marker"></i>
                      <h3 class="box-title">
                        Location
                      </h3>
                    </div>
                    <div class="box-body" style="width:100%;height:300px;">
                      <div id="embed-map-canvas" style="height:100%; width:100%;max-width:98%;">
                        <iframe style="height:100%;width:100%;border:0;padding:4px 4px 4px 4px;" frameborder="0" src="" id="ourlocation" ></iframe>
                      </div>
                    </div><!-- /.box-body-->
                    <div class="box-footer no-border">
                      <div class="row">
                        <div class="col-xs-12 text-center" style="border-right: 1px solid #f4f4f4">

                          <h5 class="knob-label"><?php echo $estabs['establishment_address'];?><small class="pull-right fa fa-map "></small></h5>
                        </div><!-- ./col -->
                      </div><!-- /.row -->
                    </div>
                  </div>

                  <div class="box box-solid">
                    <div class="box-header bg-light-blue-gradient">
                      <i class="glyphicon glyphicon-home"></i>
                      <h4 class="box-title">Packages</h4>

                    </div><!-- /.box-header-->

                    <div class="box-body">
                      <?php

                      $packages = get_all_packages($estabs['eeid']);

                      foreach($packages as $package){
                        ?>

                        <div class="row">
                          <div class="col-xs-2">
                            <img src="Images/<?php echo $package['eventbudget_image'];?>"  width="60px" height="60px" alt="user image" class="online">

                          </div>

                          <div class="col-xs-10"  style="padding-left: 25px;">
                            <h5 style="color:#50a6be"><?php echo $package['eventbudget_name'];?>
                              <br />
                              <small class="pull-right label label-info">&nbsp;<?php echo $package['eventbudget_description'];?></small>
                            </h5>
                            <h5 style="color:darkgrey;">Price:&nbsp; &#8369;&nbsp;<?php echo $package['eventbudget_price'];?>

                            </h5>
                            <!-- <h5 style="color:darkgrey;">Room name:&nbsp; &nbsp<?php //echo ucfirst($package['room_name']);?>

                            </h5> -->

                          </div>



                        </div>
                        <hr>
                        <?php  } ?>
                      </div><!-- /.box-body -->

                    </div><!-- /.box -->

                    <div class="box box-solid">
                      <div class="box-header bg-light-blue-gradient">
                        <i class="glyphicon glyphicon-home"></i>
                        <h4 class="box-title">Rooms</h4>

                      </div><!-- /.box-header-->

                      <div class="box-body">
                        <?php

                        $rooms = get_all_rooms($estabs['eeid']);

                        foreach($rooms as $room){
                          $status = get_room_status($room['room_status']);

                          ?>

                          <div class="row">

                            <div class="col-xs-2">
                              <img src="user_files/<?php echo $estabs['establishment_name'];?>/room/<?php echo $room['room_image'];?>"  width="60px" height="60px" alt="user image" class="online">

                            </div>

                            <div class="col-xs-10"  style="padding-left: 25px;">
                              <h5 style="color:darkgrey;">Room:&nbsp; <span style="color:#50a6be"><?php echo ucfirst($room['room_name']);?></span>
                                <small class="pull-right label label-info">&#8369;&nbsp;<?php echo $room['room_price'].".00";?></small>
                              </h5>
                              <h5 style="color:darkgrey;">Capacity:&nbsp; &nbsp<?php echo $room['room_capacity'];?>
                                <!-- <small class="pull-right label label-warning"><?php //echo $status;?></small> -->
                              </h5>

                              <h5 style="color:darkgrey;">Room Price:&nbsp;&#8369;&nbsp;<?php echo $room['room_price'];?>

                              </h5>
                              <h5 style="color:darkgrey;">Reservation:&nbsp; <br> <?php $reserveat = get_all_reserve_room($room['roomid']); ?>
                                <?php foreach($reserveat as $reservetime){
                                 echo date('g:i A',strtotime('-1 hour', strtotime($reservetime['reservation_time']))).'&nbsp;';
                                }

                                ?>

                              </h5>

                              <?php if(isset($_SESSION['enthu_id'])){?>
                                <button type="button" class="btn btn-flat btn-success" data-toggle="modal" data-target="#roomModal" onclick="roomid(<?php echo $room['roomid'];?>)"><i class="glyphicon glyphicon-calendar"></i>&nbsp;|&nbsp; Reserve Now</button>
                                <?php }?>
                              </div>





                            </div>
                            <hr>
                            <?php  } ?>
                          </div><!-- /.box-body -->

                        </div><!-- /.box -->


                        <div class="box box-solid">
                          <div class="box-header bg-light-blue-gradient">
                            <i class="glyphicon glyphicon-home"></i>
                            <h4 class="box-title">Food Products</h4>

                          </div><!-- /.box-header-->

                          <div class="box-body">
                            <?php

                            $products = get_product($estabs['eeid']);

                            foreach($products as $product){


                              ?>

                              <div class="row">
                                <div class="col-xs-2">
                                  <img src="user_files/<?php echo $estabs['establishment_name'];?>/services/photos/<?php echo $product['product_image'];?>"  width="60px" height="60px" alt="user image" class="online">

                                </div>

                                <div class="col-xs-10" style="padding-left: 25px;">
                                  <h4 style="color:#50a6be"><?php echo $product['product_name'];?>
                                  </h4>
                                  <small style="color:darkgrey;" class="label label-info">&#8369;&nbsp;<?php echo $product['product_price'].".00";?>
                                  </small>
                                </div>

                              </div>
                              <hr>
                              <?php  } ?>
                            </div><!-- /.box-body -->

                          </div><!-- /.box -->
                          <div class="box box-solid">
                            <div class="box-header bg-light-blue-gradient">
                              <i class="glyphicon glyphicon-home"></i>
                              <h4 class="box-title">Related Estalishment</h4>

                            </div><!-- /.box-header-->

                            <div class="box-body">
                              <?php

                              $esta = get_related_estab($estabs['categoryid']);

                              foreach($esta as $es){

                                if($es['establishment_name'] != $estabs['establishment_name']){
                                  ?>

                                  <div class="row">
                                    <div class="col-xs-2">
                                      <img src="user_files/<?php echo $es['establishment_name'];?>/profile_pic/<?php echo $es['establishment_image'];?>" class="img-circle" width="50px" height="50px" alt="user image" class="online">

                                    </div>
                                    <a href="index.php?id=<?php echo $es['eeid'];?>">0
                                      <div class="col-xs-10">
                                        <h4 style="color:#50a6be"><?php echo $es['establishment_name'];?>
                                          <small class="text-muted pull-right"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;<?php echo date('g:i A',strtotime($es['establishment_timeopen']))." - ". date('g:i A',strtotime($es['establishment_timeclose']));?></small>
                                        </h4>
                                        <h5 style="color:darkgrey;"><?php echo get_category($es['categoryid']);?>
                                          <small class="pull-right label label-warning">Available Rooms:&nbsp; &nbsp;<?php echo count_room_available($es['eeid']);?></small>
                                        </h5>
                                      </div>
                                    </a>
                                  </div>
                                  <hr>
                                  <?php } } ?>
                                </div><!-- /.box-body -->

                              </div><!-- /.box -->
                            </div>
                          </div>
                        </section><!-- /.content -->
                      </div><!-- /.container -->
                    </div><!-- /.content-wrapper -->

                    <!-- Modal -->
                    <div id="roomModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <form role="form" method="POST">
                            <div class="modal-header">

                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Reservation</span></h4>

                            </div>
                            <div class="modal-body">
                              <div  class="col-sm-6 ">
                                <b>Package</b>
                                <br />

                                <select name="time_range" class="form-control" required="required" id="time_range">
                                  <option value="ts" id="default">Choose package</option>
                                  <option value="0">No Package</option>
                                  <?php foreach($events as $event){?>
                                    <option value="<?php echo $event['time_range']; ?>" id="<?php echo $event['eventbudgetid'];?>">
                                      <?php echo $event['eventbudget_name'];?>
                                    </option>
                                    <?php } ?>
                                  </select>

                                  <br />

                                  <div id="datepicker" style="width:100%;" required></div>
                                  <br />
                                  <input type="hidden" name="package" id="packageid"  required/>
                                  <input type="hidden" name="date" id="datepick"  required>
                                  <input type="hidden" name="eeid" value="<?php echo $estabs['eeid'];?>" class="form-control" id="eeid"/>
                                  <input type="hidden" name="reservationroomid" id="roomids" />
                                </div>
                                <div class="col-sm-6">
                                  <b><center>Time Available</center></b>
                                  <div id="time">
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit"  name="reserveroom"  class="btn btn-info" >Reserve</button>
                                <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>

                        </div>
                      </div>
