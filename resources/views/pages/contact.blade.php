@extends('layout')
{{-- @section('css')

@endsection --}}
<style>

</style>



@section('body')
<div class="container bg-white mb-3 py-3 px-5 border border-2 border-dark rounded w-50">
    <div class="col">
        <form action="contact.php" class="text-left" method="POST">
            <div class="row justify-content-center">
                <h2 class="text-center">Contact Us</h2>
                <h3 class="text-center text-third">Email:quizzes.cs@gmail.com</h3>
            </div>
            <br>
            <div class="row ">
                <label for="name" class="text-left text-third fw-bold fs-4">Name</label>
                <input type="text" class="form-control border border-2 border-dark rounded" id="name_in" aria-describedby="nameHelp" placeholder="Enter name">
            </div>
            <br>
            <div class="row ">
                <label for="email" class="text-left text-third fw-bold fs-4">Email</label>
                <input type="email" class="form-control border border-2 border-dark rounded" id="email_in" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <br>
            <div class="row ">
                <label for="subject" class="text-left text-third fw-bold fs-4">Subject</label>
                <input type="text" class="form-control border border-2 border-dark rounded" id="subject_in" placeholder="Enter Subject">
            </div>
            <br>
            <div class="row ">
                <label for="message" class="text-left text-third fw-bold fs-4">Message</label>
                <input type="text" class="form-control border border-2 border-dark rounded" id="message_in" placeholder="Enter Message">
            </div>
            <br>
            <br>
            <div class = 'text-center'>
            <button type="submit" class='button button1'>Submit</button>
            </div>
        </form>
      </div>
</div>
@endsection
