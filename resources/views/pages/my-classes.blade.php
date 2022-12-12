@extends('layout')

@section('body')
    <div class='px-2 text-center w-75'>
        <div class="d-flex flex-column align-items-center bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
            <div>
                <div class="row text-center align-items-center m-3 align-top">
                    <div class="">
                        <h1 class="text-success fw-bold">My Classes</h1>
                    </div>
                </div>
                @foreach ($classList as $class)
                    <div class="d-flex justify-content-evenly flex-wrap gap-3 py-3">
                        <div class="card text-center d-flex align-content-center flex-wrap">
                            <div class="card text-center w-100 d-flex align-content-center bg-warning flex-wrap px-2 pt-2">
                                <h5><a href="/my-class/{{ $class->id }}" class="text-black card-title text-center">
                                        {{ $class->name }}</a></h5>
                            </div>
                            <p class="card-text pt-2" style="width: 300px;">{{ $class->description }}</p>
                            <p class="card-text text-center pb-2">Students: {{ $class->students->count() }}</p>
                        </div>
                    </div>
                @endforeach
                @if ($classList->lastPage() > 1)
                    <ul class="mt-2 pagination d-flex justify-content-center">
                        <li class="page-item"><a class="page-link text-turqouise fs-4"
                                href="{{ $classList->url(1) }}">1</a></li>
                        @if ($classList->lastPage() >= 2)
                            <li class="page-item"><a class="page-link text-turqouise fs-4"
                                    href="{{ $classList->url(2) }}">2</a></li>
                        @endif
                        @if ($classList->lastPage() > 4)
                            <li class="page-item">
                                <span class="page-link text-turqouise fs-4">
                                    <ion-icon name="ellipsis-horizontal" class="align-middle"></ion-icon>
                                </span>
                            </li>
                        @endif
                        @if ($classList->lastPage() > 3)
                            <li class="page-item"><a class="page-link text-turqouise fs-4"
                                    href="{{ $classList->url($classList->lastPage() - 1) }}">{{ $classList->lastPage() - 1 }}</a>
                            </li>
                        @endif
                        @if ($classList->lastPage() >= 4)
                            <li class="page-item"><a class="page-link text-turqouise fs-4"
                                    href="{{ $classList->url($classList->lastPage()) }}">{{ $classList->lastPage() }}</a>
                            </li>
                        @endif
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
