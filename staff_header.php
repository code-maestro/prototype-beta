<?php

    session_start();

    include 'database/db_module.php';
    include 'modules/user.php';
    
    // Checking whether user is logged in 
    if (isset($_SESSION['staff_id'])) {
    
        $user_id = $_SESSION['staff_id'];

        $user_data = new User();

        $user_details = $user_data->getData($user_id);

        // Checking if the logged in user exists in db
        if (!$user_details) {
          // Redirecting if use is not found
          header("Location: ./index.php");
          die;
        }

    }else{
      header("Location: ./index.php");
      die;
    } 

?>