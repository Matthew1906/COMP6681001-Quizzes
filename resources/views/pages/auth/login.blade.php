@extends('layout')

@section('title', 'Login')

@section('body')
<div class="container bg-white mb-3 py-3 px-5 border border-2 border-dark rounded w-50">
    <div class="col">
        <form method="POST" action="{{route('users.authenticate')}}" class="text-center">
            @csrf
            <div class="row justify-content-center mb-1">
                <h2 class="text-center">Login to Quizzes</h2>
                <img src="https://i.ibb.co/JqGF3dY/pngwing-com.png" class="w-25 h-25" width="200px" height="200px" alt="">
            </div>
            @include("components.flash-messages")
            <div class="row mb-2">
                <label for="email" class="text-center text-pink fw-bold fs-4 mb-1">Email</label>
                <input type="email" class="form-control border border-2 border-dark rounded" name="email" aria-describedby="emailHelp" placeholder="Enter email" value={{old('email')}}>
                @error('email')
                <p class="text-pink fs-6 mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="row">
                <label for="password" class="text-center text-pink fw-bold fs-4 mb-1">Password</label>
                <input type="password" class="form-control border border-2 border-dark rounded" name="password" placeholder="Password">
                @error('password')
                <p class="text-pink fs-6 mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <button type="submit" class="btn bg-turqouise hover-bg-pink text-white fw-semibold mt-3">Login</button>
        </form>
        <div class="row mt-3 text-center">
            <p class="fw-bold fs-6">
                <span>Credentials not working?</span>
                <a class="text-decoration-none col text-pink fw-bold fs-6" href="{{ route('contact-us.create') }}">Contact Us</a>
            </p>
        </div>
      </div>
</div>
@endsection
