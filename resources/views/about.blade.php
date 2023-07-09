@extends('layouts.main')

@section('container')
    <h1>About Me</h1>
    <div class="card text-bg-dark shadow border-0">
        <img src="https://picsum.photos/1200/300" class="card-img" alt="about">
        <div class="card-img-overlay ">
            <h5 class="card-title">{{ $name }}</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
                This content is a little bit longer.</p>
            <p class="card-text"><small>Last updated 3 mins ago</small></p>
        </div>
    </div>
@endsection
