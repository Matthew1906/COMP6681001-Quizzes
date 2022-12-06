@extends('layout')
{{-- @section('css')

@endsection --}}

@section('body')
<div class="container bg-white mb-3 py-3 px-5 border border-2 border-dark rounded w-50">
    <div class="col">
        <form method="POST" action="/login" class="text-center">
            @csrf
            <div class="row justify-content-center">
                <h2 class="text-center">Login to Quizzes</h2>
                <img src="https://i.ibb.co/JqGF3dY/pngwing-com.png" class="w-25 h-25" width="200px" height="200px" alt="">
            </div>
            <div class="row">
                <label for="email" class="text-center text-pink fw-bold fs-4">Email</label>
                <input type="email" class="form-control border border-2 border-dark rounded" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="row justify-content-center">
                <label for="password" class="text-center text-pink fw-bold fs-4">Password</label>
                <input type="password" class="form-control border border-2 border-dark rounded" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-light border border-2 border-dark mt-3">Login</button>
        </form>
        <div class="row mt-3 text-center">
            <p class="col-xs-6 fw-bold fs-6">Don't have an account?</p>
            <a class="col-xs-6 text-pink fw-bold fs-6" href="{{ route('register') }}">Sign up here</a>
        </div>
      </div>
</div>
@endsection
