<?php
  
  include_once 'staff_header.php';
  include_once 'modules/create.php';

  $user = new User();
  $current_user = $user->getData($_SESSION['staff_id']);

  //Qeuries
  $query = "SELECT COUNT(id) FROM roles WHERE role_id = '1'; ";
  $query2 = "SELECT COUNT(id) FROM appointments; ";
  $query3 = "SELECT COUNT(id) FROM approved_appointment; ";
  $query4 = "SELECT COUNT(id) FROM pending_appointment; ";

  $total_users = $user->getTotalUsers($query);
  $total_appointments = $user->getTotalUsers($query2);
  $total_approved = $user->getTotalUsers($query3);
  $total_pending = $user->getTotalUsers($query4);

  //Retrieving appointments
  
  $sql = "SELECT appointment_id, complaint, date, start_time, end_time, users_id, first_name, last_name, reg_no, email 
          FROM appointments INNER JOIN users INNER JOIN login 
          WHERE users.users_id = appointments.users_uid 
          AND appointments.users_uid = login.users_uid;";

  $sql_pending = "SELECT appointment_id, complaint, date, start_time, end_time, users_id, first_name, last_name, reg_no, email 
                  FROM appointments INNER JOIN users INNER JOIN login
                  WHERE users.users_id = appointments.users_uid 
                  AND appointments.users_uid = login.users_uid
                  AND appointments.status = 1";

  $info = new Create();
  $list = $info->retrieveAppointments($sql);

  $uid = "";
  $complaint ="";
  $date ="";
  $time ="";
  $stdname ="";
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
    $list = $info->retrieveAppointments($sql_pending);
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
    <link rel="stylesheet" href="css/admin.css">

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
              <td id="details-regno"> <?php echo $reg_no; ?></td>
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
              <td>Prevoius Issue</td>
              <td id="details-complaint"> <?php echo $complaint; ?></td>
            </tr>
            <tr>
              <td>Total Appointments</td>
              <td id="details-totals"> <?php echo $total; ?> </td>
            </tr>
          </table>

          <!-- RESPOND BUTTON -->
          <button class="respond-btn" id="respond-btn" onclick="test()" type="submit"> RESPOND </button>
            
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
                  <h4> START A LIVE CHAT </h4>
                </div>
                <div class="tollfree" id="tollfree">
                  <i class="fas fa-phone"></i>
                  <h4> PROVIDE A TOLL FREE NUMBER </h4>
                </div>
                <div class="zoom" id="zoomlink">
                  <i class="fas fa-comment"></i>
                  <h4> SCHEDULE A ZOOM MEETING  </h4>
                </div>
                <div class="email" id="sendEmail">
                  <i class="fas fa-comment"></i>
                  <h4> SEND AN EMAIL </h4>
                </div>
              </div>  

              <div class="chat-wrap">
                <section class="chat-area">
                  <div class="chat-box">
                    <div class="chat" id="chat">
                      <div class="incoming">
                        <div class="details">
                          <p>Lorem ipsum dolor sit. Lorem ipsum dolor sit amet.</p>
                        </div>
                      </div>
                      <div class="outgoing">
                        <div class="details">
                          <p>Lorem ipsum dolor sit. Lorem ipsum dolor sit.</p>
                        </div>
                      </div>
                      <div class="incoming">
                        <div class="details">
                          <p>Lorem ipsum dolor sit. Lorem ipsum dolor sit amet.</p>
                        </div>
                      </div>
                      <div class="outgoing">
                        <div class="details">
                          <p>Lorem ipsum dolor sit Lorem ipsum dolor sit..</p>
                        </div>
                      </div>
                      <div class="incoming">
                        <div class="details">
                          <p>Lorem ipsum dolor sit. Lorem ipsum dolor sit amet.</p>
                        </div>
                      </div>
                      <div class="outgoing">
                        <div class="details">
                          <p>Lorem ipsum dolor sit. Lorem ipsum dolor sit.</p>
                        </div>
                      </div>
                      <div class="incoming">
                        <div class="details">
                          <p>Lorem ipsum dolor sit. Lorem ipsum dolor sit amet.</p>
                        </div>
                      </div>
                      <div class="outgoing">
                        <div class="details">
                          <p>Lorem ipsum dolor sit. Lorem ipsum dolor sit.</p>
                        </div>
                      </div>
                      <div class="incoming">
                        <div class="details">
                          <p>Lorem ipsum dolor sit. Lorem ipsum dolor sit amet.</p>
                        </div>
                      </div>
                      <div class="outgoing">
                        <div class="details">
                          <p>Lorem ipsum dolor sit. Lorem ipsum dolor sit.</p>
                        </div>
                      </div>
                      <div class="incoming">
                        <div class="details">
                          <p>Lorem ipsum dolor sit. Lorem ipsum dolor sit amet.</p>
                        </div>
                      </div>
                      <div class="outgoing">
                        <div class="details">
                          <p>Lorem ipsum dolor sit.</p>
                        </div>
                      </div>
                      <div class="incoming">
                        <div class="details">
                          <p>Lorem ipsum dolor sit. Lorem ipsum dolor sit amet.</p>
                        </div>
                      </div>
                      <div class="outgoing">
                        <div class="details">
                          <p>Lorem ipsum dolor sit.</p>
                        </div>
                      </div>
                      
                    </div>

                    <div class="tollfree" id="toll">
                      <p>Lorem ipsum, dolor sit amet consectetur </p>
                      <p>Lorem ipsum, dolor sit amet consectetur </p>
                      <p>Lorem ipsum, dolor sit amet consectetur </p>
                    </div>
                    <div class="zoomlink" id="zoom">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, non!</p>
                      <p>Lorem ipsum, dolor sit amet consectetur </p>
                      <p>Lorem ipsum, dolor sit amet consectetur </p>
                      <p>Lorem ipsum, dolor sit amet consectetur </p>
                      <p>Lorem ipsum, dolor sit amet consectetur </p>
                    </div>
                    <div class="mail" id="mail">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsam!</p>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsam!</p>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsam!</p>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsam!</p>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsam!</p>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsam!</p>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsam!</p>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsam!</p>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsam!</p>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsam!</p>
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam, non! Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, ipsam!</p>
                    </div>

                    <form action="#" class="typing-area">
                      <input type="text" class="incoming_id" name="incoming_id" hidden>
                      <input type="text" name="message" id="message" class="input-field" placeholder="Send a message to the student..." autocomplete="off">
                      <button><i class="fab fa-telegram-plane"></i></button>
                    </form>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>

    <script src="js/events.js"></script>

  </body>

</html>