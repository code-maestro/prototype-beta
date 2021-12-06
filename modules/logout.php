<?php

  include '../database/db_module.php';
  
  session_start();

  // Checking if session variable has data
  if (isset($_SESSION['staff_id'])) {

    $logged_sid = $_SESSION['staff_id'];
    $DB = new DatabaseModule();
    $post_login_query = "UPDATE post_login SET status = 'OFF' WHERE users_uid = '$logged_sid'";
    $DB->saveData($post_login_query);
  
    // Setting the session variable to null
    $_SESSION['staff_id'] = NULL;

    // Deleting the userdata from the session variable
    unset($_SESSION['staff_id']);

  }

  // Checking if session variable has data
  if (isset($_SESSION['std_id'])) {

    $logged_id = $_SESSION['std_id'];
    $DB = new DatabaseModule();
    $post_login_query = "UPDATE post_login SET status = 'OFF' WHERE users_uid = '$logged_id'";
    $DB->saveData($post_login_query);
  
    // Setting the session variable to null
    $_SESSION['std_id'] = NULL;

    // Deleting the userdata from the session variable
    unset($_SESSION['std_id']);

  }

  header("Location: ../index.php");
  die;

?>