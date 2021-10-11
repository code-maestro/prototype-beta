// Get the modal
var modal = document.getElementById("myModal");
var btn = document.getElementById("respond-btn");
var span = document.getElementsByClassName("close")[0];

var liveChat = document.getElementById("livechat");
var zoomLink = document.querySelector("#zoomlink");
var sendEmail = document.getElementById("sendEmail");

//Preventing the form resubmit
document.querySelector('#catergory-btns').onsubmit = (e) => {
  e.preventDefault();
}

// Loading the pending appointments on screen page load
$(window).on('load', function() {
  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/admin-pending-appointments.php", true);

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

// Click event to view the pending appointment
document.querySelector(".pending").onclick = function() {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/admin-pending-appointments.php", true);

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

}

// Click event to view the Approved appointments
document.querySelector(".checked").onclick = function() {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/admin-approved-appointments.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;
        document.querySelector(".new-list").innerHTML = data;

        document.getElementById("approving-btn").value = " CANCEL ";
        
        document.getElementById("deleting-btn").onclick = function() {
          
          console.log(" Clicked to increment the counter ");
          
        }

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  xhttp.send();

}

// Click event to view the finished appointments
document.querySelector(".finished").onclick = function() {
  
  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/admin-completed-appointments.php", true);

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

document.querySelector('form').onsubmit = (e) => {
  e.preventDefault();
}

// When the user clicks on the button, open the modal
btn.onclick = function () {
  
  if (document.getElementById("details-name").innerHTML.length == 0) {
    
    alert("Please Select a student to respond to ! ");

  } else {

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

    // Function to get meeting details
  async function getText(file) {
    let x = await fetch(file);
    let y = await x.text();

    document.querySelector(".ssd").innerHTML = y;
    
  }

  getText("./zoom/zoom.php");

}

sendEmail.onclick = function() {
  document.getElementById("typing-area").style.display = "none";
  document.getElementById("chat").style.display = "none";
  document.getElementById("zoom").style.display = "none";
  document.getElementById("mail").style.display = "block";
}

document.querySelector('.update-form form').onsubmit= (e) => {
  e.preventDefault();
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

// Click event to send the meeting link through sms
document.getElementById("sms-send").onclick = function() {

  document.querySelector(".broken").style.display = "block";

  $.ajax({
    method: "POST",
    url: "./modules/send-sms.php",
  })
  .done(function( response ) {
  
    $("p.broken").html(response);

  });

}

// Click event to send the meeting link through live chat
document.getElementById("live-send").onclick = function() {
  
  document.querySelector(".broken").style.display = "block";

  $.ajax({
    method: "POST",
    url: "./modules/send-chat.php",
  })
  .done(function( response ) {
  
    document.getElementById("typing-area").style.display = "flex";
    document.getElementById("chat").style.display = "block";
    document.getElementById("zoom").style.display = "none";
    document.getElementById("mail").style.display = "none";
    
    document.getElementById("message").value = response;

  });

}

// Click event to send the meeting link through whatsapp
document.getElementById("whatsapp-send").onclick = function() {
  
  document.querySelector(".broken").style.display = "block";

  $.ajax({
    method: "POST",
    url: "./modules/send-whatsapp.php",
  })
  .done(function( response ) {
  
    $("p.broken").html(response);

  });


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
