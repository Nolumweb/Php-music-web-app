<?php
 include ('../config.php');
 

  if (isset($_POST['submit'])) {
    
    $fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $role=mysqli_real_escape_string($conn, $_POST['role']);
    $password = md5($password);
    $sql  = "INSERT INTO `admins`(`id`, `fullname`, `email`, `username`, `password`, `role`)
    VALUES ('', '$fullname','$email', '$username','$password', '$role')";
    $query = mysqli_query($conn, $sql);
    
    if ($query==true) {
      header("Location:a_login.php");
      die();
    }else{
      $errorMsg  = "You are not Registred..Please Try again";
    }   
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nolum music</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="card text-center" style="padding:20px;">
  <h3>Admin Login</h3>
</div><br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-6">      
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        <form action="" method="POST">
        <div class="form-group text-center">
            <label for="fullname">Fullname:</label>
            <input type="text" class="form-control" name="fullname" placeholder="Enter Fullname" required="">
          </div>

          <div class="form-group text-center">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email" required="">
          </div>
          <div class="form-group text-center">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Enter Username" required="">
          </div>
          <div class="form-group text-center">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
          </div>

          <!-- <div class="form-group text-center mt-2 my-2">
                  <input type="file" class="custom-file-input" id="customFile" name="pics" accept="image/*" >
                  <label class="custom-file-label" for="pics"></label>
        </div> -->

        
            <div class="form-group text-center">
            <label for="role">Role:</label>
            <select class="form-control" name="role" required="">
              <option value="">Select Role</option>
              <option value="admin">Admin</option>
              <option value="moderator">Moderator</option>
            </select>
          </div>


          <div class="form-group text-center">
          
            <input type="submit" name="submit" class="btn btn-primary">
            <a href="a_dasbord.php" class="btn btn-secondary" type="button">Cancel</a>
          </div>
        </form>
      </div>
  </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html>