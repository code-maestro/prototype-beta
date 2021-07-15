<li id="list" onclick="viewData()" >
  <div class="time">
    <input type="text" value="<?php echo $ROW['start_time'] . " - " . $ROW['end_time']; ?>" >
  </div>
  <div class="student">
    <img src="resources/img/must.png" alt="avatar">
    <input type="text" class="complaint" id="std-name" value="<?php echo $ROW['first_name'] . " " . $ROW['last_name']; ?>" > 
    <input type="text" class="complaint" id="complaint" value="<?php echo $ROW['complaint']?>" > 
  </div>
  <div class="actions">
    <i class="fas fa-check" id="approve-btn" onclick="viewData2()"> </i>
    <i class="fas fa-trash"> </i>
  </div>
</li>
