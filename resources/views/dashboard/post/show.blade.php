@extends('dashboard.layout.main')

@section('container')
    <div class="container mb-5 ">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <h4>{{ $post->title }}</h4>
                <a href="/dashboard/post" class="btn btn-success"><span data-feather="chevron-left" class="align-text-bottom me-2"></span>Back to all blog</a>
                <a href="" class="btn btn-warning"><span data-feather="edit" class="align-text-bottom me-2"></span>Edit</a>
                {{-- <a href="" class="btn btn-danger"><span data-feather="x-circle" class="align-text-bottom me-2"></span>Delete</a> --}}
                <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Are You Sure ?');">Delete</button>
                </form>
                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="...">
                @else
                    <img src="https://picsum.photos/1200/600" class="card-img-top mt-3" alt="...">
                @endif
                {!! $post->body !!}

            </div>
        </div>
    </div>
@endsection
