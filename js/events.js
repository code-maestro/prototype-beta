// Handling user events
const txtArea = document.querySelector(".typing-area input");
const cancelbtn = document.querySelector(".cancelbtn");

// function to handle the event
txtArea.onclick = () => {
  txtArea.focus();
}

// Function to open a modal
function viewModal() {

  const pending = document.getElementById("open-pending");
  const approved = document.getElementById("open-approved");

  if (pending) {
    pending.style.display = "block";
  } else if (approved) {
    approved.style.display = "block";
  } else {
    document.getElementById("open").style.display = "block";
  }
}

// Function to close the modal
function closeModal() {

  const admin_modal = document.getElementById("open-pending");

  if (admin_modal) {
    admin_modal.style.display = "none";
  }else{
    document.getElementById("open-approved").style.display = "none";
  }
}

// Debugging fuvtion
function viewSession() {
  alert(" working 😩 ");
}

function intersectionOfArrays(params) {
  
}