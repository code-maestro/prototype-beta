const notifications = document.getElementById("notification-btn");

const overviewBtn = document.getElementById("overview");
const appointmentsBtn = document.getElementById("appointments");
const counselorsBtn = document.getElementById("counselors");
const faqsBtn = document.getElementById("faqs-btn");

// Notifications button event
notifications.onclick = function() {
  document.querySelector(".notifications .badge").style.display = "block";
  document.querySelector(".notification-modal").style.display = "block";
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