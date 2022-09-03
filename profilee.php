<?php
 include ('config.php');
 

$name='';
$user='';
$email ='';
$image ='';
$errors = array();
$_SESSION['hail'] = "";
include('errors.php'); 
    // fetching user info to dashboard

if (isset($_SESSION['id'])){
$id=$_SESSION['id'];

$sql= "SELECT * FROM `account` WHERE `id`='$id' ";
$query =mysqli_query($conn, $sql);
   while($row= mysqli_fetch_assoc($query)){
    $fullname = $row['fullname'];
    $user = $row['username'];
    $email = $row['email'];
    $image = $row['user_image'];
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
  
<!-- Accessible only to the users that have logged in already -->
        <?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- information of the user logged in -->
		<?php if (isset($_SESSION['id'])) : ?>
      <div class="container" >
      <div class="row">
      <div class="col-lg-12">  
    <p>
    
      <!-- welcome message for the logged in user -->
			
    
        <p class= "text-center text-success fw-bold">

      <div>
      <img src="images/<?php echo $image?>" alt="Profile" width="30%" class="rounded-circle">
       <!-- <img src ='images/<?php //echo $image?>' alt="image" width="20%" class="img-fluid img-thumbnail"> -->
      </div>
      
       <h5 class="card-title   mt-5 bg-primary">Profile Details</h5><br>
            <div class="row mt-5">
                <div class="col-lg-3 col-md-4 label green ">Full Name</div>
                <div class="col-lg-9 col-md-8"><?php echo ucwords($_SESSION['fullname']); ?></div>
              </div>


              <div class="row mt-2">
                <div class="col-lg-3 col-md-4 label green ">Username</div>
                <div class="col-lg-9 col-md-8"><?php echo ucwords($_SESSION['username']); ?></div>
              </div>

              <div class="row mt-2">
                <div class="col-lg-3 col-md-4 label green">Email</div>
                <div class="col-lg-9 col-md-8"><?php echo $email ?></div>
              </div>
<?php
// accout update ie fetch and update
        $sql= "SELECT * FROM `account` WHERE `id` = '$id'";
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
// update the current info
        if(isset($_POST['update'])){
          $fullname= ($_POST['fullname']);
          $username= ($_POST['username']);
          $email= ($_POST['email']);
          $password= ($_POST['password']);
          $image =$_FILES ['user_image']['name'];
          $image_tmp =$_FILES ['user_image']['tmp_name'];
          move_uploaded_file($image_tmp, "images/$image");
          
          if(empty($image)){
              $sql = "SELECT * FROM `account` WHERE `id`= '$id'";
              $image_query= mysqli_query($conn,$sql);
              while($row = mysqli_fetch_assoc($image_query)){
                  $image = $row['user_image'];
              }
          }
      
          $sql ="UPDATE `account` SET `fullname` = '$fullname', `username`='$username', `email`='$email', `password`='$password', `user_image`='$image' WHERE
          `id`='$id'";
          $update_query = mysqli_query($conn,$sql);

          $_SESSION['hail'] = "Update Succesfull";
             //header('location: success.php');
         }
         
        
        ?>  

 <!-- Add new user -->
 <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add new User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body px-4">
          
        <form action="" method="post" id="form-data" enctype="multipart/form-data">
           
                <div class="form-group text-center">
                  <label for = "fullname">Fullname</label>
                  <input type="text" name="fullname" class="form-control" placeholder="Enter your fullname" value="<?php echo ($_SESSION['fullname']); ?>">
                  </div>

                <div class="form-group text-center">
                    <label for = "username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter your username" value="<?php echo ($_SESSION['username']); ?>">
                </div>


                <div class="form-group text-center">
                    <label for = "email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter your email" value="<?php echo $email?>">
                </div>

                <div class="form-group mt-3 text-center">
                    <label for = "password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" value="">
                </div>

              <div class="form-group mt-3 text-center">
                <label for="user_image">Image </label>
                <input type ="file" name="user_image" accept="image/" value="<?php echo ($_SESSION['image']); ?>">
               </div> 

        <!-- image position -->
        <div>
       <img src ='images/<?php echo $image?>' alt="image" width="20%" class="img-fluid img-thumbnail">
        <div> 

        <div class="col-lg-12 text-right justify-content-center d-flex">
      <button class="btn btn-primary mr-2"type="submit text-center" name="update"  value="Update" >Update</button>
    </div>

        </div>

</div>
		
</div>
<?php endif ?>

  
  <?php include('includes/b_footer.php'); ?>

</body>
</html>
