<?php 
    session_start();

    if(isset($_SESSION['staff_id'])){

      include '../database/db_module.php';
      include 'user.php';

      $user = $_SESSION['staff_id'];

      $query = "SELECT users.first_name, users.last_name, users.gender, users.phone_number, login.reg_no, login.password, login.email FROM users INNER JOIN login ON users.users_id = login.users_uid AND login.users_uid = '$user' ";

      $counsellors = new User();
      $output = $counsellors->getCounsellors($query);
    
      $result = "";
    
      if ($output) {    

        foreach ($output as $key => $value) {
                  
          $result .= 
          '
            <div class="row">
              <input type="text" id="update_first_name" placeholder="First Name" value=' . $value['first_name'] . '>
              <input type="text" id="update_last_name" placeholder="Last Name" value=' . $value['last_name'] . '>
            </div>

            <div class="row">
              <input type="email" id="update_email" placeholder="Email" value=' . $value['email'] .'>
              <input type="email" id="update_email" placeholder="Email" value=' . $value['email'] .'>
            </div>

            <div class="row">
              <input type="text" id="update_gender" name="gender" placeholder="Gender" value=' . $value['gender'] . '>
              <input type="text" id="update_phone" placeholder="Phone Number" value=' . $value['phone_number'] . '>
            </div>

            <div class="row">
              <input type="password" id="update_pass" placeholder="Password" value=' . $value['password'] . '>
              <input type="password" id="update_pass2" placeholder="Comfirm Password" value=' . $value['password'] . '>
            </div>

          '
          ;

        }
       
      }  else{
    
        $result .= '<div class="text"> Not available at the moment. </div>';
      
      }
    
      echo $result;  

    }

?>