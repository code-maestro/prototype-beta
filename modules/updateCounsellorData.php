<?php

  session_start();

  include_once "../database/db_module.php";

  $user_id = $_SESSION['staff_id'];

  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $email = $_POST['mail'];
  $gender = $_POST['gender'];
  $phone_number = $_POST['phone_number'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];

  if(!empty($user_id)){

    $theQuery = " UPDATE users INNER JOIN login ON users.users_id = login.users_uid
                  AND users.users_id = '$user_id'
                  SET users.first_name = '$fname', users.last_name = '$lname',
                  users.phone_number = '$phone_number', users.gender = '$gender',
                  login.reg_no = '$reg_no', login.password = '$password',
                  login.email = '$email' ";

    $insert = new DatabaseModule();
    $insert->saveData($theQuery);

  }

?>