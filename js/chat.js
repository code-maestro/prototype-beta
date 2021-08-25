const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
std_id = form.querySelector(".std_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector(".sendMe");

const chatBox = document.querySelector(".chat");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();

//  Click event to send a message
sendBtn.onclick = () => {

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "modules/newMessage.php", true);
  xhr.onload = () => {
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){

          console.log(inputField.value);

          inputField.value = "";

          scrollToBottom();

        }
    }
  }

  let formData = new FormData(form);

  console.log(formData);

  xhr.send(formData);

}

// Function retrieving messages
setInterval(() => {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "modules/getChat.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        chatBox.innerHTML = data;

      }
    }
  }

  // Send a request
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  xhttp.send("std_id="+std_id);

}, 500);

function scrollToBottom(){
  chatBox.scrollTop = chatBox.scrollHeight;
}

var sampleEvents = [
  {
    title: "Soulful sundays bay area" + document.getElementById("timing").value,
    date: new Date().setDate(new Date().getDate() - 7),
    link: "#"
  },
  {
    title: "London Comicon",
    date: new Date().getTime(), // today
    link: "#"
  },
  {
    title: "Youth Athletic Camp ",
    date: new Date().setDate(new Date().getDate() + 31), // next month
    link: "#"
  }
];


$("#calendar").MEC({
events: sampleEvents,
from_monday:true
});