<?php

  session_start();
  
  $complaint = $_SESSION['issue'];

  $link = $_SESSION['meeting_link'];

  echo $complaint . " " . $link;

?>