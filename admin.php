<?php include "includes/user_header.php"; ?>

<!-- Preloader -->
<?php include "includes/preloader.php"; 
session_start();

?>

<!-- Navbar -->
<?php include "includes/user_navbar.php"; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include "includes/sidebar_admin.php" ?>


<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Welcome To </h1>

            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php 
                        $query = "SELECT * FROM users";
                        $select_all_user = mysqli_query($connection, $query);
                        $user_counts = mysqli_num_rows($select_all_user);

                
                    echo "<div class='huge'>{$user_counts}</div>"
                    
                    ?>
                      
                    </h3>

                  <p>Total Members</p>
                </div>
                <div class="icon">
                  <i class="ion ion ion-person-add"></i>
                </div>
                <a href="view_member.php">
                  <div class="panel-footer pb-2">
                      <span class="pull-left px-3">View Details</span>
                      <span class="pull-right float-right px-3"><i class="fa fa-arrow-circle-right justify-content-end"></i></span>
                      <div class="clearfix"></div>
                  </div>
                </a> 
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>40</h3>

                  <p>Availability of Donors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>

              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>70</h3>

                  <p>Demand for donors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>

              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner" style=height:110px> 
                  <h3></h3>

                  <p>Manage Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>

              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->

          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include "includes/user_footer.php"; ?>