<?php 
    session_start();

    if(isset($_SESSION['std_id'])){

      include 'user.php';
      include '../database/db_module.php';

      $out_id = $_SESSION['std_id'];

      print_r($out_id);

      $users = new User();

      $the_id = $users->getChatID($out_id);

      print_r($the_id);

      $output = $users->getChatData($the_id, $out_id);
        
      $result = "";

      if ($output) {                 
        foreach ($output as $ROW) {

          if($ROW['received_msg_id'] === $out_id){

            $result .= ' <li>
                            <span class="notification-title"> 23 </span>
                            <i class="fas fa-circle"></i>
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