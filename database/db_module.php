<?php

  class DatabaseModule {

    // VARIABLES SPECIFYING THE SERVER AND DATABASE.
    private $server;
    private $username;
    private $password;
    private $dbname;
      
    // FUNCTION/METHOD TO INSTANTIATE THE CONNECTION TO THE DATABASE.
    private function connect(){

      $this->server = "localhost";
      $this->username = "root";
      $this->password = "";
      $this->dbname = "β-prototype";

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

    //function to enter data into the database  

    // public function enterData($token){

    //   $this->connect();
        
    //   $sql = "INSERT INTO zoom-token(access_token) VALUES('$token')";

    //   $res = mysqli_query($conn, $sql);

    //   if (!$res) {
         
    //     return false;

    //     }else {
    //       return true;
    //     }
    // }
  

    // Check is table empty
    public function is_table_empty() {
      
      $conn = $this->connect();

      $sql = "SELECT id FROM zoom-token";

      $result = mysqli_query($conn, $sql);
      
      if($result->num_rows) {
          return false;
      }

      return true;
    }

    // Get access token
    public function get_access_token() {
        
      $conn = $this->connect();

      $sql = "SELECT access-token FROM zoom-token";

      $result = mysqli_query($conn, $sql);

      $result2 = $result->fetch_assoc();

      return json_decode($result2['access-token']);

    }

    // Get referesh token
    public function get_refersh_token() {
        
      $result = $this->get_access_token();
      
      return $result->refresh_token;

    }

    // Update access token
    public function update_access_token($token) {

      if($this->is_table_empty()) {
      
        $this->connect();
        
        $sql = "INSERT INTO zoom-token(access-token) VALUES('$token')";

        $res = mysqli_query($conn, $sql);

        if (!$res) {
          
          return false;

        }else {
          return true;
        }
      
      } else {
      
        $this->connect();
        
        $sql = "UPDATE zoom-token SET access-token = '$token' WHERE id = (SELECT id FROM zoom-token)";

        $res2 = mysqli_query($conn, $sql);

        if (!$res2) {
          
          return false;

        }else {
          return true;
        }
      
      }
    }

  }
?>