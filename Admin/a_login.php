


<?php
include ('../config.php');

  if (isset($_SESSION['ID'])) {
    header("Location:a_dasbord.php");
      exit();
  }
  
  if (isset($_POST['submit'])) {

      $errorMsg = "";

     
      $username=mysqli_real_escape_string($conn,$_POST['username']);
      $password=mysqli_real_escape_string($conn, $_POST['password']);
      
  if (!empty($username) || !empty($password)) {
        $sql  = "SELECT * FROM admins WHERE username = '$username'";
        $query = mysqli_query($conn, $sql);
        if($query->num_rows > 0){
            $row = $query->fetch_assoc();
            $_SESSION['ID'] = $row['id'];
            $_SESSION['ROLE'] = $row['role'];
            $_SESSION['NAME'] = $row['fullname'];
            header("Location:a_dasbord.php");
            die();                              
        }else{
          $errorMsg = "No user found on this username";
        } 
    }else{
      $errorMsg = "Username and Password is required";
    }
  }

?>
<meta charset="UTF-8">
<html lang="en">
<head>
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Nolum music app</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/style.css">
  
</head>

<body>
   <!-- Preloader -->
 <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

  <style>
    span{font-size: 15px;
        color:red;
    }
  </style>



<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(assets/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
        <form action="" method="post" enctype="multipart/form-data">
        <?php if (isset($errorMsg)) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $errorMsg; ?>
          </div>
        <?php } ?>

            <p>See what’s new</p>
            <h3>ADMIN PANEL</h3>
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

                            <div class="login-form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>

                                <button type="submit" class="btn oneMusic-btn mt-30"  type="submit" name="submit" value="Log in">Login</button>                       
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center text-center">
                

                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="assets/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="assets/js/active.js"></script>
    
</body>

</html>