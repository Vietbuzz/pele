<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-PELS</title>

    <!-- Bootstrap Core CSS -->

    <?php
        echo $this->Html->css('../bower_components/bootstrap/dist/css/bootstrap.min');
        echo $this->Html->css('../bower_components/font-awesome/css/font-awesome.min');
        echo $this->Html->css('../dist/css/sb-admin-2');
        echo $this->Html->css('../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap');
        echo $this->Html->css('../bower_components/datatables-responsive/css/dataTables.responsive');
    ?>

</head>

<body>
<div id="container">
    <!-- /#wrapper -->
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a data-placement="left" rel="tooltip" href="<?php echo $this->Html->url(array('controller'=>'dashboards','action'=>'index'));?>" class="btn btn-link"> Admin Area - Practice English Listening Skill </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Playlist<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                     <?php echo $this->Html->link('List Playlist',array('controller' => 'playlists', 'action' => 'list')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link('Add Playlist',array('controller' => 'playlists', 'action' => 'add')); ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?php echo $this->Html->link('List User', array('controller' => 'users', 'action' => 'list')); ?>
                                </li>
                                <li>
                                    <?php echo $this->Html->link('Add User', array('controller' => 'users', 'action' => 'add')); ?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-passwords fa-fw"></i> Change Password</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content');?>
                    <div class="col-lg-7" style="padding-bottom:120px">

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
</div>

<?php

    echo $this->Html->script('../bower_components/jquery/dist/jquery.min');
    echo $this->Html->script('../bower_components/bootstrap/dist/js/bootstrap.min');
    echo $this->Html->script('../bower_components/metisMenu/dist/metisMenu.min');
    echo $this->Html->script('../dist/js/sb-admin-2');
    //echo $this->Html->script(../);
?>

<!--<!-- Bootstrap Core JavaScript -->-->
<!--<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
<!---->
<!--<!-- Metis Menu Plugin JavaScript -->-->
<!--<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>-->
<!---->
<!--<!-- Custom Theme JavaScript -->-->
<!--<script src="dist/js/sb-admin-2.js"></script>-->
<!---->
<!--<!-- DataTables JavaScript -->-->
<!--<script src="bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>-->
<!--<script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>-->

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
 <script>
//     $(document).ready(function() {
//         $('#dataTables-example').DataTable({
//             responsive: true
//         });
//     });
$(document).ready(function(){
    $("#addpart").click(function(){
        var partnum = $(".part").length;
        $("#parts").append('<div class="part"><label>Audio '+(partnum+1)+'</label><input name="data[Playlist][audio]['+partnum+']" type="file" class="form-control"> <div class="form-group"> <label>Text '+(partnum+1)+'</label> <textarea class="form-control" rows="3" name="data[Playlist][text]['+partnum+']"]></textarea> </div> </div>');
    });
});

</script>
</body>

</html>
