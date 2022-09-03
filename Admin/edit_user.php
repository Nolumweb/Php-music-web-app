<?php 
include ('../config.php');
$email='';
isset($_GET['edit_user']);
$userid = $_GET['edit_user'];

if(isset($_POST['update'])){
   $name= $_POST['fullname'];
   $user= $_POST['username'];
   $email= $_POST['email'];
   $pass= $_POST['password']; 
   $image =$_FILES ['user_image']['name'];
   $image_tmp =$_FILES ['user_image']['tmp_name'];
   move_uploaded_file($image_tmp, "images/$image");

$sql= "UPDATE `account` SET `fullname`='$name',`username`='$user',`email`='$email',`password`='$pass',
`user_image`='$image', `date`='$date' WHERE `username`='$userid'";
$query=mysqli_query($conn, $sql);
if($query){
    header('location:all_users.php');
}
}
          
           
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
   
    <div class="container">
        <div class="col-sm-6 m-auto mt-5 bd-2">

                <h3 class="text-center">Edit user</h3>
                <?php
            if (isset($_SESSION['username'])){
                $username=$_SESSION['username'];
            $sql= "SELECT * FROM `account` WHERE `username` = '$username'";
            $query=mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($query)){
                    $fullname = $row['fullname']; 
                    $username = $row['username']; 
                    $email = $row['email']; 
                    $password = $row['password']; 
            }}
           
          ?>
                  <form action="" method="post" enctype="multipart/form-data" >


                  <div class="form-group mr-5 text-center">
                  <label for = "fullname">Fullname</label>
                  <input type="text" name="fullname" class="form-control" placeholder="Enter your fullname" value="<?php echo ucwords($_SESSION['fullname']); ?>">
                  </div>

                <div class="form-group mr-5 text-center">
                    <label for = "username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter your username" value="<?php echo ucwords($_SESSION['username']); ?>">
                    </div>

                <div class="form-group mr-5 text-center">
                    <label for = "email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter your email" value="<?php echo $email; ?>">
                </div>

                <div class="form-group mr-5 text-center">
                    <label for = "password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" value="">
                </div>

            <div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2"type="submit text-center" name="update"  value="Update" >Update</button>
					<a href="all_users.php" class="btn btn-secondary" type="button">Cancel</a>
				</div>
</form>

        </div>
        </div> 
        </div>
  <!-- /.content-wrapper -->
</div>

  <?php include('includes/a_footer.php'); ?>

</body>
</html>
