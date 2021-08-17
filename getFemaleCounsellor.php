<?php 
  
  include 'database/db_module.php';
  include 'modules/user.php';

  $femaleQuery = 'SELECT users.users_id, users.first_name, users.last_name, login.email FROM users INNER JOIN login ON users.users_id = login.users_uid AND users.users_id LIKE "STAFF%" AND users.gender = "female";';

  $counsellors = new User();
  $femaleOutput = $counsellors->getCounsellors($femaleQuery);

  $result = "";

  if ($femaleOutput) {                 
    foreach ($femaleOutput as $ROW) {

      $result .= '<li id=' . $ROW['email'] . ' class= ' . $ROW['first_name'] . ' value = ' . $ROW['last_name'] . ' > ' . $ROW['first_name'] . ' ' . $ROW['last_name'] . ' </li>';

    }
  }  else{

    $result .= '<div class="text"> No Male Counsellors available .</div>';
  
  }
  
  echo $result;

?>