<?php
  
  class Login{

    private $error = "";

    public function auth($data){

      $email = $data['email2'];
      $Password = md5($data['password2']);
            
    // QUERIES TO RETRIEVE THE  DATA 
      $query = " SELECT * FROM login INNER JOIN roles INNER JOIN users WHERE login.email = '$email' 
                 AND roles.users_uid = login.users_uid AND login.users_uid = users.users_id LIMIT 1;";

      $DB = new DatabaseModule();
      $result = $DB->readData($query);

      if ($result) {

        $row = $result[0];

        if ($Password === $row['password']) {

          session_start();

          if ($row['role_id'] == "1") {
            
            //SESSION DATA CREATION
            $_SESSION['std_id'] = $row['users_uid'];
            $_SESSION['regno'] = $row['email'];
            $_SESSION['student_names'] = $row['first_name'] ." ". $row['last_name'];
  
            header("Location: student.php");
  
          } else {

            //SESSION DATA CREATION
            $_SESSION['staff_id'] = $row['users_uid'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['counsellor_names'] = $row['first_name'] ." ". $row['last_name'];

            $this->error .= " YOU'VE LOGGED IN SUCCESSFULLY ";

            header("Location: admin.php");

          }

        }else {
          $this->error .= " ** Wrong Login Details  ** ";
        }

      }else {
        $this->error .= " *** Wrong Login Details *** ";
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