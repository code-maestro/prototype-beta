<?php 

  include_once "database/db_module.php";

  $incoming_id = $_POST['incomingid'];
  //$received_id = $_POST['counsellor_id'];
  $counsellors = $_POST['email'];
  $message = $_POST['message'];

  if(!empty($message)){
     
    $sql = "INSERT INTO messages (sent_msg_id, received_msg_id,	text_msg)
            VALUES ('$incoming_id', '$counsellors', '$message')";

    $insert = new DatabaseModule();
    $insert->saveData($sql);

  }

  // $counsellors = $_POST['email'];

  // echo $counsellors;

  // $sql2 = "INSERT INTO messages (received_msg_id)
  //           VALUES ('$counsellors')";

  // $insert = new DatabaseModule();
  // $insert->saveData($sql2);

?>