@extends('layout')

@section('title', 'Class ' . $class->name . ' Quiz History')

@section('body')
    <div class='px-2 text-center w-75'>
            <div class="d-flex flex-column bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <div>
                    <div class="row text-center align-items-center">
                        <h1 class="text-success fw-bold">Class {{$class->name}}</h1>
                        <h4 class="text-sucess">Deadline: {{$quiz->deadline}}</h4>
                    </div>

                    <div class="container row">
                        <div class="col border mx-2 border-orange">
                            Graph
                        </div>

                        <div class="col border mx-2 border-pink">
                            <div class="container">
                                <div class="row container mt-2 border-bottom rounded border-pink">
                                    <h4 class="col">Name</h4>
                                    <h4 class="col">Score</h4>
                                </div>
                                <div class="container">
                                    @foreach ($class->students as $classes)
                                        @php
                                        $history = $classes->history->filter(function ($value, $key) use($quiz) {
                                            return $value['quiz_id'] == $quiz->id && $value['status']==1;
                                        });
                                        @endphp

                                        <div class="container d-flex rounded border border-dark bg-pink text-white py-2 my-2">
                                            <div class="col border-end border-dark">{{$classes->full_name}}</div>
                                            @if($history->first())
                                                <div>{{$history->first()->score()}}</div>
                                            @else
                                                <div class="col">Yet to submit</div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>




                            </div>


                        </div>




                    </div>
                </div>
            </div>
    </div>
@endsection
