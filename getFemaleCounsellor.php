<?php 
  
  include 'database/db_module.php';
  include 'modules/user.php';

  $femaleQuery = " SELECT * FROM users WHERE users_id LIKE 'STAFF%' AND gender = 'Female';";

  $counsellors = new User();
  $femaleOutput = $counsellors->getCounsellors($femaleQuery);

  $result = "";

  if ($femaleOutput) {                 
    foreach ($femaleOutput as $ROW) {

      $result .= ' <li> ' . $ROW['first_name'] . ' ' . $ROW['last_name'] .' </li>';

    }
  }  else{

    $result .= '<div class="text"> No messages are available. Once you send message they will appear here.</div>';
  
  }
  
  echo $result;

?>