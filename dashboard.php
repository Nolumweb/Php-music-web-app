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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<?php include('includes/b_header.php'); ?>
<body class="content-wrapper">

  <!-- /.navbar -->
  <?php include('includes/b_navbar.php'); ?>
  <!-- /.sidebar -->
  <?php include('includes/b_sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper  bg-dark">

 <style>
.na{
padding-left:50px;
padding-top:40px;
}
h3{
    color:green;
    text-align:center;
}

h6{
    color:purple;
    text-align:center;
}

.my-card  {
  color: #4154f1;
  background: #f6f6fe;
  margin-top:50px;
}


 </style>

<div class="row na">

 <!-- working on numbers to increment the values -->
<div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4 ">
          <div class="card-body my-card">
                  Total Uploads
            <?php
                 if (isset($_SESSION['username'])){
                  $username=$_SESSION['username']; 
                $sql= "SELECT * FROM `uploads` WHERE `username` = '$username'";
                $query=mysqli_query($conn, $sql);
                if($total = mysqli_num_rows($query)){
                  echo '<h3 class="mb-0"> '.$total.'</h3> ';
                } else{
                  echo '<h6 class="mb-0">No Uploads yet</h6> ';
                }}?>
            </div>
              <div class="card-footer rounded-circle d-flex align-items-center justify-content-between" >
              <a class="small text-white stretched-link" href="view_all.php">View Details </a>
            <div class="small text-white"  ><i class="fas fa-angle-right"></i></div>
              </div>
            </div></div>
      
       
  <div class="col-xl-3 col-md-6">
  <div class="card bg-success text-white mb-4 ">
            <div class="card-body my-card">
            Approved Total 
            <?php
                 if (isset($_SESSION['username'])){
                  $username=$_SESSION['username'];
                $sql= "SELECT * FROM `uploads` WHERE `uploads`.`username` ='$username' AND `status`= 'APPROVED' ";
              
                $query=mysqli_query($conn, $sql);
                if($total = mysqli_num_rows($query)){
                  echo '<h3 class="mb-0"> '.$total.'</h3> ';
                } else{
                  echo '<h6 class="mb-0">No Uploads yet</h6> ';
                }}?>
      </div>
        <div class="card-footer rounded-circle d-flex align-items-center justify-content-between" >
        <a class="small text-white stretched-link" href="my_approved.php">View Details </a>
      <div class="small text-white"  ><i class="fas fa-angle-right"></i></div>
        </div>
      </div></div>

      <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4 ">
            <div class="card-body my-card">
            Pend Upload
            <?php
                if (isset($_SESSION['username'])){
                  $username=$_SESSION['username'];
                  $ql= "SELECT * FROM `uploads` WHERE `uploads`.`username` ='$username' AND `status`= 'pend' ";
                $query=mysqli_query($conn, $ql);
                if($tal = mysqli_num_rows($query)){
                  echo '<h3 class="mb-0"> '.$tal.'</h3> ';
                } else{
                  echo '<h6 class="mb-0">No Uploads yet</h6> ';
                }}
            ?>
      </div>
        <div class="card-footer rounded-circle d-flex align-items-center justify-content-between" >
        <a class="small text-white stretched-link" href="my_pend.php">View Details </a>
      <div class="small text-white"  ><i class="fas fa-angle-right"></i></div>
        </div>
      </div></div>




          
   
      </div>
<!-- /.container-fluid -->
</div>

  
  <?php include('includes/b_footer.php'); ?>

</body>
</html>
