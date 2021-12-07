<?php

  if (isset($_POST['up'])) {

    include_once "../database/db_module.php";
    session_start();
    $user_id = $_SESSION['std_id'];

    $reggg = $_POST['reg_no'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['mail'];
    $reg_no = $_POST['reg_no'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $forKeeps = "/uploads/".$filename;
    $folder = "../resources/".$forKeeps;

    $imageFileType = strtolower(pathinfo($folder,PATHINFO_EXTENSION));

    echo($imageFileType . $filename . $folder);

    // Allow certain file format
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

        $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

    } else {
    
      $msg = "Go on ";
          
      // Now let's move the uploaded image into the folder: image
      if (move_uploaded_file($tempname, $folder))  {
          
        $msg = "Image uploaded successfully";
        
        $theQuery = " UPDATE users INNER JOIN login ON users.users_id = login.users_uid
                      AND users.users_id = '$user_id'
                      SET users.first_name = '$fname', users.last_name = '$lname', 
                      users.gender = '$gender', users.phone_number = '$phone_number',
                      users.profile_img_url = '$forKeeps', login.reg_no = '$reg_no', 
                      login.password = '$password', login.email = '$email' ";
    
        $insert = new DatabaseModule();
        $insert->saveData($theQuery);

        header("Location: ../student.php");   

      }else{
        $msg = "Failed to upload image";
        // header("Location: ../index.php"); 
      }
    }
  }

?>