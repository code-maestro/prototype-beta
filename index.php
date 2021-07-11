<?php
  
  include_once 'header.php';
  include_once 'modules/user.php';

  $user = new User();
  $current_user = $user->getData($_SESSION['id']);

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
          <h2> Willkommen <?php echo $current_user['last_name']; ?> </h2>
          <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</span>
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
              <i class="fas fa-users"></i>
              <div class="total-numbers">
                <h2>234</h2>
                <span>Today's Appointments</span>
              </div>
            </div>
            <div class="approved">
              <i class="fas fa-user-check"></i>
              <div class="total-numbers">
                <h2>234</h2>
                <span>Today's Appointments</span>
              </div>
            </div>
            <div class="cancelled">
              <i class="fas fa-user-times"></i>
              <div class="total-numbers">
                <h2>234</h2>
                <span>Today's Appointments</span>
              </div>
            </div>
            <div class="total-patients">
              <i class="fas fa-hospital-user"></i>
              <!-- <i class="fas fa-comment-dots"></i> -->
              <div class="total-numbers">
                <h2>234</h2>
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
                <li>
                  <div class="time">
                    <span> 10:00 - 11:00 </span>
                  </div>
                  <div class="student">
                    <img src="resources/img/must.png" alt="avatar">
                    <h3>code-maestro</h3>
                  </div>
                  <div class="actions">
                    <i class="fas fa-check"> </i>
                    <i class="fas fa-trash"> </i>
                  </div>
                </li>
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
            <div class="actions">
              <i class="fas fa-history"> History </i>
              <i class="fas fa-comment-dots"> Live Chat </i>
            </div>
          </div>
          <div class="the-details">
            <h3> More Details </h3>
            <div class="more">
              <div class="labels">
                <span> Email : </span>
                <span> Phone : </span>
                <span> Reason : </span>
              </div>
              <div class="data">
                <p> 2021@must.ac.ug </p>
                <p> +254773209778 </p>
                <p> Lorem ipsum dolor sit. </p>
              </div>
            </div>
          </div>
        </div>

      </section>

    </main>

  </body>

</html>