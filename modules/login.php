<?php
  
  class Login{

    private $error = "";

    public function auth($data){

      $email = $data['email2'];
      $Password = md5($data['password2']);
            
    // QUERIES TO RETRIEVE THE  DATA 
    $query = "SELECT * FROM login INNER JOIN roles WHERE email = '$email' 
              AND roles.users_uid = login.users_uid LIMIT 1;";

      $DB = new DatabaseModule();
      $result = $DB->readData($query);

      if ($result) {

        $row = $result[0];

        if ($Password === $row['password']) {

          session_start();

          //SESSION DATA CREATION
          $_SESSION['id'] = $row['users_uid'];
          $_SESSION['regno'] = $row['email'];

          if ($row['role_id'] == "1") {
            header("Location: student.php");
          }else {
            header("Location: index.php");
          }

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