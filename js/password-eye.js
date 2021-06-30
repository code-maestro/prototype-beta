const pswrdField = document.querySelector(".form-signup input[type='password']");
const pswrdField2 = document.querySelector(".form-signup .field #confirm_password");
toggleIcon = document.querySelector(".form-signup .field i");
toggleIcon2 = document.querySelector(".form-signup .field #icon");

// Function to reveal 'view' the pass 👀👀👀
toggleIcon.onclick = () => {

  if(pswrdField.type === "password"){
    pswrdField.type = "text";
    toggleIcon.classList.add("active");
  }else{
    pswrdField.type = "password";
    toggleIcon.classList.remove("active");
  }
}

toggleIcon2.onclick = () => {

  if(pswrdField2.type === "password"){
    pswrdField2.type = "text";
    toggleIcon2.classList.add("active");
  }else{
    pswrdField2.type = "password";
    toggleIcon2.classList.remove("active");
  }
}
