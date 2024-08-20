@extends('layouts.app')

@section('main')
    <main id="content" role="main" class="container-fluid mt-5 mb-5">
        <div class="card text-center">
            <div class="card-header bg-light text-left">
                <img src=""/>
            </div>
            <div class="card-body" style="min-height:280px;">
                <div id="chat-container" class="text-left">
                    <!-- Chat messages will appear here -->
                </div>
            </div>
            <div class="card-footer text-body-secondary bg-white">
                <form id="chat-form">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg border-0" id="message" placeholder="Write a Message...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
