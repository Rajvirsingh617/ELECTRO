@extends('layouts.app')

@section('main')

<main id="content" role="main" class="container-fluid mt-5 mb-5">
    <div class="card text-center chatCard">
        <div class="card-header bg-dark text-left">
            <div class="clearfix mt-2">
                <!-- Customer Care Badge -->
                <h4 class="badge text-white float-left a_chat bg-danger mb-1 mt-1 " class="card-title" style="font-size: 1.5rem; border: 2px solid #fff;">CustomerCare</h4>
                <!-- User's First Name -->
                <img width="50" src="https://www.freepnglogos.com/uploads/one-piece-logo-18.png" alt="Logo" />
                <h4 class="badge text-white float-right a_chat bg-danger mb-1 mt-1" style="font-size: 1.5rem; border: 2px solid #fff;">{{ session('firstname') }}</h4>
            </div>
        </div>

        <div class="card-body" style="min-height:350px;">
            <!-- Chat messages will be dynamically inserted here -->
            <ul id="messages">
                @foreach ($chatDatas as $chatData)
                    @if($chatData['sender'] == 'customercare')
                    <div class="clearfix">
                        <div class="message-received p-2 rounded mb-1">
                            <p class="mb-0">{{ $chatData['msg'] }}</p>
                            <small class="text-light">{{ $chatData['time'] }}</small>
                        </div>
                    </div>
                    @else
                    <div class="clearfix">
                        <div class="message-sent p-2 rounded mb-1">
                            <p class="mb-0">{{ $chatData['msg'] }}</p>
                            <small class="text-light">{{ $chatData['time'] }}</small>
                        </div>
                    </div>
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="card-footer text-body-secondary bg-white">
            <form id="chatForm">
                <div class="mb-3">
                    <div class="row no-gutters align-items-center">
                        <!-- Input Field with Right Border -->
                        <div class="col-10 pr-0">
                            <input type="text" class="chatInput form-control-lg w-100 rounded-0 border-right border-0" id="input" placeholder="Write a Message..." style="border-right: 2px solid #ccc;">
                        </div>
                        <!-- Send Button -->
                        <div class="col-2 pl-0">
                            <button type="submit" class="btn btn-lg btn-warning w-100" style="height: 100%;">Send <i class="fa-solid fa-message"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

{{-- Include Socket.io client-side script --}}
<script src="https://cdn.socket.io/4.3.2/socket.io.min.js"></script>
<script>
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
</script>

<style>
    /* Full-length message bubbles */
    .message-received {
        background: #777dd3;
        color: #121212; /* Slightly lighter than #161615 */


        padding: 10px 15px;
        border-radius: 15px;
        width: 50%; /* Adjust width for received messages */
        float: left;
        margin-bottom: 1px;
        font-size: 1.2rem;
        font-weight: bold;
        border-bottom-left-radius: 0;
        display: flex; /* For text alignment */
        justify-content: flex-start; /* Align text to the left */
        box-sizing: border-box; /* Include padding in the width */
    }

    .message-sent {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: #121212;
        padding: 10px 15px;
        border-radius: 15px;
        width: 50%; /* Adjust width for sent messages */
        float: right;
        margin-bottom: 1px;
        font-size: 1.2rem;
        font-weight: bold;
        border-bottom-right-radius: 5;
        display: flex; /* For text alignment */
        justify-content: flex-end; /* Align text to the right */
        box-sizing: border-box; /* Include padding in the width */
    }

    /* Adjust message text inside the bubble */
    .message-received p, .message-sent p {
        margin: 0;
        flex: 1; /* Allow the text to stretch within the container */
        word-wrap: break-word; /* Prevent long words from breaking the layout */
    }

    .message-received small, .message-sent small {
        display: block;
        text-align: right;
    }

    .chatInput {
        font-size: 1rem;
        padding: 15px;
    }

    /* Make sure the chat body is scrollable */
    .card-body {
        overflow-y: auto;
    }
</style>

@endsection
