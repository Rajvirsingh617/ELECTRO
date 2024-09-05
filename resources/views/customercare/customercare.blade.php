<x-layout>
    <!-- Include your CSS and JS libraries -->
    <!-- Example: Bootstrap CSS and Font Awesome -->

    <section class="content">
        <div class="container-fluid">
            <div class="content-header">
                <h1 class="text-dark">CustomerCare Chat</h1>
            </div>
            <div class="content px-2">
                <div class="row"> <!-- Ensure this row wraps both columns -->
                    <div class="col-md-2"> <!-- Customers Section -->
                        <div class="d-flex justify-content-center"> <!-- Center horizontally -->
                            <div class="card card-success text-center"> <!-- Added text-center class for aligning text -->
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
                    <div class="col-md-10"> <!-- Chat Section -->
                        <div class="card card-blue direct-chat direct-chat-blue">
                            <div class="card-header">
                                <h3 class="card-title">Chat with Customercare</h3>
                                <div class="card-tools">
                                    <span data-toggle="tooltip" title="3 New Messages" class="badge badge-light">3</span>
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                                        <i class="fas fa-comments"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="direct-chat-messages">
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Anil Dalar</span>
                                            <span class="direct-chat-timestamp float-right">4 sep 12:00 pm</span>
                                        </div>
                                        <img class="direct-chat-img" src="/assets/img/user1-128x128.jpg" alt="message user image">
                                        <div class="direct-chat-text">
                                            Can you help me?
                                        </div>
                                    </div>
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                            <span class="direct-chat-timestamp float-left">4 sep 12:05 pm</span>
                                        </div>
                                        <img class="direct-chat-img" src="/dist/img/user2-160x160.jpg" alt="message user image">
                                        <div class="direct-chat-text">
                                            Yes Please Tell Me 
                                        </div>
                                    </div>
                                </div>
                                <div class="direct-chat-contacts">
                                    <ul class="contacts-list">
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="/docs/3.0/assets/img/user1-128x128.jpg">
                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        Count Dracula
                                                        <small class="contacts-list-date float-right">2/28/2015</small>
                                                    </span>
                                                    <span class="contacts-list-msg">How have you been? I was...</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-footer">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                        <span class="input-group-append">
                                            <button type="button" class="btn btn-primary">Send</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- End of Chat Section -->
                </div> <!-- End of Row -->
            </div>
        </div>
    </section>

    <!-- Include your JS libraries at the bottom for better performance -->
    <!-- Example: jQuery and Bootstrap JS -->

    <script>
        // Include any additional JS logic here
    </script>
</x-layout>
