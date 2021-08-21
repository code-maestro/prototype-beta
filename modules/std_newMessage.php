<?php 

  include_once "../database/db_module.php";

  $incoming_id = $_POST['incomingid'];
  $counsellors = $_POST['email'];
  $message = $_POST['message'];

  if(!empty($message)){
     
    $sql = "INSERT INTO messages (sent_msg_id, received_msg_id,	text_msg)
            VALUES ('$incoming_id', '$counsellors', '$message')";

    $insert = new DatabaseModule();
    $insert->saveData($sql);

  }

?>