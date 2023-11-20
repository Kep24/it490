const P = new Pokedex.Pokedex();
// with await, be sure to be in an async function (and in a try/catch)
//   (async () => {
//     const genData = await P.getGenerationByName("1");
//     console.log(genData);
//     var data = (genData.pokemon_species)
//     for (const pokemon in data ){
//         show(data[pokemon].name +"<br>");
//     }

//   })();
//Define async function
async function getGenData(gen) {
  const genData = await P.getGenerationByName(gen);
  console.log(genData);
  var data = genData.pokemon_species;
  let pokemonList = [];
   for (const pokemon in data) {
    //  show(data[pokemon].name + "<br>");
    pokemonList.push(data[pokemon].name);
   }
   setList(pokemonList);
}
// Calling that async function
// getGenData(gen);


//setList function
function setList(results) {
  clearList();
  for (const poke of results) {
    //creates a li element for each result item
    const resultItem = document.createElement("li");

    //adds a class to each item of the results
    resultItem.classList.add("result-item");

    //grabs the name of the current point of the loop and adds the name as the list item's text
    const text = document.createTextNode(poke);

    //appends the text to the result item
    resultItem.appendChild(text);

    //appends the result item to the list
    list.appendChild(resultItem);
  }
}

//pulls searchbar input
function search_id() {
  let input = document.getElementById("search").value;
  input = input.toLowerCase();
  getGenData(input);
}

//sets button and adds an eventlistener for search button
const search = document.getElementById("searchButton");
search.addEventListener("click", () => {
  search_id();
});

//clears list
function clearList() {
  //looping through each child of the search results list and removes them
  while (list.firstChild) {
    list.removeChild(list.firstChild);
  }
}

$(function() {
    var items = [{
        text: "Adams",
        value: "emp1"
    }, {
        text: "James",
        value: "emp2"
    }, {
        text: "Maria",
        value: "emp3"
    }, {
        text: "Jessica",
        value: "emp4"
    }, {
        text: "Jenneth",
        value: "emp5"
    }];
    $('#search').ejDropDownList({
        dataSource: items,
        fields: {
            text: "text",
            value: "value"
        },
        enableIncrementalSearch: true,
        caseSensitiveSearch: true
    });
});