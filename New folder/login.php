<?php include_once "includes/db.php" ;?>


<?php
  session_start();
 ?>

<?php




if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $qry="SELECT * FROM `users` WHERE `user_email`='$email' AND `user_password`='$password'";
    $run = mysqli_query($connection,$qry);
    $row = mysqli_num_rows($run);
    if($row<1)
    {
        ?>
        <script>
            alert('Username or Password not match !!');
            window.open('login.php','_self');
        </script>
        <?php
    }
    else
    {
        $data = mysqli_fetch_assoc($run);
        $id = $data['user_id'];
        $name = $data['user_name'];
        $role = $data['user_role'];
        
        echo "id = ".$id;

        //
        $_SESSION['uid'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['role'] = $role;
        header('location:index.php');

    }

}

?>

<!-- header include -->
<?php include "includes/user_header.php"; ?>

<body class="  justify-content-center
  hold-transition login-page">
  <div class="login-box" >
    <div class="login-logo">
      <a href="index.php"><b>Sign In</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.php" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>