<?php include_once "includes/db.php" ;?>

<?php
if (isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phone_number = $_POST['phone_number'];
    $blood_group = $_POST['blood_group'];
    $password=$_POST['password'];
    $retype_password = $_POST['retype_password'];

    
    if ( !empty($username) && !empty($email) && !empty($password) && !empty($phone_number) && !empty($blood_group) ){
        $username=mysqli_real_escape_string($connection,$username);
        $email=mysqli_real_escape_string($connection,$email);
        $phone_number=mysqli_real_escape_string($connection,$phone_number);
        $blood_group=mysqli_real_escape_string($connection,$blood_group);
        $password=mysqli_real_escape_string($connection,$password);
        //$retype_password=mysqli_real_escape_string($connection,$retype_password);   

        
    $query="SELECT randSalt FROM users";
    $select_rand=mysqli_query($connection,$query);

    if(! $select_rand){
        die("Query failed" . mysqli_error($connection));

    }

    $row=mysqli_fetch_array($select_rand);
        $salt=$row['randSalt'];
        $password=crypt($password,$salt);

    

    $query="INSERT INTO users (user_name,user_email,user_password,user_phone,user_blood,user_role)";
    $query .="VALUES('{$username}','{$email}','{$password}', '{$phone_number}', '{$blood_group}','user')";

    $register_user_query=mysqli_query($connection, $query);
    
    
    if( !$register_user_query){
        die("Query failed" . mysqli_error($connection));
    }
    $message="register successful";
    }
    else{ 
        $message="register field can not be empty";
        // echo"register successful";
       // header("Location: login.php");
    }
    }

    else{
        $message="";
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
  <div class="register-box">

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register as a Member</p>

        <form action="register.php" method="post">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Full name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="tel" name="phone_number" class="form-control" placeholder="Phone Number" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">

            <select class="custom-select select-from-control-border" name="blood_group">
              <option selected>Blood Group</option>
              <option>A Positive</option>
              <option>A Negative</option>
              <option>A Unknown</option>
              <option>B Positive</option>
              <option>B Negative</option>
              <option>B Unknown</option>
              <option>AB Positive</option>
              <option>AB Negative</option>
              <option>AB Unknown</option>
              <option>O Positive</option>
              <option>O Negative</option>
              <option>O Unknown</option>
              <option>Unknown</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="retype_password" class="form-control" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
             
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <a href="./login.php" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>