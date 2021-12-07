<?php

    include_once "../database/db_module.php";

    session_start();

    if (isset($_SESSION['staff_id'])) {

        $user = $_SESSION['staff_id'];

        $info = $_POST['data'];

        $sql = " INSERT INTO communications (comm, users_uid) VALUES ('$info', '$user') ";
    
        $insert = new DatabaseModule();
        $insert->saveData($sql);
    
        header("Location: ../admin.php");
    }

?>