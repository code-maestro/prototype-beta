// Get the modal
var modal = document.getElementById("myModal");
var btn = document.getElementById("respond-btn");
var span = document.getElementsByClassName("close")[0];
var liveChat = document.getElementById("livechat");
var phoneCall = document.getElementById("tollfree");
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
span.onclick = function () {
  modal.style.display = "none";
  console.log("Button clicked.");
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Click events
liveChat.onclick = function () {
  console.log("Button clicked......");
  document.getElementById("chat").style.display = "block";
  document.getElementById("chat").style.backgroundColor = "#c5c5c5";
  document.getElementById("zoom").style.display = "none";
  document.getElementById("toll").style.display = "none";
  document.getElementById("mail").style.display = "none";
}

zoomLink.onclick = function () {
  document.getElementById("chat").style.display = "none";
  document.getElementById("mail").style.display = "none";
  document.getElementById("toll").style.display = "none";
  document.getElementById("zoom").style.display = "block";
  document.getElementById("zoom").style.backgroundColor = "#c5c5c5";
}

sendEmail.onclick = function () {
  document.getElementById("chat").style.display = "none";
  document.getElementById("zoom").style.display = "none";
  document.getElementById("toll").style.display = "none";
  document.getElementById("mail").style.display = "block";
  document.getElementById("mail").style.backgroundColor = "#c5c5c5";
}