<?php

  include_once "../database/db_module.php";
  include_once 'create.php';

  $date = $_POST['selectDate'];
  $start_time = $_POST['selectStart'];
  $end_time = $_POST['selectEnd'];
  $complaint = $_POST['complaint'];
  $complaint_detail = $_POST['complaint_detail'];

  session_start();

  $uid = $_SESSION['std_id']; 

  echo $uid;
    
  $random = new Create();
  $appointment_id = $random->randomID("A-");

  // SQL query to save the appointment to db
  $query = "INSERT INTO appointments (appointment_id, complaint, complaint_detail, appointment_date, start_time, end_time, users_uid) 
            VALUES ('$appointment_id', '$complaint', '$complaint_detail', '$date', '$start_time', '$end_time', '$uid')";

  $DB = new DatabaseModule();        
  $DB->saveData($query);

?>