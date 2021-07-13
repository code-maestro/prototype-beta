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
  $info = new Create();
  $list = $info->retrieveAppointments();

  //$names = $user_details['first_name'];
       
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MUST COUNSELLOR APP</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/main.css">

  </head>

  <body>

    <!-- HEADER -->
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
            <i class="fas fa-user-graduate"></i>
            <h3> Students </h3>
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

    <!-- MAIN -->
    <main>
      <!-- Header section for the main -->
      <section class="header">
        <!-- Welcome txt -->
        <div class="welcome-txt">
          <span> Welcome back </span>  
          <br>
          <h2> <?php echo $current_user['last_name'] . " " . $current_user['first_name'] ; ?> </h2>
        </div>
        <!-- Notification icon -->
        <div class="notification-area">
          <i class="fas fa-bell"></i>
        </div>
      </section>

      <!-- Appointments count -->
      <section class="appointments">

        <!-- wrapper -->
        <div class="wrapper">

          <!-- COUNT & LIST -->
          <div class="count">
            <!-- Total Appointments -->
            <div class="total">
              <i class="fas fa-hospital-user"></i>
              <div class="total-numbers">
                <h2> <?php echo $total_users; ?> </h2>
                <span>Today's Appointments</span>
              </div>
            </div>
            <div class="approved">
              <i class="fas fa-users"></i>
              <div class="total-numbers">
                <h2> <?php echo $total_appointments; ?> </h2>
                <span>Today's Appointments</span>
              </div>
            </div>
            <div class="cancelled">
              <i class="fas fa-user-check"></i>
              <div class="total-numbers">
              <h2> <?php echo $total_approved; ?> </h2>
                <span>Today's Appointments</span>
              </div>
            </div>
            <div class="total-patients">
              <i class="fas fa-user-times"></i>
              <div class="total-numbers">
              <h2> <?php echo $total_pending; ?> </h2>
                <span>Today's Appointments</span>
              </div>
            </div>
          </div>

          <!-- Appointments list -->
          <div class="appoitment-list">
            <!-- List heading -->
            <div class="list-header">
              <h2> Appointments </h2>
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
          <div class="student-profile">
            <img src="resources/img/must.png" alt="avatar">
            <h3>code-maestro</h3>
            <p> 2021/BAF/001 </p>
          </div>
          <div class="the-details">
            <table>
              <tr>
                <th> <h3> More Details </h3> </th>
              </tr>
              <tr>
                <td>January</td>
                <td>$100</td>
              </tr>
              <tr>
                <td>January</td>
                <td>$100</td>
              </tr>
              <tr>
                <td>January</td>
                <td>$100</td>
              </tr>
              <tr>
                <td>January</td>
                <td>$100</td>
              </tr>
              <tr>
                <td>January</td>
                <td>$100</td>
              </tr>
            </table>

            <div class="actions">
              <i class="fas fa-comment-dots"> Live Chat </i>
            </div>
            
          </div>
        </div>

      </section>

    </main>

  </body>

</html>