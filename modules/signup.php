<?php

include 'create.php';

  class Signup{

    private $error = "";

    public function evaluate($data){

      // DATA VALIDATION FROM THE
      foreach ($data as $key => $value) {
        
        if (empty($value)) {

          $this->error = $this->error . $key . " is Empty ! <br> ";
          
        }

        if ($key == "email") {

          if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {
            $this->error = $this->error . " INVALID EMAIL ADDRESS ! <br> ";
          }
        }
      }

      if ($this->error == "") {
        
        $this->create_user($data);

      }else{
        return $this->error;
      }
    }

    public function create_user($data){

      $random = new Create();

      $uid = $random->randomID("STD/");
      $fname = $data['first_name'];
      $lname = $data['last_name'];
      $email = $data['email'];

      $login_id = random_int(1, 10000);
      $regno = $data['regno'];
      $passwrd = md5($data['confirm_password']);
      
      //QUERIES TO ENTER DATA
      $query = "INSERT INTO users (users_id, first_name, last_name, email)
                VALUES ('$uid', '$fname', '$lname', '$email')";

      $query2 = "INSERT INTO login (login_id, reg_no, password)
                  VALUES ('$login_id', '$regno', '$passwrd')";

      $DB = new DatabaseModule();
      $DB->saveData($query);
      $DB->saveData($query2);

    }

  }
?>