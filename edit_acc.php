<?php
include ('config.php');


if(isset($_GET['edit']));
 $id = $_GET['edit'];

//  $sql = "SELECT * FROM `account` WHERE `id`= '$id' ";
//  $edit_query = mysqli_query($conn,$sql);

//  while($row = mysqli_fetch_assoc($edit_query)){
//     $name= $row['fullname'];
//    $user= $row['username'];
//    $email= $row['email'];
//    $pass= $row['password']; 
//    $image= $row['user_image'];
//  }

 if(isset($_POST['update'])){
    $name= ($_POST['fullname']);
    $user= ($_POST['username']);
    $email= ($_POST['email']);
    $pass= ($_POST['password']);
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

    $sql ="UPDATE `account` SET `fullname` = '$name', `username`='$user', `email`='$email', `password`='$pass', `user_image`='$image' WHERE
    `id`='$id'";
    $update_query = mysqli_query($conn,$sql);
    echo 'Update sucessfully';
   if($update_query){
       header('location: dashboard.php');
   }
   else{
       echo "no update confirmed";
   }
    // echo "<p class='bg-success'> Post Updataed . <a href='dashboard.php?edit={$id}'>View post<a/> or 
    // <a href='dashboard.php'>Edit other posts<a/></p>";

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
    <!-- Content Header (Page header) -->
    <!-- Main content -->

    <h3 class="text-center"  >Manage Account </h3>

    <form action="" method="post" enctype="multipart/form-data" class="row">

    <?php
    
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
                $image= $fetchData['user_image'];
            }
            ?>

<div class="form-group text-center">
                  <label for = "fullname">Firstname</label>
                    <input type="text" name="fullname" class="form-control"placeholder="First Name" required >
                  </div>


                    <div class="form-group text-center">
                    <label for = "fullname">Fullname</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Enter your fullname" value="<?php echo $fullname?>">
                </div>


                <div class="form-group text-center">
                    <label for = "username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter your username" value="<?php echo $username?>">
                </div>

                <div class="form-group text-center">
                    <label for = "email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter your email" value="<?php echo $email?>">
                </div>

                <div class="form-group mt-3 text-center">
                    <label for = "password">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Password" required>
                </div>

                
                <div class="form-group mt-3 text-center">
                    <label for = "password">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Enter your password" value="<?php echo $password?>">
                </div>

                <div class="form-group mt-3 text-center">
                <label for="user_image">Image </label>
            <input type ="file" name="user_image" accept="image/*" value="<?php echo $image?>">
            </div>

            <div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2"type="submit text-center" name="update"  value="Update" >Update</button>
					<button class="btn btn-secondary"  type="button" >Cancel</button>
				</div>
</form>
</div>
  
  <!-- /.content-wrapper -->
</div>



  <?php include('includes/b_footer.php'); ?>
</body>
</html>
