@extends('layouts.main')

@section('container')
    <div class="container mb-5 ">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <h4>{{ $post->title }}</h4>

                <p class="fw-bold">Ditulis Oleh {{ $post->author->name }} Dalam Kategori <a
                        href="/categories/{{ $post->category->name }}"
                        class="text-decoration-none">{{ $post->category->name }}</a> </p>
                {!! $post->body !!}

                <a href="/blog" class="btn btn-outline-primary">Back to Blog</a>
            </div>
        </div>
    </div>
@endsection
