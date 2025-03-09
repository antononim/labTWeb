
if (localStorage['pineapples'] == undefined) {
	localStorage['pineapples'] = 0;
	localStorage['ppc'] = 1;
	localStorage['pps'] = 1;
}
let userStats = {
	"pineapples": Number(localStorage['pineapples']),
	"ppc": Number(localStorage['ppc']), // Pineapples per click, ofc!
	"pps": Number(localStorage['pps'])
}


let countElements = {
	"pineappleCount": undefined,
	"ppcCount": undefined,
	"ppsCount": undefined
}
function init() {
	document.querySelector("#clickbtn").addEventListener("click", click);
	countElements['pineappleCount'] = document.querySelector("#pineappleCounter");
	countElements['ppcCount'] = document.querySelector("#ppcCount");
	countElements['ppsCount'] = document.querySelector("#ppsCount");

	setInterval(update, 200);
	setInterval(autoclick, 1000);
	setInterval(saveLocally, 10000);
	setInterval(saveGlobally, 120000);
	document.addEventListener("onbeforeunload", closing);
}
// setTimeout( () , 100 );

function click() {
	userStats.pineapples = Number(userStats.pineapples);
	userStats.pineapples += 1 * userStats.ppc;
}

function update() {
	// check for errors in pineapple counter
	// just zero it out cuz there is currently no way to check what value was there

	// do I REALLY need those bracke{s?
	for (stat in userStats)
		if (isNaN(userStats[stat]) || userStats[stat] == 0)
			userStats[stat] = 1;


	if ( countElements['pineappleCount'] == undefined ) return;
	// assume all nodes are loaded into vars
	localStorage['pineapples'] = Number(userStats.pineapples);
	countElements['pineappleCount'].innerText = Number(userStats.pineapples);

	// TODO: make a loop thru all count elements?

	countElements['ppcCount'].innerText = Number(userStats.ppc);
	countElements['ppcCount'].nextElementSibling.innerText = getPrice('ppc')
	
	countElements['ppsCount'].innerText = Number(userStats.pps);
	countElements['ppsCount'].nextElementSibling.innerText = getPrice('pps')
}

function saveLocally() {
	localStorage['ppc'] = Number(userStats.ppc);
	localStorage['pps'] = Number(userStats.pps);
}

function saveGlobally() {
	
}

function closing() {
	saveLocally();
	saveGlobally();
}

function buyUpgrade(upgradeName) {
	let price = 0;
	switch (upgradeName) {
		case "ppc":
			price = getPrice("ppc");

			if (userStats.pineapples <= price) return;
			userStats.pineapples -= price;
			userStats.ppc += 1;
			break;

		case "pps":
			price = getPrice("pps");
			if (userStats.pineapples <= price) return;
			userStats.pineapples -= price;
			userStats.pps += 1;
			break;
	}
}

function getPrice(upgradeName) {
	return userStats[upgradeName]*100;
}

function autoclick() {
	userStats.pineapples += userStats.pps;
}
