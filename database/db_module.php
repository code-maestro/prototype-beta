<?php

  class DatabaseModule {

    // VARIABLES SPECIFYING THE SERVER AND DATABASE.
    private $server;
    private $username;
    private $password;
    private $dbname;
      
    // FUNCTION/METHOD TO INSTANTIATE THE CONNECTION TO THE DATABASE.
    private function connect(){

      //LOCAL DATABASE CONNECTION.
      $this->server = "localhost";
      $this->username = "root";
      $this->password = "";
      $this->dbname = "db";


      // // REMOTE DATABASE CONECTION
      // $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

      // $serva = $url["host"];
      // $uname = $url["user"];
      // $pass = $url["pass"];
      // $db = substr($url["path"], 1);

      try {

        $conn = new mysqli(
          // // REMOTE DEPLOYMENT
          // $serva, 
          // $uname, 
          // $pass, 
          // $db

          // Local development
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

    // Function to insert access token to db
    public function insert_access_token($access_token) {
     
      $this->connect();
        
      $sql = "INSERT INTO zoom-token(access-token) VALUES('$access_token')";

      $res = mysqli_query($conn, $sql);

      if (!$res) {
        
        return false;

      }else {
        return true;
      }
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