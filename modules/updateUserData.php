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
     
    $query = "SELECT users.first_name, users.last_name, users.gender, users.phone_number, login.reg_no, login.password, login.email FROM users INNER JOIN login ON users.users_id = login.users_uid AND login.users_uid = '$user' ";

    $insert = new DatabaseModule();
    $insert->saveData($sql);

  }

?>