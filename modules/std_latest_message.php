<?php

  session_start();

  $user_id = $_SESSION['std_id'];

  if(isset($user_id)){

    include '../database/db_module.php';

    $result = "";

    $query_notification = " SELECT messages.text_msg, users.first_name, users.last_name 
                            FROM messages INNER JOIN users WHERE messages.received_msg_id = '$user_id' 
                            AND users.users_id=messages.sent_msg_id 
                            ORDER BY id DESC LIMIT 1;";

    $db = new DatabaseModule();
    $data = $db->readData($query_notification);

    if ($data) {                 
      foreach ($data as $ROW) {

        $name = $ROW['first_name'] . " " . $ROW['last_name'];
        $result .= " New Message from " . $name ;

        echo $result;

      }
    }
  
  }
    
?>