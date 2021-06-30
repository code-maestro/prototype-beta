<?php

  class User {

    public function getData ($regno) {

      $query = " SELECT * FROM users WHERE regno = '$regno' limit 1 ";

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