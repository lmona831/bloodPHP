<?php include_once "includes/db.php" ;?>

<?php include "includes/user_header.php"; ?>


<?php
 session_start();
 if(isset($_SESSION['uid'])) {
    $user_id=$_SESSION['uid'];
    $user_email=$_SESSION['email'];

 }else{
     $user_id=[];
     $user_email=[];
 }
 
 
 ?>


<body class="hold-transition sidebar-mini">

    <?php
    //include "includes/sidebar.php";
    ?>
<div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                
                    <div class="col-lg-12">
                    	
                    	<h1 class="page-header text-center">
                        Welcome To Admin
                        <small>Author</small>
                      </h1>


                    <table class="container table table-bordered table:hover">
                    	<thead>
                    		<tr>
                            
                                <th>Name</th> 
                    			
                    			<th>doantion date</th>
                    			<th>Next doantion date</th>
                                
                    			
                          
                    		</tr>
                    	</thead>
                    	<tbody>
                        <?php
				            	 $query = "SELECT user_name,date,next_date FROM users,blood WHERE users.user_email='$user_email' AND blood.blood_user='$user_id'";
                                   $select_users = mysqli_query($connection, $query);   
                              
                                 
                                   while ($row = mysqli_fetch_assoc($select_users)) 
                                   {
                                    $name =  $row['user_name'];
                                     $date =  $row['date'];
                                     $next_date =  $row['next_date'];
                                    
                                     

									echo "<tr>";

									echo "<td> $name</td>";
									echo "<td> $date</td>";
									echo "<td> $next_date </td>";
									
									  
                //  echo "<td> <a href='users.php?change_to_admin=$user_id'>Admin</a></td>";               
                  // echo "<td> <a href='users.php?change_to_sub=$user_id'>Subscriber</a></td>";

                  // echo "<td> <a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";  

                  // echo "<td> <a onclick=\"javascript: return confirm('Are you sure to delete the user!'); \" href='users.php?delete=$user_id'>Delete</a></td>";
                         
                  echo "</tr>";

                     }
                     
                      ?>
					
                        </tbody>                        
                    </div>

                  </div>
                 
                </div>
       </div>
       </body>

       <?php // include "includes/user_footer.php"; ?>