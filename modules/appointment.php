<li>
  <div class="time">
    <span> <?php echo $ROW['start_time'] . " - " . $ROW['end_time']; ?> </span>
  </div>
  <div class="student">
    <img src="resources/img/must.png" alt="avatar">
    <h4> <?php echo $ROW['first_name'] . " " . $ROW['last_name']; ?> </h4>
    <h4 class="complaint"> <?php echo $ROW['complaint']?> </h4>
  </div>
  <div class="actions">
    <i class="fas fa-check"> </i>
    <i class="fas fa-trash"> </i>
  </div>
</li>