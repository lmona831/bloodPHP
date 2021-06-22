<?php include "includes/user_header.php";   ?>
<?php include "includes/db.php"; ?>

<body class="hold-transition sidebar-mini">
    <?php
    session_start();
    $user_id_session=$_SESSION['uid'];
    include "includes/sidebar.php"; 
     // $msg="";
    ?>

       
    <?php

    if (isset($_POST['update'])) {
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_blood=$_POST['user_blood'];
        $user_address = $_POST['user_address'];
        $user_phone = $_POST['user_phone'];
        $user_id_session=$_SESSION['uid'];
        $query = "UPDATE `users` SET user_name='{$user_name}',user_email='{$user_email}', user_blood ='{$user_blood}',user_address='{$user_address}',user_phone='{$user_phone}' WHERE user_id='{$user_id_session}'";

        $update = mysqli_query($connection, $query);
        if ($update) {

            $msg="Profile Update Successfully";
                            
        }
        else{
            $msg="Can't Update The Profile";
        }
    }
    
    ?>
    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Profile Update Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->


                            <form action="" method="POST">

                                <?php
                                $query = "SELECT * FROM users WHERE user_id ='$user_id_session'";
                                $getdata = mysqli_query($connection, $query);
                                if (mysqli_num_rows($getdata) > 0) {

                                    while ($read = mysqli_fetch_assoc($getdata)) {
                                        $user_id = $read['user_id'];
                                        $user_name = $read['user_name'];
                                        $user_email = $read['user_email'];
                                        $user_blood_a = $read['user_blood'];
                                        $user_address = $read['user_address'];
                                        $user_phone = $read['user_phone'];
                                ?>

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Your Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="user_name" value="<?php echo $user_name; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" name="user_email" value="<?php echo  $user_email; ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <select class="custom-select select-from-control-border" name='user_blood'>
                                                    <option value="<?php echo $user_blood_a; ?>"><?php echo $user_blood_a; ?></option>
                                                    <option value="A+">A+ </option>
                                                    <option value="A-">A- </option>
                                                    
                                                    <option value="B+">B+ </option>
                                                    <option value="B-">B- </option>

                                                    <option value="AB+">AB+ </option>
                                                    <option value="AB-">AB-</option>

                                                    <option value="O+">O+ </option>
                                                    <option value="O-">O- </option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="user_address" value="<?php echo   $user_address; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone Number</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="user_phone" value="<?php echo    $user_phone; ?>">
                                            </div>
                                            <div class="form-group">

                                                <input type="submit" class=" btn btn-primary" name="update" value="Update">
                                            </div>

                                        </div>

                                <?php  }
                                } ?>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
            <!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include "includes/user_footer.php";   ?>
    </div>
    </div>
    </section>
    </div>
</body>
