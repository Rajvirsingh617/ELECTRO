const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const cors = require('cors');

const app = express();
app.use(cors());

const server = http.createServer(app);
const io = new Server(server, {
  cors: {
    origin: "*", // Allow all origins (You can restrict this as needed)
    methods: ["GET", "POST"]
  }
});

io.on('connection', (socket) => {
  console.log('A user connected', socket.id);

  socket.on('chat message', (data) => {
    const messageData = {
      msg: data.msg,
      time: data.time,
      sender: data.sender || 'user'  // Default sender is 'user' if not provided
    };

    // Send the message to everyone except the sender
    socket.broadcast.emit('chat message', messageData);
  });

  socket.on('disconnect', () => {
    console.log('A user disconnected', socket.id);
  });
});

server.listen(3001, () => {
  console.log('Socket.io server is running on port 3001');
  var alignment = (data.sender === 'customercare') ? 'direct-chat-msg right' : 'direct-chat-msg';

  var item = document.createElement('div'); // Change 'li' to 'div'

});


