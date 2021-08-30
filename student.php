<?php

  include_once 'modules/std_header.php';
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
    <link rel="stylesheet" href="css/calendar.min.css">
    <link rel="stylesheet" href="css/student.css">
    <link rel="stylesheet" href="css/global.css">

    <!-- JS  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <h3>Counsellors </h3>
          </li>
          <li class="nav-item" id="update-btn">
            <i class="fas fa-user-edit"></i>
            <h3>Update your data</h3>
          </li>
          <li class="nav-item" id="faqs-btn">
            <i class="fas fa-clipboard-list"></i>
            <h3>FAQs</h3>
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
            <input type="date" name="select-date" id="select-date" required>
            <label for="start-time"> Enter Start Time </label>
            <input type="time" name="start-time" id="start-time" required> 
            <label for="end-time"> Enter End Time </label>
            <input type="time" name="end-time" id="end-time" required>
            <label for="complaint"> Enter your complaint </label>
            <input type="text" name="complaint" id="complaint" required>
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
                  <h4> Upcoming Zooom Meeting  </h4>
                </div>
                
                <div class="email" id="sendEmail" href="mailto:<?php echo $email; ?>">
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
                      <p>Choose a counselor to send an Email to </p>  
                      <div class="choose">
                        <details>
                          <summary class="male" > Male </summary>
                          <ul class="male-listed">
                            <!-- PHP code  -->
                          </ul>
                        </details>

                        <details>
                          <summary class="female"> Female </summary>
                          <ul class="female-listed">
                            <!-- PHP code  -->
                          </ul>
                        </details>
                      </div>
                      <form action="#" method="post">
                        <p class="names">You are about to send an email to :</p>
                        <p id="selo"> </p>
                        <p id="selomail"> </p>
                        <button id="send-mail" name="send-mail"> SEND EMAIL </button> 
                      </form>
                    </div>

                    <form action="#" method="POST" id="typing-area" class="typing-area">
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

    <?php

        foreach ($my_list as $value) {
          
          $titles_array = $value['complaint'];
      
          $dates = $value['appointment_date'];
      
          print_r($dates);
      
          $formatted_date = DateTime::createFromFormat('Y-m-d', 
        
          $value['appointment_date']);
        
            if ($formatted_date === false) {
            
              echo "Incorrect date string";
            
            } else {
            
              $new_date = $formatted_date->getTimestamp();
              
              echo $new_date;
            
            }
          
            echo "
              
              <script>
          
                var heavy_fruits = [];
                
                myfruit = {};
                
                myfruit ['title'] = '$titles_array';
                myfruit ['date'] = '$new_date'*1000;
          
                heavy_fruits.push(myfruit);
          
                heavy_fruits.forEach((entry) => {
                  
                  console.log(entry);
                
                });
              
                $('#calendar').MEC({
                  events: heavy_fruits,
                  from_monday:true
                });
              
              </script>
            ";
              
          }

      ?>

    <script src="js/studentEvents.js"></script>

  </body>

</html>