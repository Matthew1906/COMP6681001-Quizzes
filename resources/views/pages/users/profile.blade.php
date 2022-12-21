@extends('layout')

@section("title", 'Profile')

@section('body')
    <div class='px-2 text-center'>
            <div class="d-flex flex-column align-items-center bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <div class='mx-3 flex-grow-1'>
                    <div class="d-flex flex-column row align-items-center mt-1 pb-3 px-2 text-center">
                        <div class="row text-center align-items-center">
                            <div class="text-center d-flex justify-content-center align-items-center mb-3">
                                <a href="{{url()->previous()}}" class='float-start fs-2 text-turqouise ms-1'>
                                    <ion-icon name="arrow-undo"></ion-icon>
                                </a>
                                <h2 class="text-turqouise fw-bold">My Profile</h2>
                            </div>
                            <div class="d-flex flex-column align-items-center mb-3 py-3 px-5 border border-2 border-pink rounded">
                                @if (Auth::user()->role_id === 1)
                                    <h4 class="text-turqouise">Teacher: <span class='text-orange'>{{Auth::user()->full_name}}</span></h4>
                                @else
                                    <h4 class="text-turqouise">Student: <span class='text-orange'>{{Auth::user()->full_name}}</span></h4>
                                @endif
                                <h4 class="text-turqouise">Class:
                                    <span class='text-orange'>
                                    @foreach(Auth::user()->classes as $class)
                                        {{ $class->name }}
                                        @if( !$loop->last)
                                        ,
                                        @endif
                                    @endforeach
                                    </span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-turqouise fw-bold mb-3">
                        @if(Auth::user()->role->name=='student')
                            Participated Quizzes:
                        @else
                            Held Quizzes:
                        @endif
                        </h3>
                        <ul class="d-flex flex-column align-items-start mb-3 py-3 px-5 border border-2 border-orange rounded">
                            @foreach($histories as $history)
                                <li class="text-pink fs-5 mb-1">
                                    <div class='d-flex align-items-center'>
                                        @if(Auth::user()->role->name=='student')
                                        <span class='fw-bold me-2'>{{ $history->quiz->name }}</span>
                                        @if($history->quiz->deadline <= \Carbon\Carbon::now())
                                            <a href="{{route('users.history', ['user_id'=>Auth::id(), 'quiz_id'=>$history->quiz_id])}}" class='btn bg-turqouise hover-bg-pink d-flex align-items-center'>
                                                <ion-icon name="search-outline" class='text-white'></ion-icon>
                                            </a>
                                        @endif
                                        @else
                                        <span class='fw-bold me-2'>{{ $history->name }}</span>
                                        <a href="{{route('classes.history', ['class_id'=>$history->class_id, 'quiz_id'=>$history->id])}}" class='btn bg-turqouise hover-bg-pink d-flex align-items-center'>
                                            <ion-icon name="search-outline" class='text-white'></ion-icon>
                                        </a>
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
