const http = require('http');

const hostname = 'localhost';
const port = 3000;

const server = http.createServer((req, res) => {
  // Log incoming requests
  console.log(`[${new Date().toISOString()}] Incoming request: ${req.method} ${req.url}`);

  // Set the response header
  res.writeHead(200, { 'Content-Type': 'text/plain' });

  // Write the response content
  res.end('Hello, this is a basic Node.js server!');
});

// Log when the server starts listening
server.on('listening', () => {
  console.log(`[${new Date().toISOString()}] Server is listening on http://${hostname}:${port}/`);
});

// Log any server errors
server.on('error', (error) => {
  console.error(`[${new Date().toISOString()}] Server error: ${error.message}`);
});

server.listen(port, hostname);
