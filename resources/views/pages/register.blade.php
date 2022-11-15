@extends('layout')
{{-- @section('css')

@endsection --}}

@section('body')
<div class="container bg-white border border-2 border-dark rounded w-50 row">
    <div class="col" style="margin-left: -24px">
        <img src="https://i.ibb.co/JjSwF3X/pexels-picjumbocom-196650.jpg" class="w-100 h-100" alt="">
    </div>
    <div class="col mb-3 py-3">
        <form action="" class="text-center">
            <div class="row py-2">
                <label for="name" class=" text-pink fw-bold fs-4 text-start" style="margin-left: -10px">Full Name</label>
                <input type="text" class="form-control border border-2 border-dark rounded" id="name_in" aria-describedby="emailHelp" placeholder="Enter full name">
            </div>
            <div class="row py-2">
                <label for="email" class=" text-pink fw-bold fs-4 text-start" style="margin-left: -10px">Email</label>
                <input type="email" class="form-control border border-2 border-dark rounded" id="email_in" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="row py-2">
                <label for="password" class=" text-pink fw-bold fs-4 text-start" style="margin-left: -10px">Password</label>
                <input type="password" class="form-control border border-2 border-dark rounded" id="password_in" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-light border border-2 border-dark mt-3 text-pink fw-bold fs-6  ">Register</button>
        </form>
        <h2 class="fw-bold fs-4 text-center py-3">-----------------OR-----------------</h2>
        <div class="row text-center">
            <p class="col-xs-6 fw-bold fs-6">Already have an account?</p>
            <a class="col-xs-6 text-pink fw-bold fs-6" href="url">Sign in here</a>
        </div>
      </div>
</div>
@endsection
