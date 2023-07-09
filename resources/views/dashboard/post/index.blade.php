@extends('dashboard.layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Post</h1>
    </div>

    @if (session()->has('success'))
        <div class="col-lg-8">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/post/create" class="btn btn-primary mb-3">Create blog</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <a href="/dashboard/post/{{ $post->slug }}" class="badge bg-primary">
                                <span data-feather="eye" class="align-text-bottom"></span>
                            </a>
                            <a href="/dashboard/post/{{ $post->slug }}/edit" class="badge bg-warning">
                                <span data-feather="edit" class="align-text-bottom"></span>
                            </a>
                            <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure ?');"><span
                                        data-feather="x-circle" class="align-text-bottom"></span></button>
                            </form>
                            {{-- <a href="" class="badge bg-danger">
                                    <span data-feather="x-circle" class="align-text-bottom"></span>
                                </a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
