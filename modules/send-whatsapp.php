<?php

  require_once '../vendor/autoload.php';

  session_start();
  
  $complaint = $_SESSION['issue'];
  $link = $_SESSION['meeting_link'];

  // $basic  = new \Vonage\Client\Credentials\Basic("709dbd5d", "uPDF5eJZVqSBRFYR");
  // $client = new \Vonage\Client($basic);

  // $response = $client->

  // $message = $response->current();
  
  //if ($message->getStatus() == 0) {
  if ($link) {

    echo "The message was sent successfully\n";

  } else {
    
    echo "The message not sent ";
    //echo "The message failed with status: " . $message->getStatus() . "\n";
    
  }

  // TEST PHONE NUMBERS
  // 256771976251
  // 256784172445
  // 256787223722

?>