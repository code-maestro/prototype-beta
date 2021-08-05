<?php 

  include_once "database/db_module.php";

  $incoming_id = $_POST['incoming_id'];
  $received_id = $_POST['counsellor_id'];
  //$counsellors = $_POST['counsellors'];
  $message = $_POST['message'];

  if(!empty($message)){
     
     $sql = "INSERT INTO messages (sent_msg_id, received_msg_id,	text_msg)
              VALUES ('$incoming_id', '$received_id', '$message')";

      $insert = new DatabaseModule();

      $insert->saveData($sql);

  }
    
?>