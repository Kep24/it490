import Pokedex from "pokedex-promise-v2";
const P = new Pokedex();

var $pokemon = process.argv[2];
P.getPokemonByName($pokemon)
  .then((response) => {
    var data = response;
    //   for (const pokemon in data) {
    //     console.log(data[pokemon].name);
    //   }
    var pokemon = [];
    pokemon.push(data.name);
    pokemon.push(data.stats[0].effort);
    pokemon.push(data.stats[1].effort);
    pokemon.push(data.stats[2].effort);
    pokemon.push(data.stats[3].effort);
    pokemon.push(data.stats[4].effort);
    pokemon.push(data.stats[5].effort);
   
    // var temp2 = {
    //   name: data.name,
    //   hp: data.stats[0].effort,
    //   at: data.stats[1].effort,
    //   def: data.stats[2].effort,
    //   sat: data.stats[3].effort,
    //   sdef: data.stats[4].effort,
    //   spd: data.stats[5].effort,
    // };
    // pokemon.push(temp2);
    pokemon.forEach( info => console.log(info));
    
   
    
  })
  .catch((error) => {
    console.log("There was an ERROR: ", error);
  });
