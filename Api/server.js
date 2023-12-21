//creates new http server
import http from "node:http";
import pokedex from "pokedex-promise-v2";
import express from "express";
const P = new pokedex();
// //sets the server to listen to a specified port and host name
// const hostname = '127.0.0.2';
// const port = 3000;
// //calls the request event whenever a new request is received
// const server = http.createServer((req, res) => {
//   res.statusCode = 200;
//   res.setHeader('Content-Type', 'text/plain');
//   res.end('Hello World');

// });
// server.listen(port, hostname, () => {
//   console.log(`Server running at http://${hostname}:${port}/`);
// });

const app = express();
const PORT = 3000;
let info;
P.getPokemonByName("ditto")
  .then((response) => {
    info = response;
  })
  .catch((error) => {
    console.log("There was an ERROR: ", error);
  });

// var name = info.name;
// var hp = info.stats[0].effort;
// var at = info.stats[1].effort;
// var def = info.stats[2].effort;
// var sat = info.stats[3].effort;
// var sdef = info.stats[4].effort;
// var spd = info.stats[5].effort;

// 

app.get("/", (req, res) => {
  res.status(200);
  // var data = info.pokemon_species
  var pokemon = {};
  var key = "temp";
  pokemon[key] = [];
  var temp2 = {
    name: info.name,
    hp: info.stats[0].effort,
    at: info.stats[1].effort,
    def: info.stats[2].effort,
    sat: info.stats[3].effort,
    sdef: info.stats[4].effort,
    spd: info.stats[5].effort,
  };
  pokemon[key].push(temp2);
  JSON.stringify(pokemon);
  let pokeList = [];
  // for (const pokemon in data) {
  // 	pokeList.push(data[pokemon].name);
  // }
  // res.json(pokeList);
  res.json(pokemon);
});

app.listen(PORT, (error) => {
  if (!error)
    console.log(
      "Server is Successfully Running, and App is listening on port " + PORT
    );
  else console.log("Error occurred, server can't start", error);
});

app.listen(80);
//Idk
