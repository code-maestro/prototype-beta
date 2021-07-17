// Handling user events
const approvebtn = document.getElementById("approve-btn");

var complaint, date, time, stdname, reg_no, email  = "";

reg_no = document.getElementById("regno").value;
stdname = document.getElementById("std-name").value;
email = document.getElementById("email").value;
complaint = document.getElementById("complaint").value;
date = document.getElementById("date").value;
time = document.getElementById("time").value;

// Function to send data to the student info
function viewData() {
	
	document.getElementById("details-regno").innerHTML = reg_no;
	document.getElementById("details-name").innerHTML = stdname;
	document.getElementById("details-email").textContent = email;
	document.getElementById("details-date").textContent = date;
	document.getElementById("details-time").textContent = time;
	document.getElementById("details-complaint").textContent = complaint;

}
