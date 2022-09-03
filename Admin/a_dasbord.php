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
    <link rel="stylesheet" href="../style/bootstrap-5.0.0-beta3-dist/css/bootstrap.css">
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
 
<style>
.na{
padding-left:25px;
padding-top:40px;
}
h5{
    color:green;
    text-align:center;
}

.my-card  {
  color: #4154f1;
  background: #f6f6fe;
  margin-top:50px;
}


 </style>

<div class="row na">

<?php if($_SESSION['ROLE'] == 'admin'){ ?>     
<div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4 ">
          <div class="card-body my-card">
          Total User
            <?php
                 if (isset($_SESSION['username'])){
                  $username=$_SESSION['username']; 
                $nolum= "SELECT * FROM `account` WHERE 1 ORDER BY `username` DESC";
                $query=mysqli_query($conn, $nolum);
                if($total_users = mysqli_num_rows($query)){
                  echo '<h3 class="mb-0"> '.$total_users.'</h3> ';
                } else{
                  echo '<h5>No User yet</h5> ';
                }}
            ?>
            </div>
              <div class="card-footer rounded-circle d-flex align-items-center justify-content-between" >
              <a class="small text-white stretched-link" href="all_users.php">View Details </a>
            <div class="small text-white"  ><i class="fas fa-angle-right"></i></div>
              </div>
            </div></div>

            <div class="col-xl-3 col-md-6">
        <div class="card bg-secondary text-white mb-4 ">
            <div class="card-body my-card">
            Total Staff
            <?php
                if (isset($_SESSION['username'])){
                  $username=$_SESSION['username'];
                $s= "SELECT * FROM `admins` WHERE 1 ORDER BY `username` DESC";
                $query=mysqli_query($conn, $s);
                if($total_staff = mysqli_num_rows($query)){
                  echo '<h3 class="mb-0"> '.$total_staff.'</h3> ';
                } else{
                  echo '<h5>No staff yet</h5> ';
                }}
            ?>
      </div>
        <div class="card-footer rounded-circle d-flex align-items-center justify-content-between" >
        <a class="small text-white stretched-link" href="all_staffs.php">View Details </a>
      <div class="small text-white"  ><i class="fas fa-angle-right"></i></div>
        </div>
      </div></div>

      <?php } ?>
            <?php if ($_SESSION['ROLE'] == 'admin' || $_SESSION['ROLE'] == 'moderator') { ?> 

      <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4 ">
              <div class="card-body my-card">
            Total Audio
      
            <?php
                 if (isset($_SESSION['username'])){
                  $username=$_SESSION['username'];
                $sql= "SELECT * FROM `uploads` WHERE 1 ORDER BY `username` DESC";
                $query=mysqli_query($conn, $sql);
                if($total_audio = mysqli_num_rows($query)){
                  echo '<h3 class="mb-0"> '.$total_audio.'</h3> ';
                } else{
                  echo '<h5>No upload yet</h5> ';
                }}
            ?>
      </div>
        <div class="card-footer rounded-circle d-flex align-items-center justify-content-between" >
        <a class="small text-white stretched-link" href="accept.php">View Details </a>
      <div class="small text-white"  ><i class="fas fa-angle-right"></i></div>
        </div>
      </div></div>
       
 

      <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4 ">
            <div class="card-body my-card">
            Total Approved
            <?php
                if (isset($_SESSION['username'])){
                  $username=$_SESSION['username'];
                $sql= "SELECT * FROM `uploads` WHERE `uploads`.`status` = 'approved'";
                $query=mysqli_query($conn, $sql);
                if($total = mysqli_num_rows($query)){
                  echo '<h3 class="mb-0"> '.$total.'</h3> ';
                } else{
                  echo '<h5>No approved upload yet</h5> ';
                }}
            ?>
      </div>
        <div class="card-footer rounded-circle d-flex align-items-center justify-content-between" >
        <a class="small text-white stretched-link" href="all_approved_audio.php">View Details </a>
      <div class="small text-white"  ><i class="fas fa-angle-right"></i></div>
        </div>
      </div></div>

      <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4 ">
            <div class="card-body my-card">
            Total Pend
            <?php
                 if (isset($_SESSION['username'])){
                  $username=$_SESSION['username'];
                $ql= "SELECT * FROM `uploads` WHERE `uploads`.`status` = 'pend'";
                $query=mysqli_query($conn, $ql);
                if($total_pend = mysqli_num_rows($query)){
                  echo '<h3 class="mb-0"> '.$total_pend.'</h3> ';
                } else{
                  echo '<h5>No pend upload yet</h5> ';
                }}
            ?>
      </div>
        <div class="card-footer rounded-circle d-flex align-items-center justify-content-between" >
        <a class="small text-white stretched-link" href="all_pend_audio.php">View Details </a>
      <div class="small text-white"  ><i class="fas fa-angle-right"></i></div>
        </div>
      </div></div>
  <?php } ?> 

  <?php
            if ($_SESSION['ROLE'] == "admin") {
            $query = "SELECT * FROM admins";
             }else{
            $role = $_SESSION['ROLE'];
            $query = "SELECT * FROM admins WHERE role = '$role'";
             }
?>     
   
      </div>
<!-- /.container-fluid -->
</div>
  <?php include('includes/a_footer.php'); ?>

</body>
</html>
