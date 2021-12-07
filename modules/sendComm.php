<?php

    include_once "../database/db_module.php";

    session_start();

    if (isset($_SESSION['staff_id'])) {

        $user_id = $_SESSION['staff_id'];

        $info = $_POST['data'];

        $sql = " INSERT INTO communications (comm, users_uid) VALUES ('$info', '$user_id') ";
    
        $insert = new DatabaseModule();
        $insert->saveData($sql);
    
        header("Location: ../admin.php");
    }

?>