// Handling user events
const approvebtn = document.getElementById("approve-btn");

var time = "";
//  std_name,
let complaint = "<?php echo $ROW['complaint']?>";

time = document.getElementById("time").value;
//complaint = document.getElementById("complaint").value;

// Function to send data to the student info
function viewData() {
	// std_name = document.getElementById("std-name").value;

	alert(complaint);

	// document.getElementById("details-regno").innerHTML = time;
	// document.getElementById("details-fname").innerHTML = std_name;
	document.getElementById("details-lname").textContent = complaint;
}

function viewData2() {
	alert(comp);
}