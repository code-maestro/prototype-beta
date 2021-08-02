<?php 
    session_start();

    if(isset($_SESSION['std_id'])){

      include 'user.php';
      include '../database/db_module.php';

      $result = "";

      $out_id = $_SESSION['std_id'];

      $users = new User();

      $in_id = $users->getChatID($out_id);  

      $output = $users->getChatData($out_id, $in_id['sent_msg_id']);

      if ($output) {                 
        foreach ($output as $ROW) {

          if($ROW['received_msg_id'] === $out_id){

            $result .= ' <li>
                            <span class="notification-title"> '. $ROW['text_msg'] .' </span>
                          </li>';

          }
        }
      }  else{

        $result .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
      
      }
      
      echo $result;

    }else{

      header("location: ./index.php");

    }

?>