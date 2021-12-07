<?php 
  
  include '../database/db_module.php';
  include 'user.php';

  $sql = 
  ' SELECT users.users_id, users.first_name, users.last_name, users.profile_img_url, login.email 
    FROM users INNER JOIN login 
    ON users.users_id = login.users_uid 
    AND users.users_id LIKE "STD%"
  ';

  $counsellors = new User();
  $data = $counsellors->getCounsellors($sql);

  $result = "";

  if ($data) {

    foreach ($data as $ROW) {

      $result .= 
        '
          <div class="wrapped">
            <img src="./resources/'.$ROW['profile_img_url'].'" alt="">
            <h2> Names : ' . $ROW['first_name']  . ' ' . $ROW['last_name'].' </h2>
            <h2> Email : ' . $ROW['email']  . ' </h2>
          </div>
                  
        ';
    }
  }  else{
    $result .= '<div class="text"> No Students available .</div>';
  }
  
  echo $result;

?>
