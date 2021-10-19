<?php 
  
  include '../database/db_module.php';
  include 'user.php';

  //$maleQuery = " SELECT * FROM users WHERE users_id LIKE 'STAFF%' AND gender = 'male';";

  $maleQuery = 'SELECT users.users_id, users.first_name, users.last_name, 
                login.email FROM users INNER JOIN login ON users.users_id = login.users_uid
                AND users.users_id LIKE "STAFF%" AND users.gender = "male";';

  $counsellors = new User();
  $maleOutput = $counsellors->getCounsellors($maleQuery);

  $result = "";

  if ($maleOutput) {                 
    foreach ($maleOutput as $ROW) {

      $result .= '<li id=' . $ROW['email'] . ' class= ' . $ROW['first_name'] . ' value = ' . $ROW['last_name'] . ' > ' . $ROW['first_name'] . ' ' . $ROW['last_name'] . ' </li>' .
                  '<input class="the-id" value = ' . $ROW['users_id'] . ' hidden> ';

      $_SESSION['counsellor_id'] = $ROW['users_id'];

    }
  }  else{

    $result .= '<div class="text"> No Female Counsellors available at the moment.</div>';
  
  }

  echo $result;

?>