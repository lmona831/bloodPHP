<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo "Admin - ".$_SESSION['name'] ;?></a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="./index.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>
                
                <li class="nav-item">
                    <a href="./view_member.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>  View all members</p>
                    </a>
                </li>
               
                <li class="nav-item">
                    <a href="./admin_message.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Message To Member</p>
                    </a>
                </li>

                 <li class="nav-item">
                    <a href="./admin_searchbar.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Admin Searchbar </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p onclick="logout_msg()">Log-out</p>
                    </a>
                </li>
            </ul>







            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>