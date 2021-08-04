<?php 
  
  include 'database/db_module.php';
  include 'modules/user.php';

  $maleQuery = " SELECT * FROM users WHERE users_id LIKE 'STAFF%' AND gender = 'male';";

  $counsellors = new User();
  $maleOutput = $counsellors->getCounsellors($maleQuery);

  $result = "";

  if ($maleOutput) {                 
    foreach ($maleOutput as $ROW) {

      $result .= ' <li> ' . $ROW['first_name'] . ' ' . $ROW['last_name'] . ' </li>';

    }
  }  else{

    $result .= '<div class="text"> No messages are available. Once you send message they will appear here.</div>';
  
  }
    
  echo $result;

?>