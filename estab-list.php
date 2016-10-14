<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Establishments
                <small>Categories : </small>
                <small><a href="ktv.php" style="text-decoration:underline;">Ktv's </a>,</small>
                <small><a href="moviehouse.php" style="text-decoration:underline;">Movie House</a></small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <?php

            foreach($estab as $est){
                ?>
                <section class="col-lg-4 connectedSortable" >

                    <!-- Map box -->
                    <div class="box box-solid  " >
                        <div class="box-header bg-light-blue-gradient">
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="<?php echo get_office_stats($est['establishment_timeopen'],$est['establishment_timeclose'])?>"><i class="glyphicon glyphicon-eye-open"></i></button>
                                <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                            </div><!-- /. tools -->

                            <i class="fa fa-map-marker"></i>
                            <h3 class="box-title">
                                <?php echo $est['establishment_name'];?>
                            </h3>
                        </div>
                        <div class="box-body" style="height: 250px; width: 100%; background-image: url('user_files/<?php echo $est['establishment_name'];?>/profile_pic/<?php echo $est['establishment_image'];?>');background-size: contain;">


                        </div>
                        <div class="box-footer border">
                            <div class="row">
                                <a href="index.php?id=<?php echo $est['eeid'];?>" style=" color:grey;">
                                    <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">

                                        <div class="knob-label" style="color:grey;" >Visit</div>
                                    </div><!-- ./col -->
                                </a>
                                <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">

                                    <div class="knob-label" style="color:grey;"><?php echo get_category($est['categoryid']); ?></div>
                                </div><!-- ./col -->

                            </div><!-- /.row -->
                        </div>
                    </div>
                    <!-- /.box -->
                </section>
            <?php } ?>
        </section><!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->
