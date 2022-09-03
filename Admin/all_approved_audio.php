<?php
 include ('../config.php');


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nolum music app</title>
    <link rel="stylesheet" href="style/bootstrap-5.0.0-beta3-dist/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
</head>
<body>

<?php include('includes/a_header.php'); ?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
  <!-- /.navbar -->
  <?php include('includes/a_navbar.php'); ?>
  <!-- /.sidebar -->
  <?php include('includes/a_sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  	 
  <div class="content-wrapper  bg-dark">
  	 
  
       <!-- Content Header (Page header) -->
       <!-- Main content -->
   
                   <h5 class="text-center">Approved HISTORY</h5>
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
            <th>Id</th>
            <th>Audio</th>
            <th>Created</th>
            <th>Status</th>
            
           
         </tr>
          </thead>
          <tbody>


         <?php

        if (isset($_SESSION['username'])){
                $username=$_SESSION['username'];
                $result= "SELECT * FROM `uploads` WHERE `uploads`.`status` = 'approved'  ";
                $query=mysqli_query($conn, $result);
                $num =1;
                if($query){
                    while($row= mysqli_fetch_assoc($query)){
                        $upload_id= $row['upload_id'];
                        $username= $row['username'];
                        $audio=$row['upath'];
                        $date= $row['date'];
                        $approved= $row['status'];
             ?> 
             
             <tr>
            <td><?php echo $num?></td>  
            <td><?php echo $username?></td>
            <td><?php echo $audio?></td>
            <td><?php echo $date?></td>
            <td> <?php echo $approved?></td>
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
    <div class="col-lg-12 text-right justify-content-center d-flex">
		<button class="btn btn-secondary my-3 "  type="button"><a href="a_dasbord.php">Back</button></div>    

</div>	
</div>

  <!-- Main Footer -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    feather.replace();
</script>
  <?php include('includes/a_footer.php'); ?>

</body>
</html>

