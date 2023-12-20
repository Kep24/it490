import Pokedex from "pokedex-promise-v2";
const P = new Pokedex ()

//with
// (async () => { // with Async/Await
//     try {
//         const golduckSpecies = await P.getPokemonSpeciesByName("golduck")
//         const frenchName = golduckSpecies.names.filter(pokeAPIName => pokeAPIName.language.name === 'fr')[0].name
//         console.log(frenchName)
//     } catch (error) {
//         throw error
//     }
// })()
class gen {
  constructor(name) {
    this.name = name;
  }
}
const gen1 = new gen('gen1');

P.getGenerationByName("generation-i")
    .then((response) => {
      var data = response.pokemon_species;
      for (const pokemon in data) {
        console.log(data[pokemon].name);
      }
      const info = response;
    })
    .catch((error) => {
      console.log('There was an ERROR: ', error);
    });

