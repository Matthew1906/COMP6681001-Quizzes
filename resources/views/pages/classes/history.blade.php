@extends('layout')

@section('title', 'Class ' . $class->name . ' Quiz History')

@section('body')
    <div class='px-2 text-center w-auto'>
        <div class="d-flex flex-column bg-white mb-3 py-3 px-3 px-md-5 border border-2 border-dark rounded">
            <div class="row text-center justify-content-center align-items-center mb-3">
                <div class='d-flex justify-content-center align-items-center'>
                    <a href="{{url()->previous()}}" class='float-start fs-2 text-black ms-1'>
                        <ion-icon name="arrow-undo"></ion-icon>
                    </a>
                    <h1 class="text-black fw-bold">Class {{ $class->name }}</h1>
                </div>
                <h4 class="text-pink">Deadline: {{ $quiz->deadline }}</h4>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-center">
                <div class="h-100 border mx-2 mb-3 mb-md-0 border-orange rounded-2">
                    <canvas id="chart" class='w-100 h-100'></canvas>
                </div>
                <div class="h-100 border mx-2 border-pink rounded-2">
                    <div class="d-flex justify-content-center mt-2 border-bottom rounded border-pink">
                        <h4 class="col">Name</h4>
                        <h4 class="col">Score</h4>
                    </div>
                    <div class="container px-4">
                        @foreach ($class->students as $student)
                            @php
                                $history = $student->history->filter(function ($value, $key) use ($quiz) {
                                    return $value['quiz_id'] == $quiz->id && $value['status'] == 1;
                                });
                            @endphp
                            <div class="row d-flex rounded border-dark bg-pink text-white py-2 my-2">
                                <div
                                    class="col-7 pe-2 d-flex justify-content-center align-items-center border-end border-white fw-semibold">
                                    {{ $student->full_name }}</div>
                                @if ($history->first())
                                    <a href="{{ route('users.history', ['user_id' => $history->first()->participant->id, 'quiz_id' => $history->first()->quiz_id]) }}"
                                        class='col-5 d-flex justify-content-center align-items-center text-decoration-none'>
                                        <span class='text-white pe-1 fs-4'>{{ $history->first()->score() }}</span>
                                        <ion-icon name="search-outline" class='text-white'></ion-icon>
                                    </a>
                                @else
                                    <div class="col-5 d-flex justify-content-center align-items-center">Yet to submit</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        $histories = $quiz->histories->filter(function($history, $key){
            return $history['status']==1;
        });
        $results = $histories->map(function($history){
            return ['name'=>$history->participant->full_name, 'score'=>$history->score()];
        });
    @endphp
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('chart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {{Js::from($results->pluck('name'))}},
                datasets: [{
                    label: 'score',
                    data: {{Js::from($results->pluck('score'))}},
                    backgroundColor:'orange'
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        display: false,
                        barPercentage: 1.3,
                        ticks: {
                            max: 3,
                        }
                    }, {
                        display: true,
                        ticks: {
                            autoSkip: false,
                            max: 4,
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
