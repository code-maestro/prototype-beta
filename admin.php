<?php
  
  include_once 'modules/staff_header.php';
  include_once 'modules/create.php';

  $user = new User();
  $current_user = $user->getData($_SESSION['staff_id']);

  //Qeuries
  $query = "SELECT COUNT(id) FROM roles WHERE role_id = '1'; ";
  $query2 = "SELECT COUNT(id) FROM appointments; ";
  $query3 = "SELECT COUNT(id) FROM appointments WHERE status = '1'; ";
  $query4 = "SELECT COUNT(id) FROM pending_appointment; ";

  $total_users = $user->getTotalUsers($query);
  $total_appointments = $user->getTotalUsers($query2);
  $total_approved = $user->getTotalUsers($query3);
  $total_pending = $user->getTotalUsers($query4);

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

  $sql_approved = "SELECT appointment_id, complaint, appointment_date, start_time, end_time, users_id, first_name, last_name, reg_no, email 
                   FROM appointments INNER JOIN users INNER JOIN login
                   WHERE users.users_id = appointments.users_uid 
                   AND appointments.users_uid = login.users_uid
                   AND appointments.status = 1";


  $sqll = "SELECT * FROM appointments";

  $info = new Create();
  $list = $info->retrieveAppointments($sql);
  $t = $info->retrieveAppointments($sqll);

  $uid = "";
  $complaint ="";
  $date = "";
  $time = "";
  $stdname = "";
  $reg_no = ""; 
  $email = "";
  $total = "";

  if (isset($_POST['viewDetails'])) {

    // print_r($_POST);
    $uid = $_POST['uid'];
    $complaint = $_POST['complaint'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $stdname = $_POST['stdname'];
    $reg_no =  $_POST['regno']; 
    $email =  $_POST['email'];

    $sql_count = "SELECT COUNT(id) FROM appointments WHERE users_uid ='$uid';";
    $total = $user->getTotalUsers($sql_count);

  }

  if (isset($_POST['approved'])) {
    $list="";
    $list = $info->retrieveAppointments($sql_approved);
  }

  // Condition to approve appointments 
  if (isset($_POST['approve-btn'])) {

    $id = $_POST['id'];

    $sqlstatus = "UPDATE appointments SET status = 1 WHERE appointments.appointment_id = '$id';";

    $DB = new DatabaseModule();
    $DB->saveData($sqlstatus);

  }

  // Condition to delete appointments 
  if (isset($_POST['delete-btn'])) {

    $id = $_POST['id'];

    $sql_delete = "DELETE FROM appointments WHERE appointments.appointment_id = '$id';";

    $DB = new DatabaseModule();
    $DB->saveData($sql_delete);

  }

  // $url = "https://zoom.us/oauth/authorize?response_type=code&client_id=".CLIENT_ID."&redirect_uri=".REDIRECT_URI;

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
    <link rel="stylesheet" href="css/calendar.min.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/admin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/calendar.min.js"></script>

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
          <li class="nav-item" id="overview" >
            <i class="fas fa-layer-group"></i>
            <h3>Overview</h3>
          </li>
          <li class="nav-item" id="appointments" >
            <i class="fas fa-calendar-check"></i>
            <h3>Appointments</h3>
          </li>
          <li class="nav-item" id="counsellors" >
            <i class="fas fa-user-md"></i>
            <h3> Counsellors </h3>
          </li>
          <li class="nav-item" id="update-btn">
            <i class="fas fa-user-edit"></i>
            <h3>Update your data</h3>
          </li>
          <li class="nav-item">
            <i class="fas fa-clipboard-list"></i>
            <h3>FAQs <?php echo $current_user['users_id']; ?> </h3>
          </li>
        </ul>
      </nav>

      <div class="logout">
        <i class="fas fa-sign-out-alt"></i>
        <h3> <a href="modules/logout.php"> Logout </a> </h3>
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
              <div class="cale" id="calendar"></div>
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
            <!-- Total Appointments -->
            <div class="total">
              <i class="fas fa-users"></i>
              <div class="total-numbers">
                <h2> <?php echo $total_users; ?> </h2>
                <span> Total Students </span>
              </div>
            </div>
            <div class="approved" onclick="viewDara()" >
              <i class="fas fa-hospital-user"></i>
              <div class="total-numbers">
                <h2> <?php echo $total_appointments; ?> </h2>
                <span> Total Appointments </span>
              </div>
            </div>
            <div class="cancelled">
              <i class="fas fa-user-check"></i>
              <div class="total-numbers">
                <h2> <?php echo $total_approved; ?> </h2>
                <span> Approved Appointments</span>
              </div>
            </div>
            <div class="total-patients">
              <i class="fas fa-user-times"></i>
              <div class="total-numbers">
                <h2> <?php echo $total_pending; ?> </h2>
                <span> Cancelled Appointments</span>
              </div>
            </div>
          </div>

          <!-- Appointments list -->
          <div class="appointment-list">
            <!-- List heading -->
            <div class="list-header">
              <h2> Appointments </h2>
              <form method="post">
                <input type="submit" name="pending" value="Pending" class="pending">
                <input type="submit" name="approved" value="Approved" class="approved">
                <input type="submit" name="completed" value="Completed" class="finished">
              </form>
            </div>

            <!-- Thee list -->
            <div class="thee-list">
              <ul>
                <!--  List for the appointments -->
                <?php
                  if ($list) {                 
                    foreach ($list as $ROW) {
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
            Student Detialed Information
          </h2>
          <img src="resources/img/must.png" alt="avatar">
          <table>
            <tr>
              <td>Registration Number</td>
              <td id="details-regno">
                <?php echo $reg_no; ?>
              </td>
            </tr>
            <tr>
              <td>Name</td>
              <td id="details-name"><?php echo $stdname; ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td id="details-email" > <?php echo $email; ?></td>
            </tr>
            <tr>
              <td>Appointment Date</td>
              <td id="details-date" > <?php echo $date; ?></td>
            </tr>
            <tr>
              <td>Appointment Time </td>
              <td id="details-time"> <?php echo $time; ?></td>
            </tr>
            <tr>
              <td>Mental Issue</td>
              <td id="details-complaint"> <?php echo $complaint; ?></td>
            </tr>
            <tr>
              <td>Total Appointments</td>
              <td id="details-totals"> <?php echo $total; ?> </td>
            </tr>
          </table>

          <!-- RESPOND BUTTON -->
          <button class="respond-btn" id="respond-btn" type="submit"> RESPOND </button>
            
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
                  <h4> Create a Zooom Meeting </h4>
                </div>
                
                <a class="email" id="sendEmail" href="mailto:<?php echo $email; ?>">
                  <i class="fas fa-comment"></i>
                  <h4> Send Email </h4>
                </a>  
                
              </div>

              <div class="chat-wrap">
                <section class="chat-area">
                  <div class="chat-box">
                    <div class="chat" id="chat">

                    </div>

                    <div class="zoomlink" id="zoom">
                      <!-- Div from the zoom file -->
                      <div id="zoom-form">
                        <!-- <button class="get-meeting">Get Meeting Details</button> -->
                        <div class="ssd"></div>
                        <span> Send to student via </span>
                        <div class="send-options">
                          <button type="submit"> SMS </button>
                          <button type="submit"> EMAIL </button>
                          <button> CHAT </button>
                        </div>
                      </div>
                    </div>

                    <div class="mail" id="mail">
                      <form action="" method="post">
                        <textarea name="mail-detail" id="mail-detail" placeholder="Compose your Email here ..... " cols="40" rows="6"></textarea>
                        <button id="send-mail" type="submit"> SEND EMAIL </button>
                      </form>
                    </div>

                    <form action="#" method="POST" id="typing-area" class="typing-area">
                      <input type="text" class="std_id" name="std_id" id="std_id" value="<?php echo $uid ?>" hidden>
                      <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $current_user['users_id']; ?>" hidden>
                      <input type="text" name="message" id="message" class="input-field" placeholder="Send a message to the student..." autocomplete="off">
                      <button id="sendMe" class="sendMe" name="sendMe" type="submit"> SEND </button>
                    </form>

                  </div>
                </section>
              </div>
            </div>
          </div>
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

      <section class="update-form">
        <h2>
          UPDATE YOUR INFORMATION
        </h2>

        <form action="">

          <div class="row">
            <div class="profile-pic">
              <img src="resources/img/must.png" alt="" srcset="">
            </div>
          </div>

          <div class="from_db">

          </div>

          <div class="row">
            <button type="submit" id="update-data"> UPDATE </button>
          </div>

        </form>

      </section>

    </main>

    <!-- Function to loop throught the events and dates and populate and convert them to a list -->
      <?php

        foreach ($t as $value) {
          
          $titles_array = $value['complaint'];

          $formatted_date = DateTime::createFromFormat('Y-m-d', $value['appointment_date']);

          if ($formatted_date === false) {
            echo "Incorrect date string";
          } else {
            $new_date = $formatted_date->getTimestamp();            
          }

          echo "
          
            <p id='df'> $titles_array </p>
            <p id='dfd'> $new_date </p>

          ";
        }
      ?>

    <script src="js/chat.js"></script>
    <script src="js/events.js"></script>
    <script>

      var titles = document.querySelectorAll("[id='df']");
      var timestamps = document.querySelectorAll("[id='dfd']");

      // POPULATING THE OBJECT FOR THE CALENDER
      // Took me 2 fvcking weeks to get this hack working
      var objects = [];
      
      for(var i = 0; i < titles.length; i++){
        objects[i] = {
          title: titles[i].innerHTML,
          date: parseInt(timestamps[i].innerHTML)*1000
        };
      }

      $('#calendar').MEC({
        events: objects,
        from_monday:true
      });
      console.log(objects);

    </script>

  </body>

</html>