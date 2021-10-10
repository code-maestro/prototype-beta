<?php
  
  include_once '../database/db_module.php';
  include_once 'create.php';

  //Retrieving appointments
  $sql = "SELECT appointment_id, complaint, appointment_date, start_time, end_time, users_id, first_name, last_name, reg_no, email 
          FROM appointments INNER JOIN users INNER JOIN login 
          WHERE users.users_id = appointments.users_uid 
          AND appointments.users_uid = login.users_uid ORDER BY appointments.id DESC";

  $sql_pending = "SELECT appointment_id, complaint, appointment_date, start_time, end_time, users_id, first_name, last_name, reg_no, email 
                  FROM appointments INNER JOIN users INNER JOIN login
                  WHERE users.users_id = appointments.users_uid 
                  AND appointments.users_uid = login.users_uid
                  AND appointments.status = 0";

  $sql_approved = " SELECT appointment_id, complaint, appointment_date, start_time, end_time, users_id, first_name, last_name, reg_no, email 
                    FROM appointments INNER JOIN users INNER JOIN login
                    WHERE users.users_id = appointments.users_uid 
                    AND appointments.users_uid = login.users_uid
                    AND appointments.status = 1";


  $sqll = "SELECT * FROM appointments";

  $info = new Create();
  
  $list = $info->retrieveAppointments($sql_pending);

  if ($list) {

    foreach ($list as $ROW) {

      include 'appointment-list-admin.php';
  
    }
  }
?>