<?php

  include 'database/db_module.php';
  include 'modules/signup.php';
  include 'modules/login.php';

  $role = "";
  $regno = "";
  $email = "";
  $fname = "";
  $lname = "";
  $password = "";
  $confirmedPassword = "";

  $result = "";
  $res = "";

  // LOGIN LOGIC
  if (isset($_POST['login'])) {

    $login = new Login();
    $res = $login->auth($_POST);

    if ($res === "") {

      die;
        
    }else {

      $result = $res;

    }

    $email = $_POST['email2'];
    $password = $_POST['password2'];
    
  }

  //  Student signup
  if (isset($_POST['std_register'])) {

    $email = $_POST['email'];

    $query4 = "SELECT email FROM login WHERE email = '$email' LIMIT 1; ";
        
    $DB = new DatabaseModule();

    $db_email = $DB->readData($query4);

    if ($db_email) {

      $row = $db_email[0];

      if ($email === $row['email']) {
        
        $result = "EMAIL IS ALREADY TAKEN ";  
      
      }else {

        $signup = new Signup();
        $result = $signup->evaluate($_POST);

        if ($result != "") {
            $result = "ENTER DATA IN ALL FIELDS";
        }else {
            $result = "SUCCESS";
        }
        
      }

    }else {

        $signup = new Signup();
        $result = $signup->evaluate($_POST);

        if ($result != "") {
          $result;
        }else {
          $result = "SUCCESS";
      
        }
    
    }
    
    $role = $_POST['acc_type'];
    $regno = $_POST['regno'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $password = $_POST['password'];
    $confirmedPassword = $_POST['confirm_password'];
  }

  // Condtion for staff signup
  if (isset($_POST['staff_register'])) {

    $email = $_POST['email'];

    $query4 = "SELECT email FROM users WHERE email = '$email'; ";
        
    $DB = new DatabaseModule();

    $db_email = $DB->readData($query4);

    if ($db_email === $email) {
      echo " <script> alert(' Email is already taken ! ') </script> ";    
    }else {  

      $signup = new Signup();
      $result = $signup->evaluate($_POST);

      if ($result != "") {
          $result .= "ENTER DATA IN ALL FIELDS";
      }else {
          $result = "SUCCESS";
      }
    }

    $role = $_POST['acc_type'];
    $regno = $_POST['regno'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $password = $_POST['password'];
    $confirmedPassword = $_POST['confirm_password'];

  } 

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title> Student Welfare </title>

    <link rel="stylesheet" href="css/index.css">

  </head>

  <body>

    <!-- OFFICIAL ERROR MESSAGE FOR LOGIN  -->
    <span id="err-msg2" > <?php echo $result; ?> </span>

    <main>
      <div class="container" id="container">
        <div class="form-container sign-up-container">
          <div class="form">
            <h1>Create Account</h1>
            <div class="social-container">
              <a href="#" class="student" id="student">STUDENT</a>
              <a href="#" class="staff" id="staff">COUNSELLOR</a>
            </div>

            <div class="overlay-signup">
              <!-- STUDENT SIGNUP CONTAINER -->
              <div class="student-signup" id="student-signup">                
                <form onsubmit="return verifyPassword()" action="" method="post" >
                  <input type="number" name="acc_type" id="acc_type" hidden value="1">
                  <input type="text" name="regno" id="regno" placeholder="Enter Registration Number" required value="<?php echo $regno; ?>">
                  <input type="email" name="email" id="email" placeholder="Enter email" required value="<?php echo $email; ?>">
                  <input type="text" name="first_name" id="first_name" placeholder="Enter Firstname" required value="<?php echo $fname; ?>">
                  <input type="text" name="last_name" id="last_name" placeholder="Enter Lastname" required value="<?php echo $lname; ?>">
                  <input type="password" name="password" id="password" placeholder="Enter Password" required>
                  <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                  <!-- SUBMIT / SIGN UP BUTTON -->
                  <input type="submit" name="std_register" value="Sign up ">
                </form>
              </div>

              <!-- STAFF SIGNUP CONTAINER -->
              <div class="staff-signup " id="staff-signup">
                <form onsubmit="return verifyStaffPassword()" action="" method="post">
                  <input type="number" name="acc_type" id="acc_type" hidden value="2">
                  <input type="text" name="regno" id="regno" hidden value="  ">
                  <input type="email" name="email" id="email" placeholder="Enter email" required>
                  <input type="text" name="first_name" id="first_name" placeholder="Enter Firstname" required>
                  <input type="text" name="last_name" id="last_name" placeholder="Enter Lastname" required>
                  <input type="password" name="password" id="password2" placeholder="Enter Password" required>
                  <input type="password" name="confirm_password" id="confirm_password2" placeholder="Confirm Password" required>
                  <!-- SUBMIT / SIGN UP BUTTON -->
                  <input type="submit" name="staff_register" value="Sign up ">
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- LOGIN CONTAINER -->
        <div class="form-container sign-in-container">
          <form method="POST" class="form">
            <h1> Log in</h1>
            <input type="email" name="email2" placeholder="Enter Email" value="<?php echo $email; ?>" />
            <input type="password" name="password2" placeholder="Enter Password" />
            <a href="#">Forgot your password?</a>
            <input id="login" type="submit" name="login" value="LOG IN" >
          </form>
        </div>

        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1>Welcome Back!</h1>
              <p>To get help and get connected to professional Counsellors, Please login with your personal info</p>
              <button class="ghost" id="signIn">Log In</button>
            </div>
            <div class="overlay-panel overlay-right">
              <h1>Hello, Friend!</h1>
              <p>Enter your personal details and start journey Mental Health Wellness with us</p>
              <button class="ghost" id="signUp">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script src="js/delete.js"></script>

  </body>

</html>