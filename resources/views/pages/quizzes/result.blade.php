@extends('layout')

@section('title', 'Quiz Result')

@section('body')
    <div class='px-2 d-flex flex-column justify-content-center align-items-center text-primary text-pink'>
        <h2 class='text-center'>Congratulations!! You have completed this quiz!!</h2>
        <h4 class="mb-3 text-secondary text-black">Your Score = {{$history->score()}}/10</h4>
        <a href="{{route("home")}}" class="bg-orange text-white hover-bg-pink p-2 rounded text-decoration-none">Go Back</a>
    </div>
@endsection
