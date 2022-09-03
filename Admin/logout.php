<?php
   $_SESSION['ID'] =  null;
   $_SESSION['NAME'] = null;
   $_SESSION['ROLE'] = null;
   //$_SESSION['role'] = null;
   session_start();
   session_destroy();
   header("Location:login.php");


?>