<?php include "includes/user_header.php"; ?>
<?php include "includes/db.php"; ?>

<body class="hold-transition sidebar-mini">
<?php

    if (isset($_GET['delete'])) {
      $user_id = $_GET['delete'];
      $sql = "DELETE FROM users WHERE user_id = '$user_id'";
      $deleted_data = mysqli_query($connection, $sql);
      header("Location: ./view_member.php");
      if($deleted_data){
          echo " Delete Successfully";

      }else {
          echo " Delete Not Successfully";

      }

  }
?>

<?php
  if (isset($_GET['change_to_admin'])) {
      $the_user_id = $_GET['change_to_admin'];
      $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";

      $change_to_admin_query = mysqli_query($connection, $query);
     // header("Location: ./view_member.php");
  }

?>

<?php
  if (isset($_GET['change_to_sub'])) {
      $the_user_id = $_GET['change_to_sub'];
      $query = "UPDATE users SET user_role = 'users' WHERE user_id = $the_user_id";

      $change_to_sub_query = mysqli_query($connection, $query);
     // header("Location: ./view_member.php");
  }

?>
                 
<?php 

  session_start();
  include "includes/sidebar.php";

  include "includes/user_navbar.php";
?>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">


                    <div class="col-12">
                        <!-- general form elements -->
                      <h1 class="page-header text-center">
                        Welcome To All Members Table
                      </h1>
                      <table class="table table-bordered table:hover">
                        <thead>
                          <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <!-- <th>password</th> -->
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Blood Group</th>
                            <th>role</th>
                            <th>Users</th>
                            <th>Admin</th>
                            <th>Messages</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>

                           <?php


                           $query = "SELECT * FROM users ";
                           $select_users = mysqli_query($connection, $query);   


                           while ($row = mysqli_fetch_assoc($select_users)) 
                           {
                             $user_id =  $row['user_id'];
                             $username =  $row['user_name'];
                             $user_email =  $row['user_email'];
                             $user_password =  $row['user_password'];
                             $user_address =  $row['user_address'];
                             $user_phone =  $row['user_phone'];
                             $user_blood =  $row['user_blood'];
                             $user_role =  $row['user_role'];

                             echo "<tr>";

                             echo "<td> $user_id </td>";
                             echo "<td> $username </td>";
                             //echo "<td> $user_password </td>";
                             echo "<td> $user_email </td>";
                             echo "<td> $user_address </td>";
                             echo "<td> $user_phone </td>";
                             echo "<td> $user_blood </td>";               
                             echo "<td> $user_role </td>";  
                             echo "<td> <a href='view_member.php?change_to_admin=$user_id'>Admin</a></td>";               
                             echo "<td> <a href='view_member.php?change_to_sub=$user_id'>users</a></td>";
                             echo "<td> <a href='admin_message.php?receiver=$user_id' >messages</a> </td>"; 

                             echo "<td> <a href='profile_update.php'>Edit</a></td>";  

                             echo "<td> <a href='view_member.php?delete=$user_id'>Delete</a></td>";   

                             echo "</tr>";

                         }

                         ?> 
                      </tbody>
                      </table>
                        <!-- /.card-body --> 
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