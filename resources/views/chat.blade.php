@extends('layouts.app')

@section('main')
<main id="content" role="main" class="container-fluid mt-5 mb-5">
    <!-- Slider Section -->
    <div class="card text-center">
        <div class="card-header bg-light text-left">
            <img src="https://e7.pngegg.com/pngimages/480/63/png-clipart-t-shirt-monkey-d-luffy-roronoa-zoro-one-piece-nami-t-shirt-photography-manga.png" width="100px" />
        </div>
        <div class="card-body" style="min-height: 300px;">
            <!-- Chat content will go here -->
        </div>
        <div class="card-footer text-body-secondary bg-Whight">
        <form>
    <div class="mb-3">
        <div class="row a_tbdr">
            <div class="col-10 a_tbdr"><label for="exampleFormControlInput1" class="form-label"></label>
            <input type="text" class="form-control-lg w-100 border-0 rounded-0" id="exampleFormControlInput1" placeholder="Write a Message"></div>
            <div class="col-2 a_tbdr"> Send </div>
        </div>
        
    </div>
</form>


        </div>
    </div>
</main>
@endsection
