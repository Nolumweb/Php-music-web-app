<?php 
include ('../config.php');

isset($_GET['edit_staff']);
$userid = $_GET['edit_staff'];

if(isset($_POST['update'])){
   $name= $_POST['fullname'];
   $user= $_POST['username'];
   $email= $_POST['email'];
   $password = md5($password);
   $role= $_POST['role'];

 


$sql= "UPDATE `admins` SET `fullname`='$name',`username`='$user',`email`='$email',`password`='$password', `role`='$role'  WHERE `id`='$userid'";
$query=mysqli_query($conn, $sql);
if($query){
    header('location:all_staffs.php');
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

                <h3 class="text-center">Edit Staff</h3>
                <?php
            
            $sql= "SELECT * FROM `admins` WHERE `id` = '$userid'";
            $query=mysqli_query($conn, $sql);
            if (!$query){
                die('Data Error');
            }else{
                $fetchData= mysqli_fetch_assoc($query);
                $fullname= $fetchData['fullname'];
                $username= $fetchData['username'];
                $email= $fetchData['email'];
                $password= $fetchData['password'];
                
            }
            
          
          ?>
                  <form action="" method="post" enctype="multipart/form-data" >


                  <div class="form-group mr-5 text-center">
                  <label for = "fullname">Fullname</label>
                  <input type="text" name="fullname" class="form-control" placeholder="Enter your fullname" value="<?php echo $fullname?>">
                  </div>

                <div class="form-group mr-5 text-center">
                    <label for = "username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter your username" value="<?php echo $username?>">
                    </div>

                <div class="form-group mr-5 text-center">
                    <label for = "email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter your email" value="<?php echo $fullname?>">
                </div>

                <div class="form-group mr-5 text-center">
                    <label for = "password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" value="">
                </div>

                <div class="form-group text-center">
            <label for="role">Role:</label>
            <select class="form-control" name="role" required="">
              <option value="">Select Role</option>
              <option value="admin">Admin</option>
              <option value="moderator">Moderator</option>
            </select>
          </div>

            <div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2"type="submit text-center" name="update"  value="Update" >Update</button>
					<a href="all_staffs.php" class="btn btn-secondary" type="button">Cancel</a>
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
