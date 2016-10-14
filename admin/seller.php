<?php
  include("../function.php");

  $sales=0;
  $total_sales=0;
  $sell=0;
    if(isset($_POST['del_seller'])){

        $del = $_POST['del_seller'];
     
       $msg = delete_seller($del[$i]);
       
        $message=$msg;

    }
    $seller = all_seller();

?>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Subscriber  Records</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active"><a href="#">Subscriber  Records</a></li>
            
          </ol>
        </section>
        

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <?php if(isset($message)){?>
                <div class="alert alert-success">
                  <h4><?php echo $message;?></h4>
               </div> 

            <?php } ?>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Subscriber Table Records</h3>
                </div><!-- /.box-header -->

                <div class="box-body table-responsive">
                  <form class="form-horizontal" role="form"   method="POST" enctype="multipart/form-data">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <!--<th>Action</th>-->
                       
                        <th>EEID</th>
                        <th>Establishment Name</th>
                        <th>Subscriber</th>
                        <th>Email</th>
                        <th>Contact #</th>
                        <th>Type of Subscription
                        <th>Date and Time Subscribe</th>
                        <th>Paypal</th>
                        
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                       // $sql = "SELECT image FROM entertainmentestablishment WHERE image=:id";
                     $profile_pic = '';
                        foreach ($seller as $seller) {
                       $sell++;

                         $purchases = get_sales($seller['eeid']);
                       



                      ?>
                      <tr>
                        <!--<td><button type="button" data-toggle="modal" data-target="#<?php //echo $sell;?>" /><span class="glyphicon glyphicon-trash"></span></button></td>-->
                           
                        <td><?php echo $seller['eeid'];?></td>

                        <td><?php echo $seller['establishment_name'];?></a></td>

 
                        <td><?php echo $seller['establishment_owner']; ?></td>
                        <td><?php echo $seller['establishment_email'];?></td>
                        <td><?php echo $seller['establishment_contact'];?></td>
                       <td><?php echo $seller['subscriptionid'];?></td>
                        <td><?php echo $seller['establishment_startdate'] ;?></td>

                        <td><?php echo $seller['establishment_paypal'];?></td>
             
                   

  
                  
                        <div id="<?php echo $sell;?>" class="modal fade"   role="dialog" aria-labelledby="confirmUpdateLabel" aria-hidden="true">
                      
                      <div class="modal-dialog">
                  
                        <div class="modal-content">
                  
                          <div class="modal-header">
                    
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  
                            <h4 class="modal-title">Delete Seller Permanently </h4>
                            
                          </div>
                    
                          <div class="modal-body">

                          <h4> Are you sure you really want to delete this seller?</h4>
                          <p><b style="color:red;">Note </b>: if you delete this user all his/her files will be deleted as well!</p>
                          

                          </div>
                    
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="del_seller">Delete</button>
                            <button  class="btn btn-default" data-dismiss="modal">Cancel</button>
                    
                            
                    
                          </div>
                  
                        </div>
                    
                      </div>
                    
                    </div>


                    <!-- End of Modal delete-->
                  
                      <?php } ?>

                    </tbody>
                    <tfoot>
                      <tr>
                        <!--<th>Action</th>-->
                                              
                      </tr>
                    </tfoot>
                  </table>
                  
                   
                </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    