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
    <link rel="stylesheet" href="assests/bootstrap-5.0.0-beta3-dist/css/bootstrap.css">
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
                <h5 class="text-center">Approved HISTORY</h5>
                  

<div class="container px-5">
<div class="row">
  <div class="col-lg-12">
  <div class="table-responsive" id="showUser">
  <table class="table table-striped table-sm table-bordered">

        <thead>


          <thead>
             <tr>
            <th>Sn</th>
            <th>Uploaded by</th>
            <th>Artist</th>
            <th>Title</th>
            <th>Audio</th>
            
            
           
         </tr>
          </thead>
          <tbody>


          <?php



                if (isset($_SESSION['username'])){
                $username=$_SESSION['username'];
                $sql= "SELECT * FROM `uploads` WHERE `uploads`.`username` ='$username' AND `status`= 'APPROVED' ";
                $query=mysqli_query($conn, $sql);
                $num =1;
                if($query){
                    while($row= mysqli_fetch_assoc($query)){
                    $username = $row['username'];
                    $title= $row['title'];
                    $artist= $row['artist'];
                    $audio_file= $row['upath'];
                
               
             ?> 
             
             <tr>
            <td><?php echo $num?></td>  
            <td><?php echo $username?></td>
            <td> <?php echo $title?></td>
            <td><?php echo $artist?></td>
           
           

            
            <td>
            <audio class='embed-responsive-item' preload='' controls> 
            <source src='uploads/audio/<?php echo $audio_file?>' type='audio/mp3'></audio>
            </td>
        
             </tr>
             <?php
             $num ++;}
                }}
            ?>
</div>
        </div> 
        </div>

    </table> 
             

</div>	
</div>
  <?php include('includes/b_footer.php'); ?>
</body>
</html>