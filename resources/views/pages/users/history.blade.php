@extends('layout')

@section('title', ' Quiz History')

@section('body')
    <div class='px-2 text-center'>
            <div class="d-flex flex-column align-items-center bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <div class='mx-3 flex-grow-1'>
                    <div class="row g-3 justify-content-center align-items-center mt-1 pb-3 px-2">
                        <div class="col-auto">
                            <h2 class="text-pink fw-bold">Class {{$history->quiz->class->name}} - {{$history->quiz->name}}</h2>
                            <h4 class="text-pink fw-bold">{{\Carbon\Carbon::parse($history->quiz->deadline)->format('l, d F Y')}}</h4>
                            <h3 class="text-orange fw-bold">{{$history->participant->full_name}} - {{$history->score()}}/10</h4>
                        </div>
                    </div>
                    <div>
                        @foreach($history->details as $index=>$detail)
                            @if($history->quiz->problems[$index]->problem_type == 'App\Models\MCProblem')
                                <div class="bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                                    <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded">
                                        <div class="col-auto">
                                            <span class="col-form-label text-pink fw-bold fs-4">Q: </span>
                                        </div>
                                        <div class="col-auto flex-grow-1">
                                            <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0">
                                                {{ $history->quiz->problems[$index]->problem->question }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded'>
                                        <label for="answer" class="col-form-label text-start text-pink fw-bold fs-4">A: </label>
                                        <div class="row g-3 align-items-center mt-1 pb-3 px-1">
                                            <div class="col-auto">
                                                <span class="col-form-label text-pink fw-bold">A. </span>
                                            </div>
                                            <div class="col-auto flex-grow-1">
                                                <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0 @if($history->quiz->problems[$index]->problem->answer == '1') fw-bold text-turqouise @elseif($detail->answer=='1') fw-bold text-orange @endif">
                                                    {{$history->quiz->problems[$index]->problem->choice1}}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center mt-1 pb-3 px-1">
                                            <div class="col-auto">
                                                <span class="col-form-label text-pink fw-bold">B. </span>
                                            </div>
                                            <div class="col-auto flex-grow-1">
                                                <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0 @if($history->quiz->problems[$index]->problem->answer == '2') fw-bold text-turqouise @elseif($detail->answer=='2') fw-bold text-orange @endif">
                                                    {{$history->quiz->problems[$index]->problem->choice2}}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center mt-1 pb-3 px-1">
                                            <div class="col-auto">
                                                <span class="col-form-label text-pink fw-bold">C. </span>
                                            </div>
                                            <div class="col-auto flex-grow-1">
                                                <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0 @if($history->quiz->problems[$index]->problem->answer == '3') fw-bold text-turqouise @elseif($detail->answer=='3') fw-bold text-orange @endif">
                                                    {{$history->quiz->problems[$index]->problem->choice3}}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row g-3 align-items-center mt-1 pb-3 px-1">
                                            <div class="col-auto">
                                                <span class="col-form-label text-pink fw-bold">D. </span>
                                            </div>
                                            <div class="col-auto flex-grow-1">
                                                <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0 @if($history->quiz->problems[$index]->problem->answer == '4') fw-bold text-turqouise @elseif($detail->answer=='4') fw-bold text-orange @endif">
                                                    {{$history->quiz->problems[$index]->problem->choice4}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                                    <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded">
                                        <div class="col-auto">
                                            <span class="col-form-label text-pink fw-bold fs-4">Q: </span>
                                        </div>
                                        <div class="col-auto flex-grow-1">
                                            <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0">
                                                {{ $history->quiz->problems[$index]->problem->question }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class='row g-3 pb-1 px-2 my-2 border border-2 border-dark @if(Str::lower($history->quiz->problems[$index]->problem->answer) == Str::lower($detail->answer)) fw-bold text-turqouise @endif  rounded'>
                                        <div class="col-auto">
                                            <span class="col-form-label text-start text-pink fw-bold fs-4">A: </span>
                                        </div>
                                        <p class="p-2 col-auto flex-grow-1 bg-transparent border-0 border-bottom border-2 border-dark text-start @if(Str::lower($history->quiz->problems[$index]->problem->answer) != Str::lower($detail->answer)) fw-bold text-orange @endif">
                                            {{ $detail->answer }}
                                        </p>
                                    </div>
                                    @if(Str::lower($history->quiz->problems[$index]->problem->answer) != Str::lower($detail->answer))
                                        <div class='row g-3 pb-1 px-2 my-2 border border-2 border-dark text-turqouise fw-bold rounded'>
                                            <div class="col-auto">
                                                <span class="col-form-label text-start text-pink fw-bold fs-4">A: </span>
                                            </div>
                                            <p class="p-2 col-auto flex-grow-1 bg-transparent border-0 border-bottom border-2 border-dark text-start">
                                                {{ $history->quiz->problems[$index]->problem->answer }}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                           @endif
                        @endforeach
                    </div>
                </div>
            </div>

    </div>
@endsection
