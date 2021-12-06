<?php 
  
  include '../database/db_module.php';
  include 'user.php';

  $sql = 'SELECT users.users_id, users.first_name, users.last_name, login.email FROM users INNER JOIN login ON users.users_id = login.users_uid AND users.users_id LIKE "STAFF%"';

  $counsellors = new User();
  $data = $counsellors->getCounsellors($sql);

  $result = "";

  if ($data) {

    foreach ($data as $ROW) {

      $result .= 
        '
            <div class="wrapped">
                <img src="https://cdn.vox-cdn.com/thumbor/KmUSGKjWbKxOCahy4yZkw17HZ64=/0x0:2370x1574/920x613/filters:focal(996x598:1374x976):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/68870438/Screen_Shot_2020_07_21_at_9.38.25_AM.0.png" alt="">
                <h2> '.$ROW['last_name'].' </h2>
                <h2> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, numquam? </h2>
            </div>
                  
        ';

    }
  }  else{

    $result .= '<div class="text"> No Male Counsellors available .</div>';
  
  }
  
  echo $result;

?>
