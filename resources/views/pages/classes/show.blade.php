@extends('layout')

@section('title', 'Class ' . $class->name)

@section('body')

    <div
        class="container d-flex flex-column align-items-center bg-white py-3 border border-2 border-dark rounded w-75 h-100">
        <div class="text-center">
            <h1 class="text-success fw-bold">Class {{ $class->name }}</h1>
        </div>
        <div class="container d-flex col align-self-end text-black py-3">
            <div class="col border border-orange rounded mx-4">
                <div class="border-bottom border-4 border-orange rounded text-center mx-3 my-2 p-2">
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

            <div class="col border border-pink rounded mx-4">
                <div class="border-bottom border-4 border-pink rounded text-center p-2 mx-3 my-2">
                    <h4>Past Quizzes:</h4>
                </div>
                <div class="text-start">
                    <h4 class="mx-3 my-2">Subjects:</h4>
                    <ul>
                        @foreach ($class->quizzes as $quiz)
                            <li class="py-1">
                                <div class='d-flex align-items-center'>

                                    @if(Auth::user()->role->name == "teacher")
                                        @if ($quiz->start_date > \Carbon\Carbon::now())
                                        <span class="mx-1">{{ $quiz->name }} -
                                                {{ \Carbon\Carbon::parse($quiz->start_date)->format('d F Y') }}</span>
                                            <a href="{{ route('quizzes.edit', ['quiz_id' => $quiz->id]) }}"
                                            class='btn btn-sm bg-orange hover-bg-pink text-white mx-1'>
                                            Edit Quiz
                                            </a>
                                            <form action="/quizzes/{{$quiz->id}}" method="POST">
                                                @method("DELETE")
                                                <button
                                                class='btn btn-sm bg-orange hover-bg-pink text-white'>
                                                Delete Quiz
                                                </button>
                                            </form>
                                        @elseif ($quiz->start_date < \Carbon\Carbon::now() && $quiz->deadline > \Carbon\Carbon::now())
                                            <span class='me-2'>{{ $quiz->name }}</span>
                                            <a href="{{ route('class-history.show', ['quiz_id' => $quiz->id, 'class_id' => $quiz->class_id]) }}"
                                            class='btn btn-sm bg-orange hover-bg-pink text-white'>
                                            Quiz History
                                            </a>
                                        @else
                                        <span>{{ $quiz->name }}</span>
                                        <a href="#" class='d-flex align-items-center'>
                                            <ion-icon name="search-outline" class='text-pink'></ion-icon>
                                        </a>
                                        @endif
                                        
                                    @elseif(Auth::user()->role->name == "student") 
                                        @if ($quiz->start_date > \Carbon\Carbon::now())
                                            <span>{{ $quiz->name }} -
                                                {{ \Carbon\Carbon::parse($quiz->start_date)->format('d F Y') }}</span>
                                        @elseif ($quiz->start_date < \Carbon\Carbon::now() && $quiz->deadline > \Carbon\Carbon::now())
                                            <span class='me-2'>{{ $quiz->name }}</span>
                                            <a href="{{ route('quiz-simulations.start', ['quiz_id' => $quiz->id]) }}"
                                            class='btn btn-sm bg-orange hover-bg-pink text-white'>
                                            Attempt
                                            </a>
                                        @else
                                        <span>{{ $quiz->name }}</span>
                                        <a href="#" class='d-flex align-items-center'>
                                            <ion-icon name="search-outline" class='text-pink'></ion-icon>
                                        </a>
                                        @endif
                                    @endif


                                    
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
