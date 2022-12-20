@extends('layout')

@section('title', 'Contact Us')

@section('body')
    <div class="container bg-white mb-3 py-3 px-5 border border-2 border-dark rounded w-50">
        <div class="col">
            <form action="{{ route('contact-us.store') }}" class="text-left" method="POST">
                @csrf
                <div class="row justify-content-center mb-3">
                    <div class="text-center d-flex justify-content-center align-items-center">
                        <a href="{{ url()->previous() }}" class='float-start fs-2 text-black ms-1'>
                            <ion-icon name="arrow-undo"></ion-icon>
                        </a>
                        <h2 class="text-primary text-black">Contact Us</h2>
                    </div>
                    <h3 class="text-center text-primary text-pink fs-3">Email:quizzes.cs@gmail.com</h3>
                </div>
                @include('components.flash-messages')
                <div class="row mb-3">
                    <label for="name" class="text-left text-third fw-bold fs-4 mb-2">Name</label>
                    <input type="text" class="form-control border border-2 border-dark rounded" placeholder="Enter name"
                        name='name' @auth value="{{ Auth::user()->full_name }}" @endauth>
                    @error('name')
                        <p class="text-pink fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="email" class="text-left text-third fw-bold fs-4 mb-2">Email</label>
                    <input type="email" class="form-control border border-2 border-dark rounded" placeholder="Enter email"
                        name='email' @auth value="{{ Auth::user()->email }}" @endauth>
                    @error('email')
                        <p class="text-pink fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="subject" class="text-left text-third fw-bold fs-4 mb-2">Subject</label>
                    <input type="text" class="form-control border border-2 border-dark rounded"
                        placeholder="Enter Subject" name='subject'>
                    @error('subject')
                        <p class="text-pink fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="message" class="text-left text-third fw-bold fs-4 mb-2">Message</label>
                    <textarea name="message" cols="30" rows="10" class="form-control border border-2 border-dark rounded"
                        placeholder="Enter your Message"></textarea>
                    @error('message')
                        <p class="text-pink fs-6 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class='text-center'>
                    <button type="submit" class='btn bg-pink text-white'>Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
