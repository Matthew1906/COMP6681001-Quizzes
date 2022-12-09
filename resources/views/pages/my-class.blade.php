@extends('layout')

@section('body')

    <div class="container d-flex flex-column align-items-center bg-white py-3 border border-2 border-dark rounded w-75 h-100">
        <div class="text-center">
            <h1 class="text-success fw-bold">Class {{ $class->name }}</h1>
        </div>

            <div class="container d-flex col align-self-end text-white py-3">
                <div class="col bg-warning mx-4">
                    <div class="border-bottom border-5 text-center mx-3 my-2">
                        @foreach ($class->teachers as $teacher)
                            <h4>Teacher: {{ $teacher->full_name }}</h4>
                        @endforeach
                    </div>
                    <div class="mx-3 my-2">
                        <h4 class="">Students:</h4>
                        <ul>
                            @foreach ($class->students as $student)
                                <li class="py-1">{{ $student->full_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col bg-danger mx-4">
                    <div class="border-bottom border-5 text-center mx-3 my-2">
                        <h4>Past Quizzes:</h4>
                    </div>
                    <div class="text-start">
                        <h4 class="mx-3 my-2">Subjects:</h4>
                        <ul>
                            @foreach ($class->quizzes as $quiz)
                            <li class="py-1" >{{ $quiz->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
    </div>
@endsection
