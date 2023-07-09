@extends('layouts.main')

@section('container')
    <h1 class="text-center">Category</h1>
    <div class="row justify-content-center mt-3">
        @foreach ($categories as $categori)
            <div class="col-md-3">
                <a href="/categories/{{ $categori->slug }}" class="text-decoration-none">
                    <div class="bg-primary border-0 shadow card circle" id="category">
                        <ul class="list-group list-group-flush "id="category">
                            <li class="list-group-item fs-5">{{ $categori->name }}</li>
                        </ul>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

@endsection
