@extends('layout')

@section('title', 'Class ' . $class->name)

@section('body')
    <div class="d-flex flex-column align-items-center bg-white py-3 border border-2 border-dark rounded w-75 h-100">
        <div class="text-center d-flex justify-content-center align-items-center">
            <a href="{{url()->previous()}}" class='float-start fs-2 text-turqouise ms-1'>
                <ion-icon name="arrow-undo"></ion-icon>
            </a>
            <h1 class="text-success fw-bold">Class {{ $class->name }}</h1>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center align-items-lg-start text-black py-3">
            <div class="border border-orange rounded mx-4 mb-4">
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

            <div class="border border-pink rounded mx-4">
                <div class="border-bottom border-4 border-pink rounded text-center p-2 mx-3 my-2">
                    <h4>Past Quizzes:</h4>
                </div>
                <div class="text-start px-3">
                    <h4 class="mx-3 my-2">Subjects:</h4>
                    <ul>
                        @foreach ($class->quizzes as $quiz)
                            <li class="py-1">
                                <div class='d-flex align-items-center'>
                                    @if(Auth::user()->role->name == "teacher")
                                        @if ($quiz->start_date > \Carbon\Carbon::now())
                                            <span class="mx-1">{{ $quiz->name }} -
                                                {{ \Carbon\Carbon::parse($quiz->start_date)->format('d F Y, H:i') }}
                                            </span>
                                            <a href="{{ route('quizzes.edit', ['quiz_id' => $quiz->id]) }}"
                                            class='btn btn-sm bg-orange hover-bg-pink text-white mx-1'>
                                                Edit Quiz
                                            </a>
                                            <form action="/quizzes/{{$quiz->id}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button
                                                class='btn btn-sm bg-orange hover-bg-pink text-white'>
                                                Delete Quiz
                                                </button>
                                            </form>
                                        @else
                                            <span class='me-2'>{{ $quiz->name }}</span>
                                            <a href="{{ route('classes.history', ['quiz_id' => $quiz->id, 'class_id' => $quiz->class_id]) }}"
                                            class='btn btn-sm bg-orange hover-bg-pink text-white'>
                                            History
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
        @if(Auth::user()->role->name == "teacher")
        <form action="{{route('quizzes.create')}}">
            <input type="hidden" name="class" value="{{$class->id}}">
            <button  class='btn bg-turqouise hover-bg-pink text-white'>Create New Quiz</button>
        </form>
        @endif
    </div>
@endsection
