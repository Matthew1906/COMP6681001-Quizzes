@extends('layout')

@section('title', 'Dashboard')

@section('body')
    <div class="container">
        <div class="row bg-white rounded-3 p-4">
            <div
                class="col-12 col-lg-5 d-flex flex-column justify-content-center align-items-center border shadow-sm rounded-4 p-5">
                <img src="https://i.ibb.co/JqGF3dY/pngwing-com.png" width="200px" height="200px" class='mb-3'>
                @auth
                    <h3 class="my-1 text-primary text-black text-center font-weight-bold">Hello, {{ Auth::user()->full_name }}
                    </h3>
                @endauth
                <div class="d-flex justify-content-center align-items-center">
                    <a href="{{ route('users.profile', ['user_id'=>Auth::id()]) }}"
                        class='my-3 me-2 btn btn-lg bg-turqouise text-secondary fw-bold fs-5 text-white hover-bg-pink justify-content-center align-items-center'>
                        See Profile Details
                    </a>
                    <form action="{{ route('users.logout') }}" method="POST" class='m-0'>
                        @csrf
                        <button type="submit"
                            class='btn btn-lg bg-turqouise text-secondary fw-bold fs-5 text-white hover-bg-pink justify-content-center align-items-center'>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <div class="row px-3">
                    <div class="col p-5 rounded-2"
                        style='background-image: url(https://media.istockphoto.com/vectors/abstract-financial-background-vector-id1284772036?k=20&m=1284772036&s=612x612&w=0&h=346n0lOHpObW4Kro9aE2n0AcR588m16vFiKQ8yrhENo=);'>
                        @if(Auth::user()->role->name=='student')
                        <h3 class='text-primary text-white text-left font-weight-bold fs-3'>
                            Your Total Average Score:
                        </h3>
                        <h3 class='mb-4 text-secondary text-white text-left font-weight-bold fs-3'>
                            {{ $average_score }}/10
                        </h3>

                        @elseif(Auth::user()->role->name=='teacher')
                            <h3 class='text-primary text-white text-left font-weight-bold fs-3'>
                                Class Average Score:
                            </h3>
                            {{-- bagian yang salah saat display quiz --}}
                            @foreach ($quizzes as $quiz)
                                @php
                                    $scores = $quiz->histories->map(function($value, $key){
                                        if($value['status'] == 1){
                                            return $value->score();
                                        }
                                    })->whereNotNull();
                                @endphp
                            <div class='text-primary text-white text-left font-weight-bold fs-3'>
                                Class {{ $quiz->class->name }}: {{$scores->count()>0?$scores->avg():"?"}}/10
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="row pt-2 px-3">
                    <div class="col p-5 rounded-2"
                        style='background-image: url(https://t4.ftcdn.net/jpg/04/39/13/37/360_F_439133763_FrLdhZsd5aGC23r9ATARuKJBr8ifZjIe.jpg);'>
                        @if(Auth::user()->role->name=='student')
                        <h3 class='text-primary fs-3 text-white text-left font-weight-bold'> Upcoming Quiz for:</h3>
                        <h3 class='text-secondary fs-3 text-white text-left font-weight-bold'>
                            {{ $closest_start->name }}
                        </h3>
                        <h3 class='text-secondary fs-3 text-white text-left font-weight-bold mb-4'>on
                            {{ \Carbon\Carbon::parse($closest_start->start_date)->format('l, d F Y') }}</h3>
                        <h3 class='text-primary fs-3 text-white text-left font-weight-bold'> Deadline Quiz for:</h3>
                        <h3 class='text-secondary fs-3 text-white text-left font-weight-bold'>
                            {{ $closest_deadline->name }}
                        </h3>
                        <h3 class='text-secondary fs-3 text-white text-left font-weight-bold'>on
                            {{ \Carbon\Carbon::parse($closest_deadline->deadline)->format('l, d F Y') }}</h3>

                        @elseif(Auth::user()->role->name=='teacher')
                            <h3 class='text-primary text-white text-left font-weight-bold fs-3'>
                                Quizzes created:
                            </h3>
                            <div class='text-primary text-white text-left font-weight-bold fs-4'>
                                @foreach(Auth::user()->classes as $class)
                                    @foreach($class->quizzes as $quiz)
                                    <ul>
                                        <li>{{ $quiz->name }}</li>
                                    </ul>
                                    @endforeach
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
