const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
std_id = form.querySelector(".std_id"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector(".sendMe"),
chatBox = document.querySelector(".chat");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();

//  Click event to send a message
sendBtn.onclick = () => {

  console.log(" clicked this motherfvcker");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "newMessage.php", true);
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

  xhr.send(formData);

}

// Function retrieving messages
setInterval(() => {

  // Create an XMLHttpRequest object
  const xhttp = new XMLHttpRequest();

  xhttp.open("POST", "getChat.php", true);

  // Define a callback function
  xhttp.onload = function() {
    // Here you can use the Data
    if(xhttp.readyState === XMLHttpRequest.DONE){
      
      if(xhttp.status === 200){
        
        let data = xhttp.response;

        chat.innerHTML = data;

        console.log(data);

      }
    }
  }

  // Send a request
  xhttp.send();

  // // // FETCH API ALTERNATIVE
  // fetch('getChat.php')
  //   .then((res) => console.log(res))
  //   .catch((error) => console.log(error));

}, 1500);


function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  