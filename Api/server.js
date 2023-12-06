

//creates new http server
import http from 'node:http';
import pokedex from 'pokedex-promise-v2';
import express from 'express';
const P = new pokedex ();
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
P.getGenerationByName("generation-i")
.then((response) => {
  info = response;
})
.catch((error) => {
  console.log('There was an ERROR: ', error);
});

app.get('/', (req, res)=>{ 
	res.status(200); 
  res.json({ news: 'fake'})
	res.send("Welcome to root URL of Server"); 
  
}); 


app.listen(PORT, (error) =>{ 
	if(!error) 
		console.log("Server is Successfully Running, and App is listening on port "+ PORT) 
	else
		console.log("Error occurred, server can't start", error); 
	} 
); 



app.listen(80);
//Idk


