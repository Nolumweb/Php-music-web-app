
<?php include ('config.php');?>

<?php
$msg = "";
$errors = array();
$_SESSION['success'] = "";
$username = "";
$id = "";


if (isset($_POST['submit'])){
    $fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $c_password=mysqli_real_escape_string($conn, $_POST['c-password']);
    $image =$_FILES ['user_image']['name'];
    $image_tmp =$_FILES ['user_image']['tmp_name'];
    move_uploaded_file($image_tmp, "images/$image");
    //move_uploaded_file($image_tmp, $location . $image);

    $reg_date=date('D_m_y');

    if (!empty($fullname)){
        if (!empty($username)){
            if (!empty($email)){
                if ($password != ''){
                  if(strlen($password) >= 6){
                if ($password === $c_password && $c_password=1){
                    $password = md5($password);
                            //select from database to get all the registered emails and username
                                    $sel_data="SELECT `email`, `username` FROM `account` WHERE `email` = '$email' OR `username` ='$username'";
                                    $query_it = mysqli_query($conn, $sel_data);
                                    $count_it =mysqli_num_rows($query_it);
                                    while($row =mysqli_fetch_assoc($query_it)){
                                     $db_email=$_POST['email'];
                                    $db_username=$_POST['username'];
                }
            
                if($count_it > 0){
                    if($email===$db_email || $username === $db_username){
                    $msg= "Email/ Username already exist";
                    }
                }else{
                    //this ll insert only when the condition are true
                    $sql =  "INSERT INTO `account`(`id`, `fullname`, `username`, `email`, `password`, `confirm_pass`, `Date`, `user_image`) 
                    VALUES ('', '$fullname', '$username', '$email','$password', '$c_password','$reg_date', '$image')";
                    $query = mysqli_query($conn, $sql);

                   
                    // Welcome message
                    $_SESSION['success'] = "You have logged in";


                    header("Refresh:2; url=login.php");
                    if ($query){
                $_SESSION['success'] = "You Have Registered";
                       
                     } else{
                        // echo"not successful";
                        die ('Database error').mysqli_error($connect);
                     }
                     
                     
                    echo'free to register';
                }
            }else{
                    $msg = "Passwords must match";
                  }
    
                }else{
                    $msg = "Password length must be at the range of 6-12 characters";
                }
            }else{
                $msg = "Password cannot be empty";
            }
        }else{
            $msg = "Email cannot be empty";
        }
    }else{
        $msg = "Username cannot be empty";
    }
    }else{
        $msg = "Fullname cannot be empty";
    }
    
    }?>
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
        <form action="create_account.php" method="post" enctype="multipart/form-data">
		        <?php include('errors.php'); ?>
            <p class= "text-center text-warning fw-bold"><?php echo $msg ?></p>
             <p class= "text-center text-success fw-bold"><?php echo $_SESSION['success'] ?></p> 



            <p>See what’s new</p>
            <h2>Register</h2>
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

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fullname</label>
                                    <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Fullname">
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small>
                                </div>


                                <div class="login-form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-mail">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Confirm password</label>
                                    <input type="password" name="c-password" class="form-control" id="exampleInputPassword1" placeholder="Confirm-password">  
                                </div>
                                        <!-- image here -->
                                 <input type="file" class="bg-primary"  name="user_image" accept="image"> <br>
                                  <!-- submit button here   -->
                                <button type="submit" class="btn oneMusic-btn"  type="submit" name="submit" value="submit">Sign up</button>
                                    
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>Have an account already, login here!.</small>
                                <button type="submit" name="btns" class="btn oneMusic-btn "><a href="login.php">Login</a> </button>
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



