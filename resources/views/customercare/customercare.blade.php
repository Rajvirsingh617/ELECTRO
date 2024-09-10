<x-layout>
    <!-- Include your CSS and JS libraries -->
    <!-- Example: Bootstrap CSS and Font Awesome -->

    
        <section class="content">
            <div class="container-fluid">
                <div class="content-header">
                    <h1 class="text-dark">CustomerCare Chat</h1>
                </div>
                <div class="content px-2">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="d-flex justify-content-center">
                                <div class="card card-success text-center">
                                    <div class="card-header">
                                        <h3 class="card-title">Customers</h3>
                                    </div>
                                    <div class="card-body">
                                        <a href="#">Customer1 <span class="badge badge-info">10</span></a>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#">Customer2 <span class="badge badge-info">5</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="card card-blue direct-chat direct-chat-blue">
                                <div class="card-header">
                                    <h3 class="card-title">Chat with Customer</h3>
                                </div>
                                <div class="card-body">
                                    <div class="direct-chat-messages" id="messages">
                                        <!-- Messages will be dynamically inserted here -->
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <form id="careChatForm">
                                        <div class="input-group">
                                            <input type="text" id="careInput" class="form-control" placeholder="Type Message...">
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Send</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <script src="https://cdn.socket.io/4.3.2/socket.io.min.js"></script>
        <script>
            var socket = io('http://localhost:3001'); // Adjust to your Node.js server address
        
            var careForm = document.getElementById('careChatForm');
            var careInput = document.getElementById('careInput');
        
            careForm.addEventListener('submit', function(e) {
                e.preventDefault();
                if (careInput.value) {
                    socket.emit('chat message', {
                        msg: careInput.value,
                        time: new Date().toLocaleTimeString(),
                        sender: 'customercare'
                    });
                    careInput.value = ''; // Clear input
                }
            });
        
            socket.on('chat message', function(data) {
                var messages = document.getElementById('messages');
                var item = document.createElement('div');
        
                // Set the appropriate classes
                item.classList.add('direct-chat-msg');
                if (data.sender === 'customercare') {
                    item.classList.add('right'); // Align the message to the right for CustomerCare
                }
        
                // Insert the message content
                item.innerHTML = `
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-${data.sender === 'customercare' ? 'right' : 'left'}">${data.sender === 'customercare' ? 'CustomerCare' : 'Customer'}</span>
                        <span class="direct-chat-timestamp float-${data.sender === 'customercare' ? 'left' : 'right'}">${data.time}</span>
                    </div>
                    <img class="direct-chat-img" src="/dist/img/user1-128x128.jpg" alt="User Image">
                    <div class="direct-chat-text">
                        ${data.msg}
                    </div>`;
        
                messages.appendChild(item);
                messages.scrollTop = messages.scrollHeight; // Auto scroll to the bottom of the chat
            });
        </script>
        
    </x-layout>
    