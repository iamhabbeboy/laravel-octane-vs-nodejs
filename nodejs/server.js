const http = require('http');

const hostname = 'localhost';
const port = 3000;

const server = http.createServer((req, res) => {
  // Log incoming requests
  console.log(`[${new Date().toISOString()}] Incoming request: ${req.method} ${req.url}`);
  res.setHeader('Access-Control-Allow-Origin', '*');

  // Allow specific HTTP methods (you can change this as needed)
  res.setHeader('Access-Control-Allow-Methods', 'GET');

  // Allow specific HTTP headers (you can change this as needed)
  res.setHeader('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');

  // Set the response header
  if (req.url === '/' && req.method === 'GET') {
    // Respond with sample data (replace this with your actual API logic)
    res.writeHead(200, { 'Content-Type': 'text/plain' });
    res.end('Hello nodejs!');
  } else if(req.url === '/data' && req.method === 'GET') {
    const data = { message: 'Hello, this is your data!' };
    res.writeHead(200, { 'Content-Type': 'application/json' });
    res.end(JSON.stringify(data));
  }else {
    res.writeHead(404, { 'Content-Type': 'text/plain' });
    res.end('Not Found');
  }
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
