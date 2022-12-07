@extends('layout')

@section('body')
    <div class='px-2 text-center w-75'>
            <div class="d-flex flex-column align-items-center bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <div class='mx-3 flex-grow-1'>
                    <div class="d-flex flex-column row align-items-center mt-1 pb-3 px-2 text-center">
                        <div class="row w-50 text-center align-items-center">
                            <h2 class="text-success fw-bold">Profile</h2>
                            <div class="d-flex flex-column align-items-center bg-pink mb-3 py-3 px-5 border border-2 border-dark rounded">
                                <h4 class="text-white">Student: {{Auth::user()->full_name}}</h4>
                                <h4 class="text-white">Class:
                                @foreach(Auth::user()->classes as $class)
                                        {{ $class->name }}
                                        @if( !$loop->last)
                                        , 
                                        @endif
                                    @endforeach
                                </h4>
                                <h4 class="text-white">
                                    
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <h4 class="text-pink fw-bold">Participated Quizzes:</h4>
                        </div>
                        <div class="d-flex flex-column align-items-center bg-orange mb-3 py-3 px-5 border border-2 border-dark rounded">
                            <li>
                                <ul class="text-pink">
                                    <a class="col-xs-6 text-pink fs-5" href="url">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium reprehenderit dicta, libero ut consequuntur nihil qui molestiae incidunt.</a>
                                </ul>
                                <ul class="text-pink">
                                    <a class="col-xs-6 text-pink fs-5" href="url">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium reprehenderit dicta, libero ut consequuntur nihil qui molestiae incidunt.</a>
                                </ul>
                                <ul class="text-pink">
                                    <a class="col-xs-6 text-pink fs-5" href="url">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium reprehenderit dicta, libero ut consequuntur nihil qui molestiae incidunt.</a>
                                </ul>
                                <ul class="text-pink">
                                    <a class="col-xs-6 text-pink fs-5" href="url">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium reprehenderit dicta, libero ut consequuntur nihil qui molestiae incidunt.</a>
                                </ul>
                                <ul class="text-pink">
                                    <a class="col-xs-6 text-pink fs-5" href="url">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium reprehenderit dicta, libero ut consequuntur nihil qui molestiae incidunt.</a>
                                </ul>
                                <ul class="text-pink">
                                    <a class="col-xs-6 text-pink fs-5" href="url">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium reprehenderit dicta, libero ut consequuntur nihil qui molestiae incidunt.</a>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>

            </div>

    </div>
@endsection
