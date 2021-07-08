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
	
	student_tag.style.backgroundColor = "#2c3e50";
	student_tag.style.color = "#FFFFFF";
	
	staff_tag.style.backgroundColor = "#f8f8f8";
	staff_tag.style.color = "#000000";
});

staff_tag.addEventListener('click', () => {
	staff_signup.style.display = "block";
  student_signup.style.display = "none";
	
	staff_tag.style.backgroundColor = "#2c3e50";
	staff_tag.style.color = "#FFFFFF";

	student_tag.style.backgroundColor = "#f8f8f8";
	student_tag.style.color = "#000000";
});