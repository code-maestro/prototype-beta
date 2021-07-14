<?php

  include_once 'std_header.php';
  include_once 'modules/user.php';
  include_once 'modules/create.php';

  $user = new User();
  $current_user = $user->getData($_SESSION['std_id']);

  $date = "";
  $start_time = "";
  $end_time = "";
  $complaint = "";
  $complaint_detail = "";

  //  Student signup
  if (isset($_POST['make-btn'])) {

    $new_appointment = new Create();
    $new_appointment->createAppointment($current_user['users_id'], $_POST);

    $date = $_POST['select-date'];
    $start_time = $_POST['start-time'];
    $end_time = $_POST['end-time'];
    $complaint = $_POST['complaint'];
    $complaint_detail = $_POST['complaint-detail'];
  
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
              <span> Willkommen <?php echo $current_user['last_name']; ?> </span>
            </div>
          </div>

          <div class="right">
            <i class="fas fa-calendar" onclick="viewModal()"></i>
            <i class="fas fa-bell" onclick="viewModal()"></i>
          </div>
        </div>
      </section>

      <section class="student-main">

        <div class="book-appointment">
          <div class="booked">
            <h3>
              Booked Appointments
            </h3>
            <div class="container">
              <ul>
                <li>
                  <img src="resources/img/must.png" alt="Counsellor's Avatar" srcset="">
                  <p>Lorem ipsum lorem ipsum </p>
                  <span> 10:30 </span>
                  <i class="fas fa-times"></i>
                </li>
                <li>
                  <img src="resources/img/must.png" alt="Counsellor's Avatar" srcset="">
                  <p>Lorem ipsum lorem ipsum </p>
                  <span> 10:30 </span>
                  <i class="fas fa-times"></i>
                </li>
                <li>
                  <img src="resources/img/must.png" alt="Counsellor's Avatar" srcset="">
                  <p>Lorem ipsum lorem ipsum </p>
                  <span> 10:30 </span>
                  <i class="fas fa-times"></i>
                </li>
                <li>
                  <img src="resources/img/must.png" alt="Counsellor's Avatar" srcset="">
                  <p>Lorem ipsum lorem ipsum </p>
                  <span> 10:30 </span>
                  <i class="fas fa-times"></i>
                </li>
                <li>
                  <img src="resources/img/must.png" alt="Counsellor's Avatar" srcset="">
                  <p>Lorem ipsum lorem ipsum </p>
                  <span> 10:30 </span>
                  <i class="fas fa-times"></i>
                </li>
              </ul>
            </div>
          </div>

          <div class="completed">
            <h3>Completed</h3>
            <ul>
              <li>
                <img src="resources/img/must.png" alt="Counsellor's Avatar" srcset="">
                <p>Lorem ipsum lorem ipsum </p>
                <span> 10:30 </span>
                <i class="fas fa-times"></i>
              </li>
              <li>
                <img src="resources/img/must.png" alt="Counsellor's Avatar" srcset="">
                <p>Lorem ipsum lorem ipsum </p>
                <span> 10:30 </span>
                <i class="fas fa-times"></i>
              </li>
              <li>
                <img src="resources/img/must.png" alt="Counsellor's Avatar" srcset="">
                <p>Lorem ipsum lorem ipsum </p>
                <span> 10:30 </span>
                <i class="fas fa-times"></i>
              </li>
              <li>
                <img src="resources/img/must.png" alt="Counsellor's Avatar" srcset="">
                <p>Lorem ipsum lorem ipsum </p>
                <span> 10:30 </span>
                <i class="fas fa-times"></i>
              </li>
              <li>
                <img src="resources/img/must.png" alt="Counsellor's Avatar" srcset="">
                <p>Lorem ipsum lorem ipsum </p>
                <span> 10:30 </span>
                <i class="fas fa-times"></i>
              </li>
              <li>
                <img src="resources/img/must.png" alt="Counsellor's Avatar" srcset="">
                <p>Lorem ipsum lorem ipsum </p>
                <span> 10:30 </span>
                <i class="fas fa-times"></i>
              </li>
            </ul>
          </div>
        </div>

        <div class="chatting">
          <h3>
            Live chat Messaging
          </h3>
          <div class="chat-area">
            <div class="admin-msg">
              <p>
                Lorem ipsum dolor sit amet consectetur
              </p>
            </div>
            <div class="student-msg">
              <p>
                Lorem ipsum dolor sit amet, consectetur 
              </p>
            </div>
            <div class="admin-msg">
              <p>
                Lorem ipsum dolor sit amet consectetur 
              </p>
            </div>
            <div class="student-msg">
              <p>
                Lorem ipsum dolor sit amet, consectetur 
              </p>
            </div>
            <div class="admin-msg">
              <p>
                Lorem ipsum dolor sit amet consectetur 
              </p>
            </div>
            <div class="student-msg">
              <p>
                Lorem ipsum dolor sit amet, consectetur 
              </p>
            </div>
            <div class="admin-msg">
              <p>
                Lorem ipsum dolor sit amet consectetur 
              </p>
            </div>
            <div class="student-msg">
              <p>
                Lorem ipsum dolor sit amet, 
              </p>
            </div>
            <div class="admin-msg">
              <p>
                Lorem ipsum dolor sit amet consectetur 
              </p>
            </div>
            <div class="student-msg">
              <p>
                Lorem ipsum dolor sit amet, 
              </p>
            </div>
            <div class="admin-msg">
              <p>
                Lorem ipsum dolor sit amet consectetur 
              </p>
            </div>
            <div class="student-msg">
              <p>
                Lorem ipsum dolor sit amet, 
              </p>
            </div>
            <div class="admin-msg">
              <p>
                Lorem ipsum dolor sit amet consectetur 
              </p>
            </div>
            <div class="student-msg">
              <p>
                Lorem ipsum dolor sit amet, 
              </p>
            </div>
            <div class="admin-msg">
              <p>
                Lorem ipsum dolor sit amet consectetur 
              </p>
            </div>
          </div>
          <div class="chat-form">
            <form action="#" method="post">
              <input type="number" name="out-msg-id" id="out-msg-id" hidden>
              <input type="text" name="out-msg" id="out-msg" placeholder="Enter Message .... ">
              <input type="submit" value="SEND" name="send-btn">
            </form>
          </div>
        </div>

        <!-- Section with class book-appointment  -->
        <div class="appointments">
          <div class="container">
            <div class="row">
              <h3> Make An Appointment </h3>
            </div>
            <div class="reservation-form">
              <form action="" method="post">
                <input type="date" name="select-date" id="select-date" placeholder="Enter suitable date">
                <input type="time" name="start-time" id="start-time" placeholder="Enter Start Time "> 
                <input type="time" name="end-time" id="end-time" placeholder="Enter End TIme">
                <input type="text" name="complaint" id="complaint" placeholder="Enter your reason ">
                <textarea name="complaint-detail" id="complaint-detail" placeholder="Elaborate more on your complaint/issue ..... " cols="30" rows="10"></textarea>
                <input type="submit" name="make-btn" value="MAKE A RESERVATION">
              </form>
            </div>
          </div>
        </div>
      </section>

    </main>

    <script src="js/events.js"></script>

  </body>

</html>