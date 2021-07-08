
<?php

include 'database/db_module.php';
include 'modules/signup.php';
include 'modules/login.php';

$regno = "";
$email = "";
$fname = "";
$lname = "";
$password = "";
$confirmedPassword = "";

$result = "";

if (isset($_POST['login'])) {

  $login = new Login();
  $result = $login->auth($_POST);

  if ($result != "") {
      
      echo $result;
      
  }else {
      header("Location: index.html");
      die;
  }

  $regno = $_POST['regno'];
  $password = $_POST['password'];

  $result = "YOU'VE CLICKED LOG IN 😑🤦‍♀️";
  
}

if (isset($_POST['register'])) {

    $signup = new Signup();
    $result = $signup->evaluate($_POST);

    if ($result != "") {
        $result = "ENTER DATA IN ALL FIELDS";
    }else {
        header("Location: index.html");
        $result = "SUCCESS";
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
      <!-- LOGIN INPUTS -->
      <div class="login">
        <form action="" method="post">
          <input type="text" name="regno" id="regno" placeholder="Enter Emall or Registration Number">
          <input type="password" name="password" id="password" placeholder="Enter Password">
          <!-- LOGIN BUTTON -->
          <input type="submit" name="login" id="login" value="LOGIN">
        </form>
        <p><a href="#">Sign up </a></p>
      </div>

      <!-- SIGN UP INPUTS -->
      <div class="signup">
        <form action="#" method="post">
          <!-- ERROR MESSAGE  -->
          <p class="error"> 
            <?php echo $result ?>
          </p>
          <!-- USER INPUTS -->
          <div class="select">
            <select name="slct" id="slct">
              <option selected disabled>Choose Account type </option>
              <option value="1" id="std" > STUDENT </option>
              <option value="2"> STAFF </option>
              <option value="3"> 
                <input type="number" name="staff" id="staff" value="1" placeholder="2" hidden > 
              </option>
            </select>
          </div>

          <input type="text" name="regno" id="regno" placeholder="Enter Registration Number">
          <input type="email" name="email" id="email" placeholder="Enter email">
          <input type="text" name="first_name" id="first_name" placeholder="Enter Firstname">
          <input type="text" name="last_name" id="last_name" placeholder="Enter Lastname">
          <input type="password" name="password" id="password" placeholder="Enter Password">
          <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
          <!-- SUBMIT / SIGN UP BUTTON -->
          <input type="submit" name="register" value="Sign up ">
        </form>
      </div>
    </section>
  </main>
  
  <script src="js/delete.js"></script>

</body>
</html>