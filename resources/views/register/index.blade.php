@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-register m-auto mt-5">
                <h1 class="h3 mb-3 fw-normal text-center">Regitered Form</h1>
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name" value="{{ old('name'); }}" id="name" placeholder="name">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('username')
                            is-invalid
                        @enderror" name="username" id="username" value="{{ old('username') }}"  placeholder="username">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email')
                            is-invalid
                        @enderror " name="email" id="email" value="{{old('email')}}" placeholder="Email">
                        <label for="email">Email</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password')
                            is-invalid
                        @enderror" id="password" name="password" placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-outline-primary mt-3" type="submit">Register</button>
                    <small class="d-block text-center mt-3 ">Alredy Registered? <a href="/login">Login now</a></small>
                </form>
            </main>
        </div>
    </div>
@endsection
