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

      $sql = "SELECT * FROM messages LEFT JOIN users ON users.users_id = messages.received_msg_id WHERE received_msg_id = '$in_id' AND sent_msg_id = '$out_id' OR received_msg_id = '$in_id' AND sent_msg_id = '$out_id' ORDER BY id;";

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

      $sql = "SELECT * FROM messages WHERE received_msg_id = '$std_id';";

      $DB = new DatabaseModule();
      $result = $DB->readData($sql);

      if ($result) {

        return $result; 

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

  }

?>