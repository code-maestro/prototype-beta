<?php
  
  class Login{

    private $error = "";

    public function auth($data){

      $regno = $data['regno2'];
      $Password = md5($data['password2']);
            
    // QUERIES TO RETRIEVE THE  DATA 
    // $query = "SELECT * FROM login INNER JOIN users WHERE reg_no = '$regno' AND login.users_uid = users.users_id LIMIT 1;";

      $query = "SELECT * FROM login WHERE reg_no = '$regno' LIMIT 1;";

      $DB = new DatabaseModule();
      $result = $DB->readData($query);

      print_r($result);

      if ($result) {

        $row = $result[0];

        if ($Password === $row['password']) {

          echo $row['password'];

          session_start();

          //SESSION DATA CREATION
          $_SESSION['id'] = $row['users_uid'];
          //$_SESSION['regno'] = $row['reg_no'];
          //$_SESSION['name'] = $row['last_name'] . $row['first_name'];

          echo $_SESSION['id'];

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