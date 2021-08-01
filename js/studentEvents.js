const notifications = document.getElementById("notification-btn");

const overviewBtn = document.getElementById("overview");
const appointmentsBtn = document.getElementById("appointments");
const counselorsBtn = document.getElementById("counselors");
const faqsBtn = document.getElementById("faqs-btn");

var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];

// Notifications button event
notifications.onclick = function() {
  modal.style.display = "block";
  document.querySelector(".notifications .badge").style.display = "block";
  // document.querySelector(".modal").style.display = "block";

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

// Function retrieving messages
setInterval(() => {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/notifications.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        document.querySelector(".theList").innerHTML = data;

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();

}, 1500);