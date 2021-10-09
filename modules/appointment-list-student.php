<form method="post" id="appointment-forms">
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
      <input class="action-btn" name="delete-btn" value="cancel" type="submit" id="deleting-btn" >
    </div>
  </li>
</form>