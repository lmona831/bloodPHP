<?php include "includes/user_header.php";   ?>
<?php include "includes/db.php"; ?> 
<?php

session_start();

include "includes/sidebar_admin.php"; ?>

<div class="container">
 <div class="row">
    <div class="col-2"></div>
    <div class="col-10">
     <div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
         <div class="row">
             <form action="" method="POST"> 
               <div  class="col-md-10  ">
                <input type="text" name="search" class='form-control' placeholder="Search By Name" value="" > 
            </div>
            <div class="col-md-2 text-left ">
                <button class="btn btn-primary" name="btnsearch">Search</button>
            </div>
        </form>
        <br>
        <br>
    </div>

    <?php  
    if (isset($_POST['btnsearch'])) {
        $searchKey = $_POST['search'];
        $query ="SELECT * FROM users WHERE user_name LIKE '%".$_POST['search']."%' OR user_email LIKE '%".$_POST['search']."%'OR user_address LIKE '%".$_POST['search']."%' OR user_phone LIKE '%".$_POST['search']."%' OR user_blood LIKE '%".$_POST['search']."%' ";
        $query_run = mysqli_query($connection,$query);

        ?>

        <table class="table table-bordered">
           <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Blood</th>

        </tr>


        <?php 
        if (mysqli_num_rows($query_run) > 0)
        {
           while ($row = mysqli_fetch_assoc($query_run)) {

            ?>
            <tr>
             <td><?php  echo $row['user_id'];?></td>
             <td><?php  echo $row['user_name'];?></td>
             <td><?php  echo $row['user_email'];?></td>
             <td><?php  echo $row['user_address'];?></td>
             <td><?php  echo $row['user_phone'];?></td>
             <td><?php  echo $row['user_blood'];?></td>

         </tr>


     <?php   }

 }
 else
   // $searchKey="";
 { 
    ?>

    <tr>
        <td colspan="5" >not found</td>
    </tr>
    <?php
}
?>
</table>
<?php }?>
</div>
</div>

</div>
</div>
</div>
<!-- /.content-wrapper -->
<?php //include "includes/user_footer.php";   ?>
</div>
</div>
</section>
</div>
</body>