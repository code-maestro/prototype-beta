const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
formSend = document.querySelector("button");

const overviewBtn = document.getElementById("overview");
const appointmentsBtn = document.getElementById("appointments");
const counselorsBtn = document.getElementById("counselors");
const faqsBtn = document.getElementById("faqs-btn");

var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];

var liveChat = document.getElementById("livechat");
var zoomLink = document.getElementById("zoomlink");
var sendEmail = document.getElementById("sendEmail");

var counsellorid = document.querySelector(".counsellor_id");
var incoming_id = document.querySelector(".incoming_id").value;

var notifications = document.querySelector("#notification-btn");
const sendBtn = document.querySelector(".sending");

const mailForm = document.querySelector(".mail form"),
sendMail = mailForm.querySelector('button');

const appointmentForm = document.querySelector(".student-info form");

// Notifications button event
notifications.onclick = function() {
  modal.style.display = "block";
}

document.querySelector('form').onsubmit = (e) => {
  e.preventDefault();
}

mailForm.onsubmit = (e) => {
  e.preventDefault();
}

form.onsubmit = (e) => {
  e.preventDefault();
}

appointmentForm.onsubmit = (e) => {
  e.preventDefault();
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


// Overview button event
overviewBtn.onclick = function() {
  document.querySelector(".counselors").style.display = "none";
  document.querySelector(".faqs").style.display = "none";
  document.querySelector(".appointments").style.display = "flex";
  document.querySelector(".update-form").style.display = "none";
}

// COUNSELORS button event
counselorsBtn.onclick = function() {
  document.querySelector(".counselors").style.display = "block";
  document.querySelector(".appointments").style.display = "none";
  document.querySelector(".update-form").style.display = "none";
  document.querySelector(".faqs").style.display = "none";

  getOnlineCounsellors();

  getAllCounsellors();

}

// Faqs button event
faqsBtn.onclick = function() {
  document.querySelector(".faqs").style.display = "block";
  document.querySelector(".update-form").style.display = "none";
  document.querySelector(".counselors").style.display = "none";
  document.querySelector(".appointments").style.display = "none";
}

// Function to retrieve all the counsellors registered with the app
function getAllCounsellors() {
  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/getCounsellors.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      if(xhttp.status === 200){
        let data = xhttp.response;
        document.querySelector("#all-c").innerHTML = data;
      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();

}

// Function to retrieve all the counsellors registered with the app
function getOnlineCounsellors() {
  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/getCounsellorsOnline.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        document.querySelector("#online-c").innerHTML = data;

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();

}

// Loading the pending appointments on screen page load
$(window).on('load', function() {
  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/student-pending-appointments.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;
        document.querySelector(".new-list").innerHTML = data;
        
        document.getElementById("deleting-btn").onclick = function() {
          
          console.log(" Clicked to increment the counter ");
          
        }

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  xhttp.send();

});

// Retrieivng pending appointments with a click event to a button
document.querySelector(".pending").onclick = function() {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/student-pending-appointments.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        document.querySelector(".new-list").innerHTML = data;

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  xhttp.send();

}

// Retrieivng approved appointments with a click event to a button
document.querySelector(".checked").onclick = function() {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/student-upcoming-appointments.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        document.querySelector(".new-list").innerHTML = data;

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  xhttp.send();

}

document.querySelector(".finished").onclick = function() {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        document.querySelector(".new-list").innerHTML = data;
        
        document.getElementById("viewDetailsbtn").style.display = "none";

        document.getElementById("approving-btn").style.display = "none";

        document.getElementById("deleting-btn").style.display = "none";

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  xhttp.send();

}

// Click events
liveChat.onclick = function() {
  document.querySelector(".chat-box p").style.display = "block";
  document.querySelector(".chat-box .choose").style.display = "flex";
  document.getElementById("typing-area").style.display = "flex";
  document.getElementById("chat").style.display = "block";
  document.getElementById("zoom").style.display = "none";
  document.getElementById("mail").style.display = "none";
}

zoomLink.onclick = function() {
  document.getElementById("chat").style.display = "none";
  document.querySelector(".chat-box p").style.display = "none";
  document.querySelector(".chat-box .choose").style.display = "none";
  document.getElementById("mail").style.display = "none";
  document.getElementById("typing-area").style.display = "none";
  document.getElementById("zoom").style.display = "block";
  document.getElementById("zoom").style.backgroundColor = "#background-color: #f3f3f3;";
}

sendEmail.onclick = function() {
  document.querySelector(".chat-box p").style.display = "none";
  document.querySelector(".chat-box .choose").style.display = "none";
  document.getElementById("typing-area").style.display = "none";
  document.getElementById("chat").style.display = "none";
  document.getElementById("zoom").style.display = "none";
  document.getElementById("mail").style.display = "block";
}

document.querySelector("#update-btn").onclick = function() {
  document.querySelector(".counselors").style.display = "none";
  document.querySelector(".faqs").style.display = "none";
  document.querySelector(".appointments").style.display = "none";
  document.querySelector(".update-form").style.display = "block";

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/getUserData.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        document.querySelector(".from_db").innerHTML = data;

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();

}

document.querySelector("#theFaqs").onclick = function() {
  document.querySelector(".faqs").style.display = "block";
  document.querySelector(".update-form").style.display = "none";
  document.querySelector(".counselors").style.display = "none";
  document.querySelector(".appointments").style.display = "none";
}

// click event to populate the list for counsellors in the dropdown
document.querySelector("details .males").onclick = function() {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/getMaleCounsellor.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        document.querySelector(".listed").innerHTML = data;

        document.querySelector(".listed li").onclick = function () {

          var counsellor_id = document.querySelector(".listed .the-id").value;

          localStorage.setItem("selected-male-counsellor-id", counsellor_id);

          counsellorid = counsellor_id;

          console.log(counsellor_id);

        }

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();

}

// click event to populate the list for counsellors in the dropdown
document.querySelector("details .females").onclick = function() {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/getFemaleCounsellor.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        document.querySelector(".females-listed").innerHTML = data;

        document.querySelector(".females-listed li").onclick = function () {

          var female_counsellor_id = document.querySelector(".females-listed .the-female-id").value;

          localStorage.setItem("selected-female-counsellor-id", female_counsellor_id);

          counsellorid = female_counsellor_id;

          console.log(female_counsellor_id);

        }

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();

}

//Click event for the counsellor selector for sending email
document.querySelector("details .male").onclick = function() {
  
  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/getMaleCounsellor.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        const males = document.querySelector(".male-listed");
        
        males.innerHTML = data;

        var clickedMales = males.getElementsByTagName("li");

        for (const clickedMale of clickedMales) {
          clickedMale.addEventListener('click', function() {
            
            const counsellor_email = clickedMale.getAttribute("id");
            const counsellor_names = clickedMale.getAttribute("class");
            const counsellor_lname = clickedMale.getAttribute("value");

            document.querySelector("#selo").innerHTML = counsellor_names + " " + counsellor_lname;
            document.querySelector("#selomail").innerHTML = counsellor_email;

          })
        }

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();

}

// click event to populate the list for counsellors in the dropdown
document.querySelector("details .female").onclick = function() {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/getFemaleCounsellor.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        const females = document.querySelector(".female-listed");
        
        females.innerHTML = data;

        var clickedFemales = females.getElementsByTagName("li");

        for (const clickedFemale of clickedFemales) {
          clickedFemale.addEventListener('click', function(event) {
            
            const counsellor_email = clickedFemale.getAttribute("id");
            const counsellor_names = clickedFemale.getAttribute("class");
            const counsellor_lname = clickedFemale.getAttribute("value");

            document.querySelector("#selo").innerHTML = counsellor_names + " " + counsellor_lname;
            document.querySelector("#selomail").innerHTML = counsellor_email;

          })
        }

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();

}

// Function retrieving messages
setInterval(() => {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/std_getChat.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;
        document.querySelector(".chat").innerHTML = data;

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  xhttp.send("counsellor_id="+counsellorid);

}, 500);

// Sending a text message with live chat feature with click event
$( "#sending" ).click(function() {
  if (inputField.value == "" ) {
    alert("Enter a message to start a conversation ");
  } else {
    $.post( "modules/std_newMessage.php", { email: counsellorid, incomingid: incoming_id, message: inputField.value} );
  }

  inputField.value = " ";

});

// Click event for make button to make an appointment
$( "#make-btn" ).click(function() {
  
  var selectedDate = document.querySelector("#select-date").value;
  var selectedStartTime = document.querySelector("#start-time").value;
  var selectedEndTime = document.querySelector("#end-time").value;
  var issue = document.querySelector("#complaint").value;
  var complaintDetail = document.querySelector("#complaint-detail").value;

  let currentDate = new Date();
  let dateSelected = new Date(selectedDate);

  if (dateSelected < currentDate) {

    alert("you entered a wrong date");

  }

  if ( selectedEndTime < selectedStartTime) {
    
    alert("you entered a wrong time "); 
    
  }else{

    $.post( "modules/std_newAppointment.php", { selectDate: selectedDate, selectStart: selectedStartTime, selectEnd: selectedEndTime, complaint: issue, complaint_detail: complaintDetail } );

    alert(" Your appointment has been recorded. you will be helped soon "); 

    document.querySelector("#select-date").value = "";
    document.querySelector("#start-time").value = "";
    document.querySelector("#end-time").value = "";
    document.querySelector("#complaint").value = "";
    document.querySelector("#complaint-detail").value = "";

  }

});

// Click function to send email
$( "#send-mail" ).click(function() {

  var selectedemail = document.querySelector("#selomail").innerHTML;  

  if (selectedemail == "" ) {
    alert(" Please Select a Counsellor to send an email to  ");
  } else {
    console.log(selectedemail);
    window.location.href = "mailto:" + selectedemail;
  }
});

// document.querySelector('.update-form form').onsubmit= (e) => {
//   e.preventDefault();
// }

// // Function to update the user data
// $( "#update-data" ).click(function() {

//   var fname = document.querySelector('#update_first_name').value;
//   var lname = document.querySelector('#update_last_name').value;
//   var email = document.querySelector('#update_email').value;
//   var reg = document.querySelector('#update_reg_no').value;
//   var gender = document.querySelector('#update_gender').value;
//   var phone = document.querySelector('#update_phone').value;
//   var pass = document.querySelector('#update_pass').value;
//   var pass2 = document.querySelector('#update_pass2').value;

//   if ( $.post( "modules/updateUserData.php", {
//     first_name: fname, 
//     last_name: lname, 
//     mail: email,
//     reg_no: reg,
//     gender: gender,
//     phone_number: phone,
//     password: pass,
//     password2: pass2
//   })) {

//     alert(" DATA HAS BEEN UPDATED ");
  
// } else {
  
//   alert(" DATA HAS NOT BEEN UPDATED ");

// }

// });

document.querySelector(".reachout-mail").onclick = function() {
  console.log("delete");

  modal.style.display = "block";
  
}

// Function retrieving messages
setInterval(() => {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/std_latest_message.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        document.querySelector(".notification-title").innerHTML = data;

        document.querySelector(".badge").style.display = "block";

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  xhttp.send("counsellor_id="+counsellorid);

}, 500);
