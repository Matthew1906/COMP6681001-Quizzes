@extends('layout')

@section('title', 'Make Quiz')

@section('body')
    <div class='container-fluid px-2 text-center'>
        <form action={{ route('store-quiz') }} method="POST">
            @method('POST')
            @csrf
            <div class="d-flex align-items-start bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <div class='container-fluid mx-3 flex-grow-1'>
                    <h1 class='row text-orange pb-1'>Create New Quiz</h1>
                    <div class="row g-3 align-items-center mt-1 pb-3 px-2">
                        <div class="col-3 text-start">
                            <label for='name' name='name' class="col-form-label text-pink fw-bold fs-4">Quiz Title:
                            </label>
                        </div>
                        <div class="col-9">
                            <input type="text" id="name" name='name'
                                class="form-control border border-1 border-dark rounded-2" aria-describedby="title">
                        </div>
                    </div>
                    <div class="row g-3 align-items-start mt-1 pb-3 px-2">
                        <div class="col-3 text-start">
                            <label for='description' class="col-form-label text-pink fw-bold fs-4">Quiz Description:
                            </label>
                        </div>
                        <div class="col-9">
                            <textarea id="description" name='description' class="form-control border border-1 border-dark rounded-2"
                                aria-describedby="description" rows=5></textarea>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-1 pb-3 px-2">
                        <div class="col-3 text-start">
                            <label for='start_date' name='start_date' class="col-form-label text-pink fw-bold fs-4">Quiz
                                Start Date: </label>
                        </div>
                        <div class="col-9">
                            <input type="datetime-local" id="start_date" name='start_date'
                                class="form-control border border-1 border-dark rounded-2" aria-describedby="start_date">
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mt-1 pb-3 px-2">
                        <div class="col-3 text-start">
                            <label for='deadline' name='deadline' class="col-form-label text-pink fw-bold fs-4">Quiz
                                Deadline: </label>
                        </div>
                        <div class="col-9">
                            <input type="datetime-local" id="deadline" name='deadline'
                                class="form-control border border-1 border-dark rounded-2" aria-describedby="deadline">
                        </div>
                    </div>
                    <div class="row g-3 align-items-center justify-content-end mt-1 pb-3">
                        <div class="col-3 d-flex justify-content-end align-items-center">
                            <input type="checkbox" id="repeat" name='repeat' class="form-check-input" value='true'
                                aria-describedby="repeat">
                            <label for='repeat' class="form-check-label text-pink fw-bold fs-4 ms-2">Redoable? </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 mt-1 px-1 justify-content-end">
                <button class='col-2 btn bg-turqouise text-white hover-bg-pink justify-content-center align-items-center fs-5'>
                    Continue
                </button>
            </div>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
@endsection
