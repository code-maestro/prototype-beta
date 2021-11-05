<?php

    $msg = " ";

    // If upload button is clicked ...
    if (isset($_POST['up'])) {
    
        $filename = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];    
        $folder = "../assets/".$filename;

        $imageFileType = strtolower(pathinfo($folder,PATHINFO_EXTENSION));

        // Allow certain file format
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

            $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

        } else {
        
            $msg = "Go on ";
            
                
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $folder))  {
                
                $msg = "Image uploaded successfully";

            }else{
                
                $msg = "Failed to upload image";

            }
        }
    }

?>