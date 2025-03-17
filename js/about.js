function setVersion() {
	let versionElement = document.getElementById("version");
	let request = new XMLHttpRequest();
	// request.addEventListener("load", () => { versionElement.innerText = this.responseText; });
	request.addEventListener("load", () => { versionElement.innerText = request.responseText; });
	request.open("GET", "/phpscripts/version.php");
	request.send();
}