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

var mail = localStorage.getItem('selected-counsellor-id');

// Notifications button event
notifications.onclick = function() {
  modal.style.display = "block";

  //counsellorid.value = localStorage.getItem("selected-counsellor-id");

  //counsellorid.innerHTML(localStorage.getItem("selected-counsellor-id"));
  console.log(counsellorid);
}

mailForm.onsubmit = (e)=>{
  e.preventDefault();
}

form.onsubmit = (e)=>{
  e.preventDefault();
}

formSend.onclick = function() {
  alert("😋🤣😂😂😂");
  console.log(std_id);
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
}

// COUNSELORS button event
counselorsBtn.onclick = function() {
  // document.querySelector(".faqs").style.display = "block";
  document.querySelector(".counselors").style.display = "block";
  document.querySelector(".appointments").style.display = "none";
}

// Faqs button event
faqsBtn.onclick = function() {
  document.querySelector(".faqs").style.display = "block";
  document.querySelector(".counselors").style.display = "none";
  document.querySelector(".appointments").style.display = "none";
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

// click event to populate the list for counsellors in the dropdown
document.querySelector("details .males").onclick = function() {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "getMaleCounsellor.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        document.querySelector(".listed").innerHTML = data;

        document.querySelector(".listed li").onclick = function () {

          var counsellor_id = document.querySelector(".listed .the-id").value;

          localStorage.setItem("selected-counsellor-id", counsellor_id);

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

  xhttp.open("POST", "getFemaleCounsellor.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        console.log(data);

        document.querySelector(".females-listed").innerHTML = data;

        //console.log(document.querySelector(".females-listed input"));

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

  xhttp.open("POST", "std_getChat.php", true);

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

$( "#sending" ).click(function() {
  $.post( "std_newMessage.php", { email: mail, incomingid: incoming_id, message: inputField.value} );
  console.log(mail);
  console.log(incoming_id);
  console.log(inputField.value);
});