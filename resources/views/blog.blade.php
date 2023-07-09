@extends('layouts.main')

@section('container')
    <h1 class="mt-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/blog">
            <div class="input-group mb-3">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category'); }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author'); }}">
                    @endif
                    <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ request('search'); }}">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
            <div class="card border-0 shadow mb-3">
                @if ($posts[0]->image)
                <div style="height: 300px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top" alt="...">
                </div>
                @else
                <img src="https://picsum.photos/1200/300" class="card-img-top" alt="...">
                @endif
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $posts[0]->title }}</h5>
                    <p>
                        <small class="text-muted text-dark">
                            By <a href="/blog?author={{ $posts[0]->author->username }}"
                                class="text-decoration-none fw-bold">{{ $posts[0]->author->name }}</a> In <a
                                class="text-decoration-none fw-bold"
                                href="/blog?category={{ $posts[0]->category->id }}">{{ $posts[0]->category->slug }}</a>
                            {{ $posts[0]->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="card-text">{{ $posts[0]->excerpt }}</p>
                    <a href="/post/{{ $posts[0]->slug }}" class="btn btn-outline-primary">Read More</a>
                </div>
            </div>
        </a>

    <div class="container">
        <div class="row justfy-content-center">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4">
                    <div class="card border-0 shadow mb-3">
                        @if ($post->image)
                        <div style="height: 700px; overflow:hidden;">
                            <img src="{{ asset('storage/' . $posts->image) }}" class="card-img-top" alt="...">
                        </div>
                        @else
                        <img src="https://picsum.photos/1200/700?random={{ $post->id }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p>
                                <small class="text-muted text-dark">
                                    By <a href="/blog?author={{ $post->author->username }}"
                                        class="text-decoration-none fw-bold">{{ $post->author->name }}</a> In <a
                                        class="text-decoration-none fw-bold"
                                        href="/blog?category={{ $post->category->slug }}">{{ $post->category->slug }}</a>
                                    {{ $post->created_at->diffForHumans() }}
                                </small>
                            </p>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/post/{{ $post->slug }}" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <p class="text-center fs-4">No post found</p>
        @endif
    </div>
</div>
{{ $posts->links(); }}
@endsection
