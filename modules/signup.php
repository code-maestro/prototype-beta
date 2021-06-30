<?php

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

        echo "all is well fam 😎🎉🎉";

      }else{
        return $this->error;
      }
    }

    public function create_user($data){

      $uniqueID = rand(time(), 100000000);
      $fname = ucfirst($data['fname']);
      $lname = ucfirst($data['lname']);
      $regno = $data['regno'];
      $email = $data['email'];
      $phoneNo = $data['phone'];
      $passwrd = md5($data['confirm_password']);
      
    // QUERIES TO STORE THE  DATA INTO -
    // REGISTER TABLE
      $query = "INSERT INTO users 
                (user_id, fname, lname, regno, email, phone_number, password)
                VALUES
                  ('$uniqueID',
                  '$fname',
                  '$lname', 
                  '$regno',
                  '$email',
                  '$phoneNo', 
                  '$passwrd')";

    // VIEWING THE EXECUTED QUERIES
      echo $query;

      $DB = new DatabaseModule();
      $DB->saveData($query);

    }

    // private function randomID(){
      
    //   $length = rand(2, 3);

    //   $number = "STAFF";

    //   for ($i=0; $i < $length; $i++) { 

    //     $new_num = rand(1,100);
    //     $num = $number . $new_num;
    //   }

    //   return $num;
 
    // }
  }
?>