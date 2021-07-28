<?php 
    session_start();
    if(isset($_SESSION['staff_id'])){

      include 'database/db_module.php';
      include 'modules/user.php';

      $users = new User();

      $output = $users->getChatData();
        
      print_r($output);
      
      return $output;

    }else{

      header("location: ./index.php");

    }

?>