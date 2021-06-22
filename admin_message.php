<?php include "includes/user_header.php"; ?>

<body class="hold-transition sidebar-mini">
<?php
include "includes/db.php";
 session_start();
 if(isset($_SESSION['uid'])) {
    $user_id=$_SESSION['uid'];
    

 }else{
     $user_id=[];
     $user_name=[];
 }
 
 
 ?>


<?php


            $receiver_id="";
            
            $receiver_name="";
            $receiver_email="";
            $receiver_phone="";
            $receiver_blood="";
            $check=0;



$check=0;
global $connection;

if(isset($_POST['getid']))
{
    if(!empty($_POST['userid']))
    {
        $userid=$_POST['userid'];
        
        header("Location: ./admin_message.php?receiver=$userid");
    }
}

?>

<?php

        if(isset($_GET['receiver']))
        {
                $receiver_id = $_GET['receiver'];
                $query= "SELECT * FROM users WHERE user_id = $receiver_id";
                $get_info=mysqli_query($connection,$query);
                if(mysqli_num_rows($get_info)>0)
                {

                    $row=mysqli_fetch_assoc($get_info);
                    $receiver_id=$row['user_id'];
                    
                    $receiver_name=$row['user_name'];
                    $receiver_email=$row['user_email'];
                    $receiver_phone=$row['user_phone'];
                    $receiver_blood=$row['user_blood'];
                    $check=1;
                }

                else
                {
                
                    $receiver_id="NO";
                
                    $receiver_name="NO ONE EXITS";
                    $receiver_email="";
                    $receiver_phone="";
                    $receiver_blood="";
                }

        }
        
    
    
        
        
        if(isset($_POST['send']))
        {
            if(!empty($_POST['message']))
            {
                date_default_timezone_set("Asia/Dhaka");
            $date=date("Y/m/d");
            $time= date("g:i A");
            $sender=$user_id;
            
            $message=$_POST['message'];
            if($receiver_id!="")
            {
                
                
                $query="INSERT INTO messages(sender,receiver,message,date,time,to_whom) VALUES ('{$sender}','{$receiver_id}','{$message}','{$date}','{$time}','user')";
                $insert=mysqli_query($connection,$query);
                header("Location: ./admin_message.php?receiver=$receiver_id");
            }
            
        }
    }
    
    
    
    
    include "includes/sidebar_admin.php";
    
?>







    <!-- /.navbar -->

    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- DIRECT CHAT -->
        <form class="form-inline d-flex justify-content-center flex-column " method="POST" action= "" >
           
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">User ID</label>
                <input type="text" class="form-control"  name="userid" placeholder="User ID">
            </div>
            <button type="submit" name="getid" class="btn btn-primary mb-2">Search</button>
            <div class="form-group mx-sm-3 mb-2 flex-column">
                <p class="h6">User ID : <?php echo $receiver_id?></p>
                
                <p class="h6">User Name : <?php echo $receiver_name?></p>
                <p class="h6">User Phone : <?php echo $receiver_phone?></p>
                <p class="h6">User Mail : <?php echo $receiver_email?></p>
                <p class="h6">User Blood group : <?php echo $receiver_blood?></p>
              
            </div>
            
        </form>

        <div class="card direct-chat direct-chat-primary">
            
            <!-- /.card-header -->
            <div class="card-body" >
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" id="card-body">
                    
                    <!-- Message. Default to the right -->
                    <?php

                        $query="SELECT * FROM messages WHERE sender='{$receiver_id}' or receiver='{$receiver_id}'";
                        $all_messages=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_assoc($all_messages))
                        {
                            if($row['to_whom']=='user')
                            { 
                        
                    ?>
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                            <!-- <span class="direct-chat-name float-right"><?php //echo $_SESSION['name'] ?></span> -->
                            <?php
                                
                                $phpdate = strtotime( $row['date'] );
                                $right_date = date( 'j-M-y', $phpdate );
                               
                            ?>
                            <span class="direct-chat-timestamp float-left"><?php echo $right_date .' '. $row['time']; ?></span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <span class="direct-chat-name float-right" style=" Background:green; width:30px; line-height:25px; border-radius:50%; text-align:center;">
                        <?php 
                         echo "<h3>";
                         echo $_SESSION['name'][0] ;
                         echo "</h3>";
                         ?></span>
                        <!-- <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image"> -->
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            <?php echo $row['message'];?>
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <?php } else{
                     ?>

                    <!-- Message to the left -->
                    



                    <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                            <!-- <span class="direct-chat-name float-left"><?php //echo $receiver_name;?></span> -->
                            <?php
                                
                                $phpdate = strtotime( $row['date'] );
                                $right_date = date( 'j-M-y', $phpdate );
                               
                            ?>
                            <span class="direct-chat-timestamp float-right"><?php echo $right_date .' '. $row['time']; ?></span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <span class="direct-chat-name float-left" style=" Background:red; width:30px; line-height:25px; border-radius:50%; text-align:center;">
                        <?php 
                         echo "<h3>";
                         echo $receiver_name[0]; 
                         echo "</h3>";
                         ?></span>
                        <!-- <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"> -->
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                        <?php echo $row['message'];?>
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                    <?php } 
                    }
                    ?>
                    <!-- /.direct-chat-msg -->

                    
                    <!-- /.direct-chat-msg -->

                </div>
                <!--/.direct-chat-messages-->

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                            <button type="submit" name="send" class="btn btn-primary">Send</button>
                        </span>
                    </div>
                </form>
            </div>
            <!-- /.card-footer-->
        </div>
        <!--/.direct-chat -->
        <!-- /.content -->
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>
    <!-- jQuery -->




</body>

<script>

 var objDiv = document.getElementById("card-body");
 objDiv.scrollTop = objDiv.scrollHeight;


</script>

</html>