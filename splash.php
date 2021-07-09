
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

// if (isset($_POST['login'])) {

//   $login = new Login();
//   $result = $login->auth($_POST);

//   if ($result != "") {
      
//       echo $result;
      
//   }else {
//       header("Location: index.html");
//       die;
//   }

//   $regno = $_POST['regno'];
//   $password = $_POST['password'];

//   $result = "YOU'VE CLICKED LOG IN 😑🤦‍♀️";
  
// }

if (isset($_POST['std_register'])) {

    $signup = new Signup();
    $result = $signup->evaluate($_POST);

    if ($result != "") {
        $result = "ENTER DATA IN ALL FIELDS";
    }else {
      //  header("Location: splash.php");
        $result = "SUCCESS";
    }

    $role = $_POST['acc_type'];
    $regno = $_POST['regno'];
    $email = $_POST['email'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $password = $_POST['password'];
    $confirmedPassword = $_POST['confirm_password'];
  } 

  
  if (isset($_POST['staff_register'])) {

    $signup = new Signup();
    $result = $signup->evaluate($_POST);

    if ($result != "") {
        $result = "ENTER DATA IN ALL FIELDS";
    }else {
      //  header("Location: splash.php");
        $result = "SUCCESS";
    }

    $role = $_POST['acc_type'];
    $email = $_POST['email'];
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
    <title>Document</title>

    <link rel="stylesheet" href="css/design.css">

  </head>

  <body>

    <main>
      <div class="container" id="container">
        <div class="form-container sign-up-container">
          <div class="form">
            <h1>Create Account</h1>
            <div class="social-container">
              <a href="#" class="student" id="student">STUDENT</a>
              <a href="#" class="staff" id="staff">STAFF</a>
            </div>
              <div class="overlay-signup">
                <div class="student-signup" id="student-signup">

                  <span id="err-msg" > <?php echo $result; ?> </span>
                
                  <form action="" method="post">
                    <input type="number" name="acc_type" id="acc_type" hidden value="1">
                    <input type="text" name="regno" id="regno" placeholder="Enter Registration Number" required>
                    <input type="email" name="email" id="email" placeholder="Enter email" required>
                    <input type="text" name="first_name" id="first_name" placeholder="Enter Firstname" required>
                    <input type="text" name="last_name" id="last_name" placeholder="Enter Lastname" required>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                    <!-- SUBMIT / SIGN UP BUTTON -->
                    <input type="submit" name="std_register" value="Sign up ">
                  </form>
                </div>

                <div class="staff-signup " id="staff-signup">

                  <span id="err-msg"> <?php echo $result; ?> </span>

                  <form class="form" action="" method="post">
                    <input type="number" name="acc_type" id="acc_type" hidden value="2">
                    <input type="email" name="email" id="email" placeholder="Enter email">
                    <input type="text" name="first_name" id="first_name" placeholder="Enter Firstname">
                    <input type="text" name="last_name" id="last_name" placeholder="Enter Lastname">
                    <input type="password" name="password" id="password" placeholder="Enter Password">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                    <!-- SUBMIT / SIGN UP BUTTON -->
                    <input type="submit" name="staff_register" value="Sign up ">
                  </form>

                </div>
              </div>

          </div>
        </div>
        <div class="form-container sign-in-container">
          <form action="#" method="post" class="form">
            <h1> Log in</h1>
            <div class="social-container">
              <span id="err-msg"> <?php echo $result; ?> </span>
            </div>
            <input type="email" placeholder="Email" />
            <input type="password" placeholder="Password" />
            <a href="#">Forgot your password?</a>
            <input id="login" type="submit" name="login" value="LOG IN">
          </form>
        </div>
        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1>Welcome Back!</h1>
              <p>To keep connected with us please login with your personal info</p>
              <button class="ghost" id="signIn">Log In</button>
            </div>
            <div class="overlay-panel overlay-right">
              <h1>Hello, Friend!</h1>
              <p>Enter your personal details and start journey with us</p>
              <button class="ghost" id="signUp">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script src="js/delete.js"></script>

  </body>

</html>