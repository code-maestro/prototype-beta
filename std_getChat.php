<?php 
    session_start();

    if(isset($_SESSION['std_id'])){

      include 'database/db_module.php';
      include 'modules/user.php';

      $in_id = $_POST['counsellor_id'];
      $out_id = $_SESSION['std_id'];

      $users = new User();

      $output = $users->getChatData($in_id, $out_id);

      $result = "";

      if ($output) {                 
        foreach ($output as $ROW) {

          if($ROW['sent_msg_id'] === $in_id){

            $result .= ' <div class="incoming">
                            <div class="details">
                              <p> ' . $ROW['text_msg'] . ' </p>
                            </div>
                          </div>';

          }else{

            $result .= '<div class="outgoing">
                          <div class="details">
                          <p> ' . $ROW['text_msg'] . ' </p>
                          </div>
                        </div>';

          }
        }
      }  else{

        $result .= '<div class="text"> SELECT A COUNSELLOR TO RETREIVE MESSAGES </div>';
      
      }
      
      echo $result;

    }else{

      header("location: ./index.php");

    }

?>