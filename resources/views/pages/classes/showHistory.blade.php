@extends('layout')

@section('body')
    <div class='px-2 text-center w-75'>
            <div class="d-flex flex-column bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <div>
                    <div class="row text-center align-items-center">
                        <h1 class="text-success fw-bold">Class {{$class->name}}</h1>
                        <h4 class="text-sucess">Deadline: {{$quiz->deadline}}</h4>
                    </div>

                    <div class="container">
                        @foreach ($class->students as $classes)
    
                            @php
                                $history = $classes->history->filter(function ($value, $key) use($quiz) {
                                    return $value['quiz_id'] == $quiz->id && $value['status']==1;
                                });
                            @endphp

                            <div>{{$classes->full_name}}</div>
                            @if($history->first())
                                <div>{{$history->first()->score()}}</div>
                            @else
                                Nelum ada jawaban
                            @endif
                        @endforeach
                        
                        
                        
                    </div>
                </div>
            </div>
    </div>
@endsection
