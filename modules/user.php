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
    public function getChatData() {

      $query = " SELECT * FROM users ";

      $DB = new DatabaseModule();
      $result = $DB->readData($query);

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