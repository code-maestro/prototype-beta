<?php

  include_once "../database/db_module.php";

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $reg_no = $_POST['reg'];
  $gender = $_POST['gender'];
  $phone_number = $_POST['phone'];
  $password = $_POST['pass'];
  $password2 = $_POST['pass2'];

  if(!empty($message)){

    $theQuery = " UPDATE users INNER JOIN login ON users.users_id = login.users_uid 
                  SET users.first_name = '$fname', users.last_name = '$lname', 
                  users.gender = '$gender', users.phone_number = '$phone_number', 
                  login.reg_no = '$reg_no', login.password = '$password', 
                  login.email = '$email' ";

    $insert = new DatabaseModule();
    $insert->saveData($theQuery);

  }

?>