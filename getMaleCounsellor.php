<?php 
  
  include 'database/db_module.php';
  include 'modules/user.php';

  $maleQuery = " SELECT * FROM users WHERE users_id LIKE 'STAFF%' AND gender = 'male';";

  $counsellors = new User();
  $maleOutput = $counsellors->getCounsellors($maleQuery);

  $result = "";

  if ($maleOutput) {                 
    foreach ($maleOutput as $ROW) {

      $result .= '<li> ' . $ROW['first_name'] . ' ' . $ROW['last_name'] . ' </li>
                  <input class="the-id" value=' . $ROW['users_id'] . ' hidden>';

      session_start();
      $_SESSION['counsellor_id'] = $ROW['users_id'];

    }
  }  else{

    $result .= '<div class="text"> No Female Counsellors available at the moment.</div>';
  
  }

  echo $result;

?>