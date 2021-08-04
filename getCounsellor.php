<?php 
  
  include 'database/db_module.php';
  include 'modules/user.php';

  $counsellors = new User();
  $output = $counsellors->getCounsellors();

  $result = "";

  if ($output) {                 
    foreach ($output as $ROW) {

      $result .= ' <li> ' . $ROW['users_id'] . ' </li>';

    }
  }  else{

    $result .= '<div class="text"> No messages are available. Once you send message they will appear here.</div>';
  
  }
  
  echo $result;

?>