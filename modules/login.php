<?php
  
  class Login{

    private $error = "";

    public function auth($data){

      $Regno = $data['regno'];
      $Password = md5($data['password']);
            
    // QUERIES TO RETRIEVE THE  DATA FROM
    // LOGIN TABLE
      $query = "SELECT * FROM users WHERE regno = '$Regno' limit 1 ";

      $DB = new DatabaseModule();
      $result = $DB->readData($query);

      if ($result) {
        
        $row = $result[0];

        if ($Password === $row['password']) {
          //SESSION DATA CREATION
          $_SESSION['id'] = $row['user_id'];
          $_SESSION['regno'] = $row['regno'];

        }else {
         $this->error .= $row['password'] . " " . "WRONG PASSWORD MAN TRY AGAIN";
        }

      }else {
        $this->error .= "WRONG REGISTRATION NUMBER MAN TRY AGAIN";
      }

      return $this->error;

    }

    // Checking login with id
    public function checkId ($user_id) {

      // Query checcking the user id from DB
      $query = "SELECT user_id FROM users WHERE user_id = '$user_id' limit 1 ";

      $DB = new DatabaseModule();
      $result = $DB->readData($query);

      if($result){
        return true;
      }

      return false;
    }

  }

?>