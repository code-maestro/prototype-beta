<?php

  include_once 'modules/std_header.php';
  include_once 'modules/create.php';

  $date = "";
  $start_time = "";
  $end_time = "";
  $complaint = "";
  $complaint_detail = "";

  $var = "";

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Student's View </title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/static/all.min.css">
    <link rel="stylesheet" href="css/static/fontawesome.min.css">
    <link rel="stylesheet" href="css/static/calendar.min.css">
    <link rel="stylesheet" href="css/student.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/lala.css">

    <!-- JS  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/static/jquery.min.js"></script>
    <script src="js/static/calendar.min.js"></script>

  </head>

  <body>

    <header>
      <!-- Heading -->
      <div class="heading">
        <img src="resources/img/psycho.png" alt="">
        <h3> REMOTE STUDENT-COUNSELLOR APP </h3>
      </div>
      <!-- /Heading -->

      <!-- RIGHT SIDE NAVBAR -->
      <nav>
        <ul>
          <li class="nav-item" id="overview">
            <i class="fas fa-layer-group"></i>
            <h3>Overview</h3>
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
            <img src="<?php echo "./resources/".$_SESSION['profile']; ?>" alt=" UPLOAD IMAGE ">
            <div class="user-info">
              <span> Welcome <?php echo $_SESSION['student_names']; ?> </span>
            </div>
          </div>

          <div class="right">
            <div class="schedules">
              <i class="far fa-calendar"></i>
              <!-- <span class="badge"> 4 </span> -->
              <div class="cale" id="calendar"></div>
            </div>

            <div class="notifications-list">
              <i class="far fa-bell" id="notification-btn" ></i>
              <span class="badge"> </span>
              <ul class="theList">
                <li id="theenotification"> 
                  <span class="notification-title">  </span>
                </li>
              </ul>
            </div>

          </div>

        </div>
      </section>

      <section class="appointments">
        <!-- wrapper -->
        <div class="wrapper">

          <div class="get-help-container">
            <h2>
              GET HELP THROUGH
            </h2>

            <div class="get-help">
              
              <div class="reachout-mail">
                <i class="fas fa-comments"></i>
                <h3> LIVE CHAT </h3>
              </div>

              <div class="call">
                <i class="fas fa-phone-alt"></i>
                <a href="tel:+256780730001"><h3> CALL </h3></a>
              </div>

              <div class="sms">
                <i class="fas fa-sms"></i>
                <a href="sms:+256780730001"><h3> SMS </h3></a>
              </div>

              <div class="whatsapp" id="theFaqs">
                <i class="fas fa-question-circle"></i>
                <h3> FAQs </h3>
              </div>

            </div>

          </div>

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
                  Aliquid at deleniti iusto, Lorem ipsum dolor,</br>
                  sit amet consectetur adipisicing elit.</br>
                  Corporis voluptates natus sint dolor ipsum, </br>
                  nobis odit ullam veritatis aliquid excepturi eveniet id similique.
                  
                  <?php echo $user_id; ?>

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
              <h2> Appointments </h2>
              <form method="post" id="catergory-btns">
                <input type="submit" name="pending" value="Pending" class="pending">
                <input type="submit" name="approved" value="Approved" class="checked">
                <input type="submit" name="completed" value="Completed" class="finished">
              </form>
            </div>


            <!-- Thee list -->
            <div class="thee-list">
              <ul class="new-list">

                <!--  List for the appointments -->

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
              <h3> What is mental health? </h3>
              <p>
                Mental health refers to your emotional and psychological well-being.</br>
                Having good mental health helps you lead a relatively happy and healthy life. </br>
                It helps you demonstrate resilience and the ability to cope in the face of life’s adversities.</br>
                Your mental health can be influenced by a variety of factors, including life events or even your genetics.
              </p>
            </li>
            <li>
              <h3> What is mental illness ? </h3>
              <p>
                A mental illness is a broad term which encompasses a wide variety of conditions which affect the way you feel and think. </br>
                It can also affect your ability to get through day-to-day life.
              </p>
            </li>

            <li>
              <h3> What influences Mental illnesses ? </h3>
              <p>
                Genetics </br>
                Environment </br>
                Daily habits </br>
                Biology </br>
              </p>
            </li>

            <li>
              <h3> What are some of the common Mental Health disorders/Illnesses ? </h3>
              <p>
                Bipolar disorder. </br>
                Persistent depressive disorder. </br>
                Generalized anxiety disorder. </br>
                Major depressive disorder. </br>
                Obsessive-compulsive disorder. </br>
                Post-traumatic stress disorder (PTSD) </br>
                Schizophrenia. </br>
                Social anxiety disorder. </br>
              </p>
            </li>
            
            <li>
              <h3>How can I can keep good mental health ? </h3>
              <p>
                keeping a positive attitude </br>
                staying physically active </br>
                helping other people </br>
                getting enough sleep </br>
                eating a healthy diet </br>
                asking for professional help with your mental health if you need it </br>
                socializing with people whom you enjoy spending time with </br>
                forming and using effective coping skills to deal with your problems </br>
              </p>
            </li>

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

        <form method="POST" action="modules/updateUserData.php" enctype="multipart/form-data">

          <div class="row">
            <div class="profile-pic">
              <img src="resources/img/twotone_account.png" alt="" srcset="">
            </div>
          </div>

          <div class="from_db">

          </div>

          <div class="row">
            <!-- <input type="file" name="file" placeholder="UPLOAD AN IMAGE" id="post-img" accept="image/*"> -->
            <input type="file" name="file" placeholder="UPLOAD AN IMAGE" id="post-img">
          </div>

          <div class="row">
            <!-- <input type="submit" name="updatedata" id="update-data" placeholder="update"> -->
            <button type="submit" name="up" id="update-data"> UPDATE </button>
          </div>

        </form>

      </section>

      <section class="counselors">
        <h2>
          CONSELLORS AVAILABLE
        </h2>

        <div class="container-list">
          
          <div class="wrapped">
            <img src="https://cdn.vox-cdn.com/thumbor/KmUSGKjWbKxOCahy4yZkw17HZ64=/0x0:2370x1574/920x613/filters:focal(996x598:1374x976):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/68870438/Screen_Shot_2020_07_21_at_9.38.25_AM.0.png" alt="">
            <article>
              <h2><a href="https://www.twitter.com/random_studio" target="_blank" >@random_studio</a> mentioned you</h2>
              <p>
                How would you like to intern with us this summer?
              </p>
            </article>
          </div>

          <div class="wrapped">
            <img src="https://cdn.vox-cdn.com/thumbor/KmUSGKjWbKxOCahy4yZkw17HZ64=/0x0:2370x1574/920x613/filters:focal(996x598:1374x976):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/68870438/Screen_Shot_2020_07_21_at_9.38.25_AM.0.png" alt="">
            <article>
              <h2><a href="https://www.twitter.com/random_studio" target="_blank" >@random_studio</a> mentioned you</h2>
              <p>
                How would you like to intern with us this summer?
              </p>
            </article>
          </div>

          <div class="wrapped">
            <img src="https://cdn.vox-cdn.com/thumbor/KmUSGKjWbKxOCahy4yZkw17HZ64=/0x0:2370x1574/920x613/filters:focal(996x598:1374x976):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/68870438/Screen_Shot_2020_07_21_at_9.38.25_AM.0.png" alt="">
            <h2> entioned you</h2>
            <h2> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro, numquam? </h2>
          </div>

          <div class="wrapped">
            <img src="https://cdn.vox-cdn.com/thumbor/KmUSGKjWbKxOCahy4yZkw17HZ64=/0x0:2370x1574/920x613/filters:focal(996x598:1374x976):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/68870438/Screen_Shot_2020_07_21_at_9.38.25_AM.0.png" alt="">
            <article>
              <h2><a href="https://www.twitter.com/random_studio" target="_blank" >@random_studio</a> mentioned you</h2>
              <p>
                How would you like to intern with us this summer?
              </p>
            </article>
          </div>
          
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

      <!-- SECTION FOR THE EVENTS -->
      <section class="aob">

        <?php

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

          if ($my_list) {        

            foreach ($my_list as $key => $value) {
                        
              $titles_array = $value['complaint'];

              $dates = $value['appointment_date'];

              $formatted_date = DateTime::createFromFormat('Y-m-d', $value['appointment_date']);

                if ($formatted_date === false) {
                
                  echo "Incorrect date string";
                
                } else {
                
                  $new_date = $formatted_date->getTimestamp();
                
                }
          ?>
              
          <div class="aob_content">
            <p id='df'> <?php echo $titles_array; ?> </p>
            <p id='dfd'> <?php echo  $new_date; ?> </p>
          </div>

          <?php 
      
          }

        }
      
        ?>
      
      </scetion>

    </main>

    <script src="js/studentEvents.js"></script>

    <script>

      var titles = document.querySelectorAll("[id='df']");
      var timestamps = document.querySelectorAll("[id='dfd']");

      // POPULATING THE OBJECT FOR THE CALENDER
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