
if (localStorage['pineapples'] == undefined) {
	localStorage['pineapples'] = 0;
	localStorage['ppc'] = 1;
}
let userStats = {
	"pineapples": Number(localStorage['pineapples']),
	"ppc": Number(localStorage['ppc']), // Pineapples per click, ofc!
}

let pineappleCount;
let ppcCount;
function init() {
	document.querySelector("#clickbtn").addEventListener("click", click);
	pineappleCount = document.querySelector("#pineappleCounter");
	ppcCount = document.querySelector("#ppcCount");

	setInterval(update, 200);
	setInterval(autoclick, 1000);
}
// setTimeout( () , 100 );

function click() {
	userStats.pineapples = Number(userStats.pineapples);
	userStats.pineapples += 1 * userStats.ppc;
}

function update() {
	// check for errors in pineapple counter
	// just zero it out cuz there is currently no way to check what value was there
	// TODO: make a loop thru userStats obj
	if (isNaN(userStats.pineapples)) userStats.pineapples = 1;
	if (isNaN(userStats.ppc)) userStats.ppc = 1;
	if (userStats.ppc == 0) userStats.ppc = 1;
	

	if ( pineappleCounter == undefined ) return;
	// assume all nodes are loaded into vars
	localStorage['pineapples'] = Number(userStats.pineapples);
	pineappleCount.innerText = Number(userStats.pineapples);

	localStorage['ppc'] = Number(userStats.ppc);
	ppcCount.innerText = Number(userStats.ppc);	
}

function buyUpgrade(upgradeName) {
	switch (upgradeName) {
		case "ppc":
			let price = getPrice();
			if (userStats.pineapples <= price) return;
			userStats.pineapples -= price;
			userStats.ppc += 1;
			break;
	}
}

function getPrice(upgradeName) {
	// TODO
	return 100;
}

function whatever() {
	alert(1);
}
