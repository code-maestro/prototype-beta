<?php
  
  session_start();

  // Checking if session variable has data
  if (isset($_SESSION['id'])) {
  
    // Setting the session variable to null
    $_SESSION['id'] = NULL;

    // Deleting the userdata from the session variable
    unset($_SESSION['id']);

  }

  header("Location: splash.php");
  die;

?>