<?php
  
  include_once '../database/db_module.php';
  include_once 'create.php';
  include_once 'user.php';

  session_start();

  $user_id = $_SESSION['std_id'];

  $staff_id = new User();
  $current_staff =$staff_id->getChatID($user_id);

  $new_appointment = new Create();

  //Retrieving appointments
  $query = "SELECT * FROM appointments INNER JOIN users INNER JOIN login
            WHERE appointments.users_uid = '$user_id'
            AND appointments.users_uid = users.users_id
            AND appointmentS.users_uid = login.users_uid;";

  $query_approved = "SELECT * FROM approved_appointment INNER JOIN users INNER JOIN login
                     WHERE approved_appointment.users_uid = '$user_id'
                     AND appointments.users_uid = users.users_id
                     AND appointmentS.users_uid = login.users_uid;";

  $my_list = $new_appointment->retrieveAppointments($query);

  if ($my_list) {

    foreach ($my_list as $ROW) {

      include 'appointment-list-student.php';
  
    }

  }

?>
