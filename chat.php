<?php 

  include_once "database/db_module.php";

  // $incoming_id = $_POST['incoming_id'];
  $message = $_POST['message'];

  if(!empty($message)){
     
     $sql = "INSERT INTO message (message)
              VALUES ('$message')";

      $insert = new DatabaseModule();

      $insert->saveData($sql);

  }
    
?>