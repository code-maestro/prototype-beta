// Handling user events
const approvebtn = document.getElementById("approve-btn");

const comp = document.getElementById("complaint").value;

approvebtn.addEventListener('click', () => {
	alert(typeof(comp));
});