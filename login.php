
<?php include ('config.php');?>
<?php 
//include('errors.php'); 

$success_msg['success']= "";
$warning_msg['success']= "";
$errors = array();
include('errors.php'); 


if (isset($_POST['login'])){
     // Data sanitization to prevent SQL injection
   
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);

    // Error message if the input field is left blank
    if (empty($username)) {
        $warning_msg['success']= "Username is required";
    }
    if (empty($password)) {
        $warning_msg['success']= "Password is required";

    
    }
  
    // Checking for the errors
    if (count($errors) == 0) {
         
        // Password matching
        $password = md5($password);
//go to the database and fetch all registered users
$select_data = "SELECT * FROM `account` 
WHERE  `username` = '$username' AND `password`= '$password'";
$check= mysqli_query($conn, $select_data);
$cnt_user = mysqli_num_rows($check);//count the number of the user returned
// $check = 1 means that one user with the
// entered username exists
if ($cnt_user>=1){
 //if the above condition is true , go to the database and fetch the related data in row
 $fetch_user_data=mysqli_fetch_assoc($check);

 $_SESSION['fullname'] =$fetch_user_data['fullname'];
 $_SESSION['pasword'] =$fetch_user_data['password'];
 $_SESSION['id'] =$fetch_user_data['id'];
 
 $_SESSION['username'] =$fetch_user_data['username'];

 // Storing username in session variable
 $_SESSION['username'] = $username;
 
 header("Refresh:1; url=dashboard.php");
    $_SESSION['success'] = "Login Successfully Login";
}}
else { 
    // If the username and password doesn't match
    $_SESSION['warning'] = "Username or password incorrect";
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include ("inc_metadata.php"); ?>
</head>

<body>
  <?php include ("inc_header.php"); ?>


  <style>
    span{font-size: 15px;
        color:red;

    }
  </style>


<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(style/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
        <form action="login.php" method="post" enctype="multipart/form-data">
            <p>See what’s new</p>
            <h2>Login</h2>
            <p class= "text-center text-success fw-bold"><?php echo $success_msg['success'] ?></p>
            <p class= "text-center text-warning fw-bold"><?php echo $warning_msg['success'] ?></p>
            <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Welcome Back</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" name="username"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-mail">
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <button type="submit" class="btn oneMusic-btn mt-30"  type="submit" name="login" value="Log in">Login</button>

                                <a href="#" class="btn oneMusic-btn mt-30" >Forgot Password?</a>

                                    
                                <button type="submit" name="btns" class="btn oneMusic-btn mt-30"><a href="create_account.php" 
                                >Create New Account</a><small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>Don't have an account, create here here!.</small> </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include ('inc_footer.php'); ?>
</body>

</html>

























