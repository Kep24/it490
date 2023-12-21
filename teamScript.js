//sets button and adds an eventlistener for search button
const search = document.getElementById("add");
search.addEventListener("click", () => {
  search_id();
});

//sets button and adds an eventlistener for clear button
const clear = document.getElementById("clear");
clear.addEventListener("click", () => {
  clearList();
});

//clears list
function clearList() {
    document.getElementById("results").innerHTML = "";
}
//pulls searchbar input
function search_id() {
  var input = [];
  input.push(document.getElementById("pokemon").value);
  input.push(document.getElementById("ability").value);
  // let input = document.getElementById("pokemon").value;
  format(input);
}

//output to page and format for showdown
function format(input) {
  var text = document.getElementById("results").innerHTML;
  text = text.concat("<br>"+input[0] + "<br>");
  text = text.concat("Ability: " + input[1] + "<br>");
  output(text);
}

function output(text) {
  document.getElementById("results").innerHTML = text;
}
