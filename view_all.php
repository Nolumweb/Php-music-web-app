<?php 
include ('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nolum music app</title>
    <link rel="stylesheet" href="../style/bootstrap-5.0.0-beta3-dist/css/bootstrap.css">
</head>
<body>
<?php include('includes/b_header.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- /.navbar -->
  <?php include('includes/b_navbar.php'); ?>
  <!-- /.sidebar -->
  <?php include('includes/b_sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper  bg-dark">
  	 
  
    <!-- Content Header (Page header) -->
    <!-- Main content -->

                <h5 class="text-center">MY UPLOAD HISTORY</h5>
<style>
 
    .btn1{
        background-color:red;
        color: white;
        display:block; 
        border: 2px solid;
    }
    a{
        color: white;
    }

</style>
<body style="background-color:grey">
<div class="container px-5">
<div class="row">
  <div class="col-lg-12">
  <div class="table-responsive" id="showUser">
  <table class="table table-striped table-sm table-bordered">

        <thead>
            <tr>
                <th>Sn</th>
                <th>Title</th>
                <th>Artist</th>
                <th>Audio</th>
                <th>Date</th>
                <th>Delete</th>
            
                <th>Status</th>
            </tr>
        </thead>
    <tbody>
<?php

                if (isset($_SESSION['username'])){
                     $username=$_SESSION['username'];
                     $sql= "SELECT * FROM `uploads` WHERE `username` = '$username'";
                     $query=mysqli_query($conn, $sql);
                     $num =1;
                     if($query){
                        while($row = mysqli_fetch_assoc($query)){
                        $upload_id= $row['upload_id'];
                         $title= $row['title'];
                         $artist= $row['artist'];
                         $audio= $row['upath'];
                         $date= $row['date'];
                         $status= $row['status'];
?>
            <tr>
            <td><?php echo $num?></td> 

            <td><?php echo $title?></td>
            <td><?php echo $artist?></td>
            <td><?php echo $audio?></td>
            <td><?php echo $date?></td>
            <td class="btn1"><a href="del_audio.php?dd=<?php echo$upload_id?>">Delete</a></td>
            <td> <?php echo $status?></td>
    </tr>
    <?php
             $num ++;}
                }else{
                    die;
                }   }
            ?>
</div>
        </div> 
        </div>

    </table> 

    </div>
        </div> 
        </div>
  <!-- /.content-wrapper -->
</div>
<?php include('includes/b_footer.php'); ?>
</body>
</html>
