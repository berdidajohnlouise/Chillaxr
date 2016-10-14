<?php
  include("../function.php");
 
  $img=0;
 
  if(isset($_POST['del_image'])){

        $del = $_POST['del_image'];
        
          $msg = delete_image($del);
       
        $message=$msg;

    }

    
 
  $seller = get_seller($mem_id);

  
?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small><?php echo ucfirst($seller['name']);?> Records</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li ><a href="#">Subscriber</a></li>
            <li class="active"><a href="#"><?php echo ucfirst($seller['name']);?> Records</a></li>
            
          </ol>
        </section>

           <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <?php if(isset($message)){?>
                <div class="alert alert-success">
                  <label><span class="glyphicon glyphicon-ok"></span><?php echo $message;?></label>
               </div> 

            <?php } ?>
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Available Establishments</h3>
                </div><!-- /.box-header -->



                <div class="box-body table-responsive">
                   
                  <form class="form-horizontal" role="form"   method="POST" enctype="multipart/form-data">
 
                     
                 
                      <?php
                       // $sql = "SELECT image FROM entertainmentestablishment WHERE image=:id";
                    // $profile_pic = '';

                        foreach ($seller as $seller) {
                    

                       //  $purchases = get_sales($seller['mem_id']);
                       
   // $seller = getuser('eeid');
    get_seller( $seller['mem_id']);
                                  


                      ?>
                      <table id="example1"  align="center"  width=50% cellspacing=5 cellpadding=8  >
                    
                   
                    <thead>
                      <tr>
                        <!--<th>Action</th>-->
                        <th> <?php echo $seller['name'];?></th>
                      
                     
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <!--<td><button type="button" data-toggle="modal" data-target="#<?php //echo $sell;?>" /><span class="glyphicon glyphicon-trash"></span></button></td>-->
                     
                                                 
<td align="center" valign="center">
 
     <a href="profile1.php?rec=userrec&id=<?php echo $seller['mem_id'];?>">
                         <img  src="../user_files/<?php echo $seller['name'];?>/profile_pic/<?php echo $seller['image'];?>" height="200" width="200"/> </a>

   </td> 
   

                                 
  
                           
                 
                    
                    

 </tr>
                     
  
                  
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
     
                 
                 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->