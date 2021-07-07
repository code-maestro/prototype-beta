<?php

    session_start();

    include 'database/db_module.php';
    
    // Checking whether user is logged in 
    if (isset($_SESSION['id'])) {
    
        $regno = $_SESSION['id'];

    }else{
      header("Location: ./splash.php");
      die;
    } 

?>