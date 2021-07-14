<?php

  include_once 'std_header.php';
  include_once 'modules/user.php';
  include_once 'modules/create.php';

  $date = "";
  $start_time = "";
  $end_time = "";
  $complaint = "";
  $complaint_detail = "";

  $new_appointment = new Create();

  //  Student signup
  if (isset($_POST['make-btn'])) {

    $new_appointment->createAppointment($user_id, $_POST);

    $date = $_POST['select-date'];
    $start_time = $_POST['start-time'];
    $end_time = $_POST['end-time'];
    $complaint = $_POST['complaint'];
    $complaint_detail = $_POST['complaint-detail'];
  
  }

  //Retrieving appointments

  $query = "SELECT * FROM appointments INNER JOIN users WHERE users_uid = '$user_id' AND appointments.users_uid = users.users_id;";

  $my_list = $new_appointment->retrieveAppointments($query);

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student View </title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/student.css">

  </head>

  <body>

    <header>
      <!-- Heading -->
      <div class="heading">
        <img src="resources/img/must.png" alt="">
        <h3> COUNSELLOR APP </h3>
      </div>
      <!-- /Heading -->

      <!-- RIGHT SIDE NAVBAR -->
      <nav>
        <ul>
          <li class="nav-item">
            <i class="fas fa-layer-group"></i>
            <h3>Overview</h3>
          </li>
          <li class="nav-item">
            <i class="fas fa-calendar-check"></i>
            <h3>Appointments</h3>
          </li>
          <li class="nav-item">
            <i class="fas fa-user-md"></i>
            <h3> Counsellors </h3>
          </li>
          <li class="nav-item">
            <i class="fas fa-clipboard-list"></i>
            <h3>FAQs</h3>
          </li>
        </ul>
      </nav>

      <div class="logout">
        <i class="fas fa-sign-out-alt"></i>
        <h3> <a href="logout.php"> Logout </a> </h3>
      </div>
    </header>

    <main>
      <section class="main-navbar">
        <div class="chat-title">
          <div class="left">
            <img src="resources/img/must.png" alt="" srcset="">
            <div class="user-info">
              <span> Willkommen</span>
            </div>
          </div>

          <div class="right">
            <i class="fas fa-calendar" onclick="viewModal()"></i>
            <i class="fas fa-bell" onclick="viewModal()"></i>
          </div>
        </div>
      </section>

      <section class="appointments">

        <!-- wrapper -->
        <div class="wrapper">
          <div class="communications"> 
            <h2>
              Communications
            </h2>
            <div class="carousel"> 
              <i class="fas fa-chevron-left"></i>
              <p>
                Aliquid at deleniti iusto, <?php echo $user_id; ?>
              </p>
              <i class="fas fa-chevron-right"></i>
            </div>
          </div>

          <!-- Appointments list -->
          <div class="appointment-list">
            <!-- List heading -->
            <div class="list-header">
              <h2> Your  Appointments </h2>
              <ul>
                <li class="pending">
                  <h3> Scheduled </h3>
                </li>
                <li class="approved">
                  <h3> Upcoming </h3>
                </li>
                <li class="finished">
                  <h3> Completed </h3>
                </li>
              </ul>
            </div>

            <!-- Thee list -->
            <div class="thee-list">
              <ul>
              <!--  List for the appointments -->
                <?php
                    if ($my_list) {                 
                      foreach ($my_list as $ROW) {
                        include 'modules/appointment.php';
                      }
                    }
                  ?>
                <li>
                  <div class="time">
                    <span> 10:00 - 11:00 </span>
                  </div>
                  <div class="student">
                    <img src="resources/img/must.png" alt="avatar">
                    <h4> Lorem, ipsum. </h4>
                    <input type="text" class="complaint" id="complaint" value="Lorem ipsum dolor sit amet." > 
                  </div>
                  <div class="actions">
                    <i class="fas fa-check" id="approve-btn"> </i>
                    <i class="fas fa-trash"> </i>
                  </div>
                </li>
              </ul>
            </div>
          </div>

        </div>

        <!-- Student details -->
        <div class="student-info">
          <h2>
            Make a Reservation
          </h2>
          <form action="" method="post">
            <label for="date">Enter a suitable date </label>
            <input type="date" name="select-date" id="select-date">
            <label for="start-time"> Enter Start Time </label>
            <input type="time" name="start-time" id="start-time"> 
            <label for="end-time"> Enter End Time </label>
            <input type="time" name="end-time" id="end-time">
            <label for="complaint"> Enter your complaint </label>
            <input type="text" name="complaint" id="complaint">
            <label for="complaint"> Enter your complaint details </label>
            <textarea name="complaint-detail" id="complaint-detail" placeholder="Elaborate more on your complaint/issue ..... " cols="30" rows="6"></textarea>
            <div class="make-btn">
              <input type="submit" name="make-btn" id="make-btn" value="Make A Reservation">
            </div>
          </form>
        </div>

      </section>

    </main>

    <script src="js/events.js"></script>

  </body>

</html>