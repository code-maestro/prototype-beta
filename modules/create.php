<?php

  class Create {

    private $error = "";

    // Function to create an appointment
    public function createAppointment($uid, $data){

      $appointment_id = rand(time(), 100000000);
      
      if (!empty($data)) {
        
        $reason = addslashes($data['reason']);
        $appointment_date = addslashes($data['select-date']);
        $appointment_time = addslashes($data['select-time']);

      // SQL query to save the appointment to db
      $query = "INSERT INTO appointment (appointment_id, reason, appointment_date, appointment_time, userid) 
                VALUES ('$appointment_id', '$reason', '$appointment_date', '$appointment_time', '$uid')";

        $DB = new DatabaseModule();
        $DB->saveData($query);
        
      }else {
        $this->error .= "Please enter something to send 😒😒 </br> ";
      }
    }

  // Creating Pending appointment
    public function createPending($uid, $data){

      $pending_id = rand(time(), 1000000);
      
      if (!empty($data)) {
        
        $reason = addslashes($data['reason']);
        $pdate = addslashes($data['select-date']);

      // SQL query to save pending to db
      $query = "INSERT INTO pending_appointments (pending_id, reason, date, user_id) 
                VALUES ('$pending_id', '$reason', '$pdate', '$pending_time', '$uid')";

        $DB = new DatabaseModule();
        $DB->saveData($query);
        
      }else {
        $this->error .= "Please enter something to send 😒😒 </br> ";
      }
    }

    // Function for creating a communication text
    public function createCommunication($uid, $data){
      
      if (!empty($data)) {
        
        $info_id = rand(time(), 10000);

        $info = $data;
        
        //Timestamp
        $info_date_time = date("Y-m-d H:i:s"); 

      // SQL query to save thenissue to db
      $query = "INSERT INTO communications (info_id, info, info_time, userid) 
                VALUES ('$info_id', '$info', '$info_date_time', '$uid')";
  
        $DB = new DatabaseModule();
        $DB->saveData($query);
        
      }else { 
        $this->error .= "Please enter something to send 😒😒 </br> ";
      }
    }

    // Function to create an issue 
    public function createIssue($uid, $data){

      $issue_id = rand(time(), 100000000);
      
      if (!empty($data)) {
        
        $issue = addslashes($data);

      // SQL query to save thenissue to db
      $query = "INSERT INTO issues_raised (issue_id, issue, userid) VALUES ('$issue_id', '$issue', '$uid')";
  
        $DB = new DatabaseModule();
        $DB->saveData($query);

      }else {
        $this->error .= "Please enter something to send 😒😒 </br> ";
      }
    }

    // Function creating new random IDs
    public function randomID($word){
          
      $length = rand(2, 5);

      for ($i=0; $i < $length; $i++) { 

        $new_num = rand(1,10000);
        $num = $word . $new_num;
      }

      return $num;

    }

    // Functions to retrieve appointments from database.
    public function retrieveAppointments(){

        $query = "SELECT * FROM users" ;

        $DB = new DatabaseModule();
        $appointments = $DB->readData($query);

        if ($appointments) {
          return $appointments;
        }else {
          return false;
        }
    }

  }
?>