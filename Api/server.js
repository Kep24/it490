//creates new http server
const http = require('node:http');
//sets the server to listen to a specified port and host name
const hostname = '127.0.0.2';
const port = 3000;
//calls the request event whenever a new request is received
const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  res.end('Hello World\n');
});
server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});