const notifications = document.getElementById("notification-btn");

// When the user clicks on <span> (x), close the modal
notifications.onclick = function() {
  document.querySelector(".notifications .badge").style.display = "block";
}