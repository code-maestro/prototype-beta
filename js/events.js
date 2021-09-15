// Get the modal
var modal = document.getElementById("myModal");
var btn = document.getElementById("respond-btn");
var span = document.getElementsByClassName("close")[0];

var liveChat = document.getElementById("livechat");
var zoomLink = document.getElementById("zoomlink");
var sendEmail = document.getElementById("sendEmail");

// When the user clicks on the button, open the modal
btn.onclick = function () {
  console.log("Button clicked.");
  
  if (document.getElementById("details-name").innerHTML.length == 0) {
  // if (document.getElementById("detailsRegno").value.length == 0) {
    alert("Please Select a student to respond to ! ")
  }
  else {
    modal.style.display = "block";
  }

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

// Click events
liveChat.onclick = function() {
  document.getElementById("typing-area").style.display = "flex";
  document.getElementById("chat").style.display = "block";
  document.getElementById("zoom").style.display = "none";
  document.getElementById("mail").style.display = "none";
}

zoomLink.onclick = function() {
  document.getElementById("chat").style.display = "none";
  document.getElementById("mail").style.display = "none";
  document.getElementById("typing-area").style.display = "none";
  document.getElementById("zoom").style.display = "block";
  // document.getElementById("zoom").style.backgroundColor = "#background-color: #f3f3f3;"
}

sendEmail.onclick = function() {
  document.getElementById("typing-area").style.display = "none";
  document.getElementById("chat").style.display = "none";
  document.getElementById("zoom").style.display = "none";
  document.getElementById("mail").style.display = "block";
}

// document.querySelector('.update-form form').onsubmit= (e) => {
//   e.preventDefault();
// }

document.querySelector('#zoom form').onsubmit = (e) => {
  e.preventDefault();
}

document.querySelector('.get-meeting').onclick = () => {
  
  console.log("enter her dms ");

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "../zoom/zooom.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        console.log("data");

        console.log(data);

        document.querySelector(".meeting-things").innerHTML = data;

      }
    }
  }
}

// Preventing form resubmit for the view details, approve and delete
document.querySelector('.list-header form').onsubmit = (e) => {
  e.preventDefault();
}

// Overview button event
document.getElementById("overview").onclick = function() {
  document.querySelector(".counselors").style.display = "none";
  document.querySelector(".faqs").style.display = "none";
  document.querySelector(".update-form").style.display = "none";
  document.querySelector(".appointments").style.display = "flex";
}

// COUNSELORS button event
document.getElementById("counsellors").onclick = function() {
  document.querySelector(".counselors").style.display = "block";
  document.querySelector(".appointments").style.display = "none";
  document.querySelector(".update-form").style.display = "none";
}

document.querySelector("#update-btn").onclick = function() {
  document.querySelector(".faqs").style.display = "none";
  document.querySelector(".counselors").style.display = "none";
  document.querySelector(".appointments").style.display = "none";
  document.querySelector(".update-form").style.display = "block";

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/getCounsellorData.php", true);

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

// Function to update the user data
$("#update-data").click(function() {

  var fname = document.querySelector('#update_first_name').value;
  var lname = document.querySelector('#update_last_name').value;
  var email = document.querySelector('#update_email').value;
  var gender = document.querySelector('#update_gender').value;
  var phone = document.querySelector('#update_phone').value;
  var pass = document.querySelector('#update_pass').value;
  var pass2 = document.querySelector('#update_pass2').value;

  $.post( "modules/updateCounsellorData.php", 
  { 
    first_name: fname, 
    last_name: lname, 
    mail: email,
    gender: gender,
    phone_number: phone,
    password: pass,
    password2: pass2
  });

});
