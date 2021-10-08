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

      ?>

      <form onsubmit="return fetchcall()" id="appointment-forms">
        <li id="list" name="list" >
          <div class="time">
            <input type="text" value="<?php echo $ROW['start_time'] . " - " . $ROW['end_time']; ?>" >
          </div>
          <div class="student">
            <img src="resources/img/must.png" alt="avatar">
            <input type="text" name="id" id="appointment_id" value="<?php echo $ROW['appointment_id'] ?>" hidden>
            <input type="text" name="uid" id="uid" value="<?php echo $ROW['users_id'] ?>" hidden>
            <input type="text" name="date" value="<?php echo $ROW['appointment_date'] ?>" hidden>
            <input type="text" name="time" value="<?php echo $ROW['start_time'] . " - " . $ROW['end_time']; ?>" hidden>
            <input type="text" name="regno" value="<?php echo $ROW['reg_no'] ?>" hidden>
            <input type="text" name="email" value="<?php echo $ROW['email'] ?>" hidden>
            <input type="text" name="stdname" class="complaint" value="<?php echo $ROW['first_name'] . " " . $ROW['last_name']; ?>" > 
            <input type="text" name="complaint" class="complaint" value="<?php echo $ROW['complaint']?>" > 
          </div>
          <div class="actions">
            <input class="action-btn" name="viewDetails" value="view details" type="submit" id="viewDetailsbtn">
            <input class="action-btn" name="approve-btn" value="approve" type="submit" >
            <input class="action-btn" name="delete-btn" value="delete" type="submit" id="deleting-btn" >
          </div>
        </li>
      </form>

<?php
  
    }

  }

?>
