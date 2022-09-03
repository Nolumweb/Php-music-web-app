<?php 
include ('../config.php');

if (isset($_POST['submit'])){
  $fullname=mysqli_escape_string($conn,$_POST['fullname']);
  $username=mysqli_escape_string($conn,$_POST['username']);
  $email=mysqli_escape_string($conn,$_POST['email']);
  $password=mysqli_escape_string($conn, $_POST['password']);
 
  $image =$_FILES ['user_image']['name'];
  $image_tmp =$_FILES ['user_image']['tmp_name'];
  move_uploaded_file($image_tmp, "images/$image");
  //move_uploaded_file($image_tmp, $location . $image);

  $sql =  "INSERT INTO `account`(`id`, `fullname`, `username`, `email`, `password`, user_image, `date`)
  VALUES ('', '$fullname', '$username', '$email','$password','$image','$reg_date')";
  $query = mysqli_query($conn, $sql);

  if($query)
  echo "<script>alert('User Added')</script>";
  echo "<script>window.open('admin_dashboard.php', '_self')</script>";
   header('location:all_users.php');
 }      
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
    <!-- Content Header (Page header) -->
    <!-- Main content -->


    <div class="container">
        <div class="col-sm-6 m-auto mt-5 bd-2">
                <h3 class="text-center">Add a user</h3>

                  <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group text-center">
                    <label for = "fullname">Fullname</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Enter your fullname" value="<?php //echo $fullname?>">
                  </div>
                <div class="form-group text-center">
                    <label for = "username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter your username" value="<?php //echo $username?>">
                </div>

                <div class="form-group text-center">
                    <label for = "email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter your email" value="<?php //echo $email?>">
                </div>

                <div class="form-group mt-3 text-center">
                    <label for = "password">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Enter your password" value="<?php //echo $password?>">
                </div>

              <div class="form-group mt-3 text-center">
                <label for="user_image">Image </label>
                <input type ="file" name="user_image" accept="image/*" value="<?php// echo $image?>">
            </div>

            <div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2"type="submit text-center" name="submit" >Update</button>
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