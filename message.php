<?php include "includes/user_header.php"; ?>

<body class="hold-transition sidebar-mini">


<?php
include "includes/db.php";
 session_start();
 if(isset($_SESSION['uid'])) {
    $user_id=$_SESSION['uid'];
    $user_name=$_SESSION['name'];

 }else{
     $user_id=[];
     $user_name=[];
 }
 
 
 ?>

    <?php
    
    include "includes/sidebar.php";
     

    if(isset($_POST['send']))
    {
        if(!empty($_POST['message']))
        {
            date_default_timezone_set("Asia/Dhaka");
            $date=date("Y/m/d");
            $time= date("g:i A");
            $sender=$user_id;
            $receiver='admin';
            $message=$_POST['message'];

            $query="INSERT INTO messages(sender,receiver,message,date,time,to_whom) VALUES ('{$sender}','{$receiver}','{$message}','{$date}','{$time}','admin')";
            $insert=mysqli_query($connection,$query);
            header("Location: ./message.php");
            
        }
    }



    ?>







    <!-- /.navbar -->

    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- DIRECT CHAT -->
        <div class="card direct-chat direct-chat-primary">
            <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                    <span title="3 New Messages" class="badge badge-primary">3</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                        <i class="fas fa-comments"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body" >
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages" id="card-body">
                    
                    <!-- Message. Default to the right -->
                    <?php

                        $query="SELECT * FROM messages WHERE sender='$user_id' or receiver='$user_id'";
                        $all_messages=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_assoc($all_messages))
                        {
                            if($row['to_whom']=='admin')
                            { 
                        
                    ?>
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                            <!-- <span class="direct-chat-name float-right"><?php //echo $user_name; ?></span> -->
                            <?php
                                
                                $phpdate = strtotime( $row['date'] );
                                $right_date = date( 'j-M-y', $phpdate );
                               
                            ?>
                            <span class="direct-chat-timestamp float-left"><?php echo $right_date .' '. $row['time']; ?></span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <span class="direct-chat-name float-right" style=" Background:red; width:30px; line-height:25px; border-radius:50%; text-align:center;">
                        <?php 
                         echo "<h3>";
                         echo $user_name[0]; 
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
                            <span class="direct-chat-name float-left">Admin</span>
                            <?php
                                
                                $phpdate = strtotime( $row['date'] );
                                $right_date = date( 'j-M-y', $phpdate );
                               
                            ?>
                            <span class="direct-chat-timestamp float-right"><?php echo $right_date .' '. $row['time']; ?></span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
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
                <form action="#" method="post">
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