<?php
   $_SESSION['email'] =  null;
   $_SESSION['username'] = null;
   $_SESSION['fullname'] = null;
   $_SESSION['password'] =  null;
   //$_SESSION['role'] = null;
   session_start();
   session_destroy();
   header("Location:index.php");
?>
