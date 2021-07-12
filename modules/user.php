<?php

  class User {

    public function getData ($uid) {

      $query = " SELECT * FROM users WHERE users_id = '$uid' limit 1 ";

      // $query2 = " SELECT * FROM users WHERE users_uid = '$uid' limit 1 ";
      
      // $query3 = " SELECT * FROM users WHERE users_uid = '$uid' limit 1 ";

      $DB = new DatabaseModule();
      $result = $DB->readData($query);

      if ($result) {
        
        $row = $result[0];

        return $row; 
      }else {

        return false;
         
      }

    }

  }

?>