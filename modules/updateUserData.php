<?php

  session_start();

  include_once "../database/db_module.php";

  $user_id = $_SESSION['std_id'];

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $reg_no = $_POST['reg_no'];
  $gender = $_POST['gender'];
  $phone_number = $_POST['phone_number'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];

  if(!empty($user_id)){

    $theQuery = " UPDATE users INNER JOIN login ON users.users_id = login.users_uid
                  AND users.users_id = '$user_id'
                  SET users.first_name = '$fname', users.last_name = '$lname', 
                  users.gender = '$gender', users.phone_number = '$phone_number', 
                  login.reg_no = '$reg_no', login.password = '$password', 
                  login.email = '$email' ";

    $insert = new DatabaseModule();
    $insert->saveData($theQuery);

  }

?>