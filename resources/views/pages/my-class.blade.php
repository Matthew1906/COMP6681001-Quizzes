@extends('layout')

@section('body')
    <div class='px-2 text-center w-75'>
            <div class="d-flex flex-column bg-white py-3 border border-2 border-dark rounded">
                <div>
                    <div class="row text-center align-items-center">
                        <h1 class="text-success fw-bold">Class {{ $class->name }}</h1>
                    </div>

                    <div class="container">
                        <div class="text-white d-flex">
                            <div class="col bg-warning ">
                                <div class="border-bottom border-5">
                                    @foreach ($class->teachers as $teacher)
                                        <h4>Teacher: {{ $teacher->full_name }}</h4>
                                    @endforeach
                                </div>
                                <div class="text-start">
                                    <h4 class="m-1">Students:</h4>
                                    <ul>
                                        @foreach ($class->students as $student)
                                            <li>{{ $student->full_name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>


                            <div class="col bg-danger ">
                                <div class="border-bottom border-5">
                                    <h4>Past Quizzes:</h4>
                                </div>
                                <div class="text-start">
                                    <h4 class="m-1">Subjects:</h4>
                                    <ul>
                                        @foreach ($class->quizzes as $quiz)
                                            <li>{{ $quiz->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- @foreach ($matkuls as $matkul)
                    <div class="cards">
                        <div class="title"> {{$matkul->namaKelas}} </div>
                        <div class="description"> {{$matkul->deskripsi}} </div>

                    </div>

                    @endforeach --}}
                </div>
            </div>
    </div>
@endsection
