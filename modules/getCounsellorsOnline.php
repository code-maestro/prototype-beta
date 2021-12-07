<?php 
  
  include '../database/db_module.php';
  include 'user.php';

  $sql = '  SELECT users.users_id, users.first_name, users.last_name, users.profile_img_url, login.email, post_login.status 
            FROM users INNER JOIN login INNER JOIN post_login 
            ON users.users_id = login.users_uid 
            AND users.users_id LIKE "STAFF%" 
            AND users.users_id = post_login.users_uid 
            AND post_login.status = "ON"
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
    $result .= '<div class="text"> No Counsellors available .</div>';
  }
  
  echo $result;

?>
