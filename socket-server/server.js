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
  <script src="https://cdn.socket.io/4.3.2/socket.io.min.js"></script>

    var socket = io('http://localhost:3001'); // Adjust to your Node.js server address

    var form = document.getElementById('chatForm');
    var input = document.getElementById('input');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (input.value) {
            socket.emit('chat message', {
                msg: input.value,
                time: new Date().toLocaleTimeString(),
                sender: 'customer'
            });
            input.value = ''; // Clear input
        }
    });

    socket.on('chat message', function(data) {
        var messages = document.getElementById('messages');
        var item = document.createElement('li');
        var alignment = (data.sender === 'customercare') ? 'message-received' : 'message-sent';
        
        item.innerHTML = `
            <div class="clearfix">
                <div class="${alignment} p-2 rounded mb-1">
                    <p class="mb-0">${data.msg}</p>
                    <small class="text-light">${data.time}</small>
                </div>
            </div>`;
        
        messages.appendChild(item);
        
        // Scroll only the chat body, not the entire page
        var chatBody = document.querySelector('.card-body');
        chatBody.scrollTop = chatBody.scrollHeight;
    });



});


