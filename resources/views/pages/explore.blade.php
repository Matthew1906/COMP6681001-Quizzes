@extends('layout')

@section('title', 'Explore Quizzes')

@section('body')
    <div class="container-fluid py-1 px-5">
        <h1 class='text-primary text-black text-center font-weight-bold mb-4'>Explore available quizzes</h1>
        <form class="input-group" action={{ route('index-quiz') }}>
            <input type="text" class="form-control rounded" placeholder="Search Quiz" name='search' />
            <button type="submit" class="btn bg-turqouise text-primary text-white hover-bg-pink align-items-center">Search
                Quiz
            </button>
        </form>
        <div class="d-flex flex-wrap justify-content-center align-items-start">
            @foreach ($quizzes as $quiz)
                <div class="card my-4 me-4" style="width: 20rem;">
                    <div class="card-header">Deadline: {{ \Carbon\Carbon::parse($quiz->deadline)->format('l, d F Y') }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $quiz->name }}</h5>
                        <h6 class="card-text">Class: {{ $quiz->class->name }}</h6>
                        <h6 class="card-text">Average Score: 12000/10</h6>
                        <p class="card-text"> {{ $quiz->histories_count }}/{{ $quiz->class->students->count() }} students
                            have done this quiz</p>
                        <a href="#" class="btn btn-primary">
                            Attempt
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($quizzes->lastPage() > 1)
            <ul class="mt-2 pagination d-flex justify-content-center border border-2 border-turqouise">
                <li class="page-item"><a class="page-link text-turqouise fs-4"
                        href="{{ $quizzes->appends(request()->input())->url(1) }}">1</a></li>
                @if ($quizzes->lastPage() >= 2)
                    <li class="page-item"><a class="page-link text-turqouise fs-4"
                            href="{{ $quizzes->appends(request()->input())->url(2) }}">2</a></li>
                @endif
                @if ($quizzes->lastPage() > 4)
                    <li class="page-item">
                        <span class="page-link text-turqouise fs-4">
                            <ion-icon name="ellipsis-horizontal" class="align-middle"></ion-icon>
                        </span>
                    </li>
                @endif
                @if ($quizzes->lastPage() > 3)
                    <li class="page-item"><a class="page-link text-turqouise fs-4"
                            href="{{ $quizzes->appends(request()->input())->url($quizzes->lastPage() - 1) }}">{{ $quizzes->lastPage() - 1 }}</a>
                    </li>
                @endif
                @if ($quizzes->lastPage() >= 4)
                    <li class="page-item"><a class="page-link text-turqouise fs-4"
                            href="{{ $quizzes->appends(request()->input())->url($quizzes->lastPage()) }}">{{ $quizzes->lastPage() }}</a>
                    </li>
                @endif
            </ul>
        @endif
    @endsection
