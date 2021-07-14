<?php
  
  session_start();

  // Checking if session variable has data
  if (isset($_SESSION['staff_id'])) {
  
    // Setting the session variable to null
    $_SESSION['staff_id'] = NULL;

    // Deleting the userdata from the session variable
    unset($_SESSION['staff_id']);

  }

  // Checking if session variable has data
  if (isset($_SESSION['std_id'])) {
  
    // Setting the session variable to null
    $_SESSION['std_id'] = NULL;

    // Deleting the userdata from the session variable
    unset($_SESSION['std_id']);

  }

  header("Location: index.php");
  die;

?>