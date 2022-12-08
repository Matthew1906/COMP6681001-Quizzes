@extends('layout')

@section('title', 'Simulation')

@section('body')
    <div class='px-2 text-center'>
        <h3 class='fs-2 fw-lighter mb-3'><span class='fw-bold'>Due Date: </span>{{ \Carbon\Carbon::parse($problems[0]->quiz->deadline)->format('l, d F Y - H:i')}}</h3>
        @include('components.flash-messages')
        <h2 class='p-3 bg-white border border-dark border-2 rounded'>{{ $problems[0]->problem->question }}</h2>
        @if ($problems[0]->image)
            <img src="{{ asset('storage/quizzes/' . $problems[0]->image) }}"
                class='mw-100 h-auto mt-2 mb-4 border border-4 border-dark rounded'>
        @endif
        @php
        $dict = ['1'=>'A', '2'=>'B', '3'=>'C', '4'=>'D'];
        $details = $problems[0]->quiz->histories->filter(function($history){
            return $history['user_id'] == Auth::id();
        });
        if($details->count()>0){
            $answers = $details->first()->details->filter(function($detail){
                return $detail['index'] == Request::query('page', 1);
            });
            $curr = $answers->first();
        }
        else{
            $curr = null;
        }
        @endphp
        <div class='d-flex justify-content-center align-items-center'>
            @if ($problems->currentPage() > 1)
                <a href="{{ $problems->previousPageUrl() }}" class='text-black'>
                    <ion-icon name="arrow-back-circle-outline" class='fs-1'></ion-icon>
                </a>
            @endif
            @if ($problems[0]->problem_type == 'App\Models\MCProblem')
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <form
                                action="{{ route('answer-quiz', ['quiz_id' => $problems[0]->quiz_id, 'index' => $problems[0]->index]) }}"
                                method="post">
                                @csrf
                                @includeIf('components.mcq-answer-card', [
                                    'number' => 'A',
                                    'answer' => $problems[0]->problem->choice1,
                                    'color' => 'danger',
                                    'index' => 1,
                                ])
                            </form>
                        </div>
                        <div class="col">
                            <form
                                action="{{ route('answer-quiz', ['quiz_id' => $problems[0]->quiz_id, 'index' => $problems[0]->index]) }}"
                                method="post">
                                @csrf
                                @includeIf('components.mcq-answer-card', [
                                    'number' => 'C',
                                    'answer' => $problems[0]->problem->choice3,
                                    'color' => 'warning',
                                    'index' => 3,
                                ])
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form
                                action="{{ route('answer-quiz', ['quiz_id' => $problems[0]->quiz_id, 'index' => $problems[0]->index]) }}"
                                method="post">
                                @csrf
                                @includeIf('components.mcq-answer-card', [
                                    'number' => 'B',
                                    'answer' => $problems[0]->problem->choice2,
                                    'color' => 'success',
                                    'index' => 2,
                                ])
                            </form>
                        </div>
                        <div class="col">
                            <form
                                action="{{ route('answer-quiz', ['quiz_id' => $problems[0]->quiz_id, 'index' => $problems[0]->index]) }}"
                                method="post">
                                @csrf
                                @includeIf('components.mcq-answer-card', [
                                    'number' => 'D',
                                    'answer' => $problems[0]->problem->choice4,
                                    'color' => 'info',
                                    'index' => 4
                                ])
                            </form>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <h4>Your Answer: {{$curr?$dict[$curr['answer']]:'No Answer'}}</h4>
                    </div>
                </div>
            @else
                @includeIf('components.ftb-answer-card', [
                    'path' => route('answer-quiz', [
                        'quiz_id' => $problems[0]->quiz_id,
                        'index' => $problems[0]->index,
                    ]),
                    'old'=> $curr?$curr['answer']:"",
                ])
            @endif
            @if ($problems->currentPage() < $problems->lastPage())
                <a href="{{ $problems->nextPageUrl() }}" class='text-black'>
                    <ion-icon name="arrow-forward-circle-outline" class='fs-1'></ion-icon>
                </a>
            @endif
        </div>
        <ul class="mt-2 pagination d-flex justify-content-center">
            <li class="page-item"><a class="page-link text-turqouise fs-4" href="{{ $problems->url(1) }}">1</a></li>
            @if ($problems->lastPage() >= 2)
                <li class="page-item"><a class="page-link text-turqouise fs-4" href="{{ $problems->url(2) }}">2</a></li>
            @endif
            @if ($problems->lastPage() > 4)
                <li class="page-item">
                    <span class="page-link text-turqouise fs-4">
                        <ion-icon name="ellipsis-horizontal" class="align-middle"></ion-icon>
                    </span>
                </li>
            @endif
            @if ($problems->lastPage() > 3)
                <li class="page-item"><a class="page-link text-turqouise fs-4"
                        href="{{ $problems->url($problems->lastPage() - 1) }}">{{ $problems->lastPage() - 1 }}</a></li>
            @endif
            @if ($problems->lastPage() >= 4)
                <li class="page-item"><a class="page-link text-turqouise fs-4"
                        href="{{ $problems->url($problems->lastPage()) }}">{{ $problems->lastPage() }}</a></li>
            @endif
        </ul>
        @if($problems->currentPage() == $problems->lastPage())
        {{-- {{ route('answer-quiz', ['quiz_id' => $problems[0]->quiz_id, 'index' => $problems[0]->index]) }} --}}
        <form action="{{route('finish-quiz', ['quiz_id'=>$problems[0]->quiz_id])}}" method='POST'>
            @csrf
            @method('PATCH')
            <button class='btn bg-turqouise text-white hover-bg-pink justify-content-center align-items-center fs-5'>
                Finish Quiz
            </button>
        </form>
        @endif
    </div>
@endsection
