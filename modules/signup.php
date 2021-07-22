<?php

include 'create.php';

  class Signup{

    private $error = "";

    public function evaluate($data){

      // DATA VALIDATION
      foreach ($data as $key => $value) {
        
        if (empty($value)) {

          $this->error = $this->error . $key . " is Empty ! <br> ";
          
        }

        if ($key == "email") {

          if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {
            
            $this->error = $this->error . " INVALID EMAIL ADDRESS ! <br> ";
          
          }
          
        }

        if ($key == "first_name") {

          if (is_numeric($value)) {
            $this->error = $this->error . " FIRST NAME SHOULD CONTAIN ALPHABETICAL LETTERS <br> ";
          }
        }

        if ($key == "last_name") {

          if (is_numeric($value)) {
            $this->error = $this->error . " LAST NAME SHOULD CONTAIN ALPHABETICAL LETTERS <br> ";
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

      $fname = $data['first_name'];
      $lname = $data['last_name'];
      $email = $data['email'];

      $login_id = random_int(1, 10000);
      $regno = $data['regno'];
      $password = md5($data['password']);
      $password2 = md5($data['confirm_password']);

      $role = $data['acc_type'];

      $random = new Create();

      if ($role == "1") {

        $uid = $random->randomID("STD/");

      }else {
        
        $uid = $random->randomID("STAFF/");

      }

       //QUERIES TO ENTER DATA 
      $query = "INSERT INTO users (users_id, first_name, last_name)
                VALUES ('$uid', '$fname', '$lname')";

      $query2 = "INSERT INTO login (login_id, reg_no, password, users_uid, email)
                 VALUES ('$login_id', '$regno', '$password', '$uid', '$email' )";

      //Query for the Role
      $query3 = "INSERT INTO roles (role_id, users_uid) 
                 VALUES ('$role', '$uid')";

      $DB = new DatabaseModule();
      $DB->saveData($query);
      $DB->saveData($query2);  
      $DB->saveData($query3);

    }

  }
?>