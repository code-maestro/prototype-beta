
<?php

include 'database/db_module.php';
include 'modules/signup.php';

$regno = "";
$email = "";
$fname = "";
$lname = "";
$password = "";
$confirmedPassword = "";

if (isset($_POST['register'])) {

    $signup = new Signup();
    $result = $signup->evaluate($_POST);

    if ($result != "") {
        echo $result;
    }else {
        header("Location: login.php");
        die;
    }

    $regno = $_POST['regno'];
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
  <title> Willkommen </title>

  <link rel="stylesheet" href="css/splash.css">

</head>
<body>

  <main>
    <section class="display-svg">
      <img src="resources/img/must.png" alt="" srcset="">
    </section>
    <section class="inputs">
      <div class="login">
        <input type="text" name="regno" id="regno" placeholder="Enter Emall or Registration Number">
        <input type="password" name="password" id="password" placeholder="Enter Password">
        <input type="submit" name="login" id="login" value="LOGIN">
        <p><a href="#">Sign up </a></p>
      </div>
      <div class="signup">
        <input type="text" name="regno" id="regno" placeholder="Enter Registration Number" value="">
        <input type="email" name="email" id="email" placeholder="Enter email" value="">
        <input type="text" name="first_name" id="first_name" placeholder="Enter Firstname " value="">
        <input type="text" name="last_name" id="last_name" placeholder="Enter Lastname" value="">
        <input type="password" name="password" id="password" placeholder="Enter Password">
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
        <input type="submit" name="register" value="Sign up ">
      </div>
    </section>
  </main>
  
</body>
</html>