
let loginBtn, signupBtn, loginForm, signupForm

function login() {
	loginForm.hidden = false;
	signupForm.hidden = true;
}

function signup() {
	loginForm.hidden = true;
	signupForm.hidden = false;
}

function init() {
	loginForm = document.getElementById("loginform");
	signupForm = document.getElementById("signupform");
	pineapplesInput = document.getElementById("pineapplesInput");
	pineapplesInput.hidden = true;
	pineapplesInput.value = localStorage['pineapples'];
	ppcInput = document.getElementById("ppcInput");
	ppcInput.hidden = true;
	ppcInput.value = localStorage['ppc'];
	ppsInput = document.getElementById("ppsInput");
	ppsInput.hidden = true;
	ppsInput.value = localStorage['pps'];

	signupForm.hidden = true;
	// loginForm.hidden = true;


}

init();