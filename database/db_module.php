<?php

  class DatabaseModule {

    // VARIABLES SPECIFYING THE SERVER AND DATABASE.
    private $server;
    private $username;
    private $password;
    private $dbname;
      
    // FUNCTION/METHOD TO INSTANTIATE THE CONNECTION TO THE DATABASE.
    private function connect(){

      // //LOCAL DATABASE CONNECTION.
      // $this->server = "localhost";
      // $this->username = "root";
      // $this->password = "";
      // $this->dbname = "counsellor";

      // REMOTE PRODUCTION DATABASE CONECTION
      $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

      $this->server = $url["host"];
      $this->username = $url["user"];
      $this->password = $url["pass"];
      $this->dbname = substr($url["path"], 1);

      try {

        $conn = new mysqli(
   
          $this->server,
          $this->username,
          $this->password,
          $this->dbname

        );

      } catch (Exception $e) {

        echo "connection to the database failed " . $e->getMessage();

      }

      return $conn;
      
    }

    //READ FUNCTION/METHOD TO RETRIEVE DATA PASSED TO IT WHEN IT'S CALLED
    public function readData($query){

      $conn = $this->connect();

      $result = mysqli_query($conn, $query);

      if (!$result) {

        return false;

      }else {
        
        $data = false;

        while ($row = mysqli_fetch_assoc($result)) {
          
          $data[] = $row;

        }

        return $data;

      }
    }

    //SAVE METHOD TO STORE THE DATA PASSED TO IT WHEN IT'S CALLED
    public function saveData($query){
      
      $conn = $this->connect();

      $result = mysqli_query($conn, $query);

      if (!$result) {
        
        return false;

      }else {

        return true;
        
      }
      
    }

  }
?>