<?php

  class User {

    public function getData ($uid) {

      $query = " SELECT * FROM users WHERE users_id = '$uid' limit 1 ";

      $DB = new DatabaseModule();
      $result = $DB->readData($query);

      if ($result) {
        
        $row = $result[0];

        return $row; 

      }else {

        return false;      
      
      }

    }

    // Getting user Messages
    public function getChatData($in_id, $out_id) {

      // $sql = "SELECT * FROM messages LEFT JOIN users ON users.users_id = messages.received_msg_id WHERE received_msg_id = '$in_id' AND sent_msg_id = '$out_id' OR received_msg_id = '$in_id' AND sent_msg_id = '$out_id' ORDERBY 1;";
      $sql = "SELECT * FROM messages 
              WHERE received_msg_id = '$in_id' AND sent_msg_id = '$out_id' 
              OR received_msg_id = '$out_id' AND sent_msg_id = '$in_id';";

      $DB = new DatabaseModule();
      $result = $DB->readData($sql);

      if ($result) {

        return $result; 

      }else {

        return false;      

      }
      
    }

    // Getting user Messages
    public function getChatID($std_id) {

      $sql = "SELECT sent_msg_id, received_msg_id FROM messages WHERE received_msg_id = '$std_id' OR sent_msg_id = '$std_id' LIMIT 1 ;";

      $DB = new DatabaseModule();
      $result = $DB->readData($sql);

      if ($result) {

        $row = $result[0];

        return $row; 

      }else {

        return false;      

      }
      
    }

    // Getting user Messages
    public function getStaffEmail($std_id) {

      $sql = 'SELECT users.first_name, users.last_name, login.email 
              FROM users 
              INNER JOIN login 
              ON users.users_id = login.users_uid 
              AND login.reg_no="";';

      $DB = new DatabaseModule();
      $result = $DB->readData($sql);

      if ($result) {

        $row = $result[0];

        return $row; 

      }else {

        return false;      

      }
      
    }

    // Function to retrieve the total number of users
    public function getTotalUsers($query) {

      $DB = new DatabaseModule();
      $result = $DB->readData($query);

      if ($result) {

        $row = $result[0];

        $string_number = $row['COUNT(id)'];
        
        return $string_number; 

      }else {

        return false;
         
      }

    }

    public function getCounsellors ($query) {

      $DB = new DatabaseModule();
      $result = $DB->readData($query);

      if ($result) {

        return $result; 

      }else {

        return false;      
      
      }

    }

  }

?>