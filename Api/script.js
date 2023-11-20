// api url
const api_url = 
	"https://pokeapi.co/api/v2/berry/cheri/";

// Defining async function
async function getapi(url) {

	// Storing response
	const response = await fetch(url);

	// Storing data in form of JSON
	var data = await response.json();
	console.log(data);
	if (response) {
		hideloader();
	}
	show(data);
}
// Calling that async function
getapi(api_url);

// Function to hide the loader
function hideloader() {
	document.getElementById('loading').style.display = 'none';
}
// Function to define innerHTML for HTML table
function show(data) {
	document.write(data.firmness.name+"<br>");
	document.write(data.flavors[0].flavor.name+"<br>");
	for (var x in data.flavors[0].flavor){
		document.write(data.flavors[0].flavor[x]+"<br>");
	}
	// Setting innerHTML as tab variable
	document.getElementById("employees").innerHTML = tab;
}
