

function login() {

}

function signup() {

}

function init() {
	let loginBtn = document.getElementById("loginBtn");
	let signupBtn = document.getElementById("signupBtn");

	loginBtn.addEventListener("click", login);
	signupBtn.addEventListener("click", signup);

}

init();