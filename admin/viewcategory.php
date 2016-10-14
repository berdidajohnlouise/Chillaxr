<?php
  include("../function.php");


  $sell=0;
    if(isset($_POST['del_seller'])){

        $del = $_POST['del_seller'];
     
       $msg = delete_seller($del[$i]);
       
        $message=$msg;

    }
    $seller = all_seller();

?>
<head>
<style>

</style>
</head>
<body>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Establishments</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active"><a href="#">Establishments</a></li>
            
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
                  <h3 class="box-title">Available Establishments</h3>
                </div><!-- /.box-header -->



                <div class="box-body table-responsive">
                   
                  <form class="form-horizontal" role="form"   method="POST" enctype="multipart/form-data">
 
                     
                 
                      <?php
                       // $sql = "SELECT image FROM entertainmentestablishment WHERE image=:id";
                    // $profile_pic = '';

                        foreach ($seller as $seller) {
                    

                      
                       
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
                       
                     
                                                 
<td align="center" valign="center">
 
     <a href="../index.php?rec=userrec&id=<?php echo $seller['mem_id'];?>">
                         <img  src="../user_files/<?php echo $seller['name'];?>/profile_pic/<?php echo $seller['image'];?>" height="200" width="200"/> </a>

   </td> 
   

                                 
  
                           
                 
                    
                    

 </tr>
                     
  
                  
                      
                  
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
</body>
</html>

    