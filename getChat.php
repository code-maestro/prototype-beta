<?php 
    session_start();

    if(isset($_SESSION['staff_id'])){

      include 'database/db_module.php';
      include 'modules/user.php';

      $in_id = $_POST['std_id'];
      $out_id = $_SESSION['staff_id'];

      $users = new User();

      $output = $users->getChatData($in_id, $out_id);

      $result = "";

      if ($output) {                 
        foreach ($output as $ROW) {

          if($ROW['sent_msg_id'] === $out_id){

            $result .= ' <div class="outgoing">
                            <div class="details">
                              <p> ' . $ROW['text_msg'] . ' </p>
                            </div>
                          </div>';

          }else{

            $result .= '<div class="incoming">
                          <div class="details">
                          <p> ' . $ROW['text_msg'] . ' </p>
                          </div>
                        </div>';

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