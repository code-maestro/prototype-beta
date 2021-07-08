const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
const student_tag = document.getElementById('student');
const staff_tag = document.getElementById('staff');
const staff_signup = document.getElementById("staff-signup");
const student_signup = document.getElementById("student-signup");

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

student.addEventListener('click', () => {
	staff_signup.style.display = "none";
  student_signup.style.display = "block";
});

staff_tag.addEventListener('click', () => {
	staff_signup.style.display = "block";
  student_signup.style.display = "none";
});