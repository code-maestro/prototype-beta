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
  
  $sql = "SELECT complaint, date, start_time, end_time, users_id, first_name, last_name, reg_no, email 
          FROM appointments INNER JOIN users INNER JOIN login 
          WHERE users.users_id = appointments.users_uid 
          AND appointments.users_uid = login.users_uid;";

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

  if (isset($_POST['approve'])) {
    echo '<script> alert("Fvck off") </script>';
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
              <h2> Your Appointments </h2>
              <ul>
                <li class="pending">
                  <h3> Pending </h3>
                </li>
                <li class="approved">
                  <h3> Approved </h3>
                </li>
                <li class="finished">
                  <h3> Completed </h3>
                </li>
                <li class="deleted">
                  <h3> Deleted </h3>
                </li>
              </ul>
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
            
        </div>

      </section>

    </main>

    <script src="js/events.js"></script>

  </body>

</html>