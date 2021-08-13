<?php

  class Create {

    private $error = "";

    // // Function to create an appointment
    // public function createAppointment($uid, $data){

    //   $random = new Create();
    //   $appointment_id = $random->randomID("A-");
      
    //   if (!empty($data)) {
        
        // $date = $data['select-date'];
        // $start_time = $data['start-time'];
        // $end_time = $data['end-time'];
        // $complaint = addslashes($data['complaint']);
        // $complaint_detail = addslashes($data['complaint-detail']);

    //     // SQL query to save the appointment to db
    //     $query = "INSERT INTO appointments (appointment_id, complaint, complaint_detail, date, start_time, end_time, users_uid) 
    //               VALUES ('$appointment_id', '$complaint', '$complaint_detail', '$date', '$start_time', '$end_time', '$uid')";

    //     $DB = new DatabaseModule();        
    //     $DB->saveData($query);
        
    //   }else {
    //     $this->error .= "Please enter all the required information </br> ";
    //   }
    // }

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
    public function createMessage($sent_id, $sent_msg){
      
      if (!empty($sent_msg)) {

        // SQL query to save messsage to db
        $query = "INSERT INTO messages (sent_msg_id, received_msg_id, text_msg) 
                  VALUES ('$sent_id', '$sent_msg')";
  
        $DB = new DatabaseModule();        
        $DB->saveData($query);

      }else {

        $this->error .= "Please enter something to send 😒😒 </br> ";
        
      }
    }

        // Function to create an issue 
    public function createMsg($msg){
  
      if (!empty($msg)) {

        // SQL query to save messsage to db
        $query = "INSERT INTO message (message) 
                  VALUES ('$msg')";
  
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
        $new_random_id = $word . $new_num;
      }

      return $new_random_id;

    }

    // Functions to retrieve appointments from database.
    public function retrieveAppointments($sql){

      $DB = new DatabaseModule();        
      $appointments = $DB->readData($sql);

      if ($appointments) {
        return $appointments;
      }else {
        return false;
      }
    }

    // Function to retrieve zoom access token from db
    public function isTableEmpty(){

      $checkingQuery = "SELECT id FROM zoom-token";

      $DB = new DatabaseModule();        

      $result = $DB->readData($checkingQuery);

      if ($result->num_rows) {
        return false;
      }else {
        return true;
      }

    }

    // Function to retrieve zoom access token from db
    public function getAcessToken($user_id){

      $tokenQuery = "SELECT acess-token FROM zoom-token WHERE users_uid = '$user_id'; ";

      $DB = new DatabaseModule();        

      $result = $DB->readData($tokenQuery);

      if ($result) {
        return json_decode($result['access-token']);
      }else {
        return $this.error . " Nothing no zoom access token received 😒 ";
      }

    }

     // Function to update zoom access token from db
    public function updateAcessToken($newToken){

      $newTokenQuery = "INSERT INTO zoom-token (access-token) VALUES '$newToken';";

      $updateTokenQuery = "UPDATE zoom-token SET access-token = '$newToken' WHERE users_uid = '$user_id'; ";

      $DB = new DatabaseModule();        

      if (isTableEmpty()) {
        $DB->saveData($newTokenQuery);
      }else {
        $DB->saveData($updateTokenQuery);
      }

    }

  }

?>