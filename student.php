<?php

  include_once 'std_header.php';
  include_once 'modules/create.php';

  $date = "";
  $start_time = "";
  $end_time = "";
  $complaint = "";
  $complaint_detail = "";

  $var = "";

  $staff_id = new User();
  $current_staff =$staff_id->getChatID($_SESSION['std_id']);

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
  $query = "SELECT * FROM appointments INNER JOIN users INNER JOIN login 
            WHERE appointments.users_uid = '$user_id' 
            AND appointments.users_uid = users.users_id 
            AND appointmentS.users_uid = login.users_uid;";

  $query_approved = "SELECT * FROM approved_appointment INNER JOIN users INNER JOIN login 
                     WHERE approved_appointment.users_uid = '$user_id' 
                     AND appointments.users_uid = users.users_id 
                     AND appointmentS.users_uid = login.users_uid;";

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
    <link rel="stylesheet" href="css/global.css">

    <!-- JS  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/jquery.min.js"></script>

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
          <li class="nav-item" id="overview">
            <i class="fas fa-layer-group"></i>
            <h3>Overview</h3>
          </li>
          <li class="nav-item" id="appointments">
            <i class="fas fa-calendar-check"></i>
            <h3>Appointments</h3>
          </li>
          <li class="nav-item" id="counselors">
            <i class="fas fa-user-md"></i>
            <h3> Counsellors </h3>
          </li>
          <li class="nav-item" id="faqs-btn">
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
            <div class="schedules">
              <i class="far fa-calendar"></i>
              <span class="badge"> 4 </span>
            </div>

            <div class="notifications-list">
              <i class="far fa-bell" id="notification-btn" ></i>
              <span class="badge"> 4 </span>
              <ul class="theList">
                <li id="theenotification"> 
                  <span class="notification-title"> '. $ROW['text_msg'] .' </span>
                </li>
              </ul>
            </div>

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
              <div class="carousel-item">
                <i class="fas fa-chevron-left"></i>
              </div>
              <div class="carousel-item">
                <p>
                  Aliquid at deleniti iusto, <?php echo $user_id; ?>
                </p>
              </div>
              <div class="carousel-item">
                <i class="fas fa-chevron-right"></i>
              </div>
            </div>
          </div>

          <!-- Appointments list -->
          <div class="appointment-list">
            <!-- List heading -->
            <div class="list-header">
              <h2> Your  Appointments </h2>
              <form>
                <input name="scheduled" value="Scheduled" class="pending">
                <input name="upcoming" value="Upcoming" class="approved">
                <input name="completed" value="Completed" class="finished">
              </form>
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

      <section class="faqs">
        <h2>
          FAQs
        </h2>

        <div class="faqs-list">
          <ul>
            <li>
              <h3> How do I book an appointment? </h3>
              <p>
                You can book an appointment by going to the <a href="appointments.php">Appointments</a> page.
              </p>
            </li>
            <li>
              <h3> How do I cancel an appointment? </h3>
              <p>
                You can cancel an appointment by going to the <a href="appointments.php">Appointments</a> page.
              </p>
            </li>
            <li>
              <h3> How do I cancel a session? </h3>
              <p>
                You can cancel a session by going to the <a href="appointments.php">Appointments</a> page.
              </p>
            </li>
            <li>
              <h3> How do I cancel a session? </h3>
              <p>
                You can cancel a session by going to the <a href="appointments.php">Appointments</a> page.
              </p>
            </li>
          </ul>
        </div>
      </section>

      <section class="counselors">
        <h2>
          FAQs
        </h2>

        <div class="container-list">
          <div>Lorem ipsum dolor sit amet.</div>
          <div>Lorem ipsum dolor sit amet.</div>
          <div>Lorem ipsum dolor sit amet.</div>
          <div>Lorem ipsum dolor sit amet.</div>
          <div>Lorem ipsum dolor sit amet.</div>
          <div>Lorem ipsum dolor sit amet.</div>
          <div>Lorem ipsum dolor sit amet.</div>
          <div>Lorem ipsum dolor sit amet.</div>
        </div>
      </section>

      <section>
        <!-- The Modal -->
        <div id="myModal" class="modal">
          <!-- Modal content -->
          <div class="modal-content">
            
            <div class="modal-header">
              <span class="close">&times;</span>
              <h2> Reach out </h2>
            </div>

            <div class="modal-body">

              <div class="options">
                <div class="livechat" id="livechat">
                  <i class="fas fa-comment"></i>
                  <h4> Start A Realtime Chat </h4>
                </div>

                <div class="zoom" id="zoomlink">
                  <i class="fas fa-video"></i>
                  <h4> Create a Zooom Meeting  </h4>
                </div>
                
                <div class="email" id="sendEmail">
                  <i class="fas fa-comment"></i>
                  <h4> Send Email </h4>
                </div>
              </div>  

              <div class="chat-wrap">
                <section class="chat-area">
                  <div class="chat-box">
                    <p>Choose a counselor </p>  
                    <div class="choose">
                      <details>
                      	<summary class="males" > Male </summary>
                      	<ul class="listed">
                          <!-- PHP code  -->
                      	</ul>
                      </details>

                      <details>
                      	<summary class="females"> Female </summary>
                      	<ul class="females-listed">
                          <!-- PHP code  -->
                      	</ul>
                      </details>
                    </div>

                    <div class="chat" id="chat">

                    </div>
                    
                    <div class="zoomlink" id="zoom">
                      <form action="" method="post">
                        <p>Meeting Details </p>
                        <input name="meeting-title" value="" placeholder="Meeting Title ">
                        <input name="meeting-id" value="" placeholder="Meeting ID ">
                        <input name="meeting-password" value="" placeholder="Meeting Password ">
                        <p> Send to student via </p>
                        <div class="send-options">
                          <button type="submit"> SMS </button>
                          <button type="submit"> EMAIL </button>
                          <button> CHAT </button>
                        </div>
                      </form>
                    </div>

                    <div class="mail" id="mail">
                      <form action="#" method="post">
                        <input type="text" class="counsellor_mail" name="counsellor-mail">
                        <textarea name="mail-detail" id="mail-detail" placeholder="Compose your Email here ..... " cols="40" rows="6"></textarea> 
                        <button id="send-mail" name="send-mail" type="submit"> SEND EMAIL </button>
                      </form>
                    </div>

                    <form action="#" method="POST" id="typing-area" class="typing-area">
                      <?php

                        // if (isset($_SESSION['counsellor_id'])) {
                        //   echo '<input type="text" class="counsellor_id" name="counsellor_id" value=' . $_SESSION['counsellor_id'] . ' hidden>';                          
                          
                        // } else {
                        //   echo '<input type="text" class="counsellor_id" name="counsellor_id" value="" hidden>';
                        // }

                      ?>

                      <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $_SESSION['std_id']; ?>" hidden>
                      <input type="text" name="message" id="message" class="input-field" placeholder="Send a message to the student.." autocomplete="off">
                      <button id="sending" class="sending" name="sending" type="submit">SEND</button>
                    </form>

                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>

    <script src="js/studentEvents.js"></script>

  </body>

</html>