@extends('layout')

@section('title', 'My Classes')

@section('body')
    <div class='px-2 text-center'>
        <div class="bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
            <div class="row text-center align-items-center m-3 align-top">
                <h1 class="text-pink fw-bold">My Classes</h1>
            </div>
            <div class='d-flex justify-content-center align-items-center'>
                @foreach ($classes as $class)
                    <div class="card me-4 mb-4">
                        <h5 class="card-header bg-orange text-white text-center">
                            Class {{ $class->name }}
                            </a>
                        </h5>
                        <div class="card-body">
                            <div class="card-text">
                                <p>{{ $class->description }}</p>
                                <p><strong>Students: </strong>{{ $class->students->count() }}</p>
                            </div>
                            <a href="{{ route('classes.show', ['class_id' => $class->id]) }}"
                                class="btn bg-pink hover-bg-orange text-white text-center text-decoration-none"
                            >Check it out</a>
                        </div>
                    </div>
                @endforeach
            </div>
            @if ($classes->lastPage() > 1)
                <ul class="mt-2 pagination d-flex justify-content-center">
                    <li class="page-item"><a class="page-link text-turqouise fs-4" href="{{ $classes->url(1) }}">1</a>
                    </li>
                    @if ($classes->lastPage() >= 2)
                        <li class="page-item"><a class="page-link text-turqouise fs-4" href="{{ $classes->url(2) }}">2</a>
                        </li>
                    @endif
                    @if ($classes->lastPage() > 4)
                        <li class="page-item">
                            <span class="page-link text-turqouise fs-4">
                                <ion-icon name="ellipsis-horizontal" class="align-middle"></ion-icon>
                            </span>
                        </li>
                    @endif
                    @if ($classes->lastPage() > 3)
                        <li class="page-item"><a class="page-link text-turqouise fs-4"
                                href="{{ $classes->url($classes->lastPage() - 1) }}">{{ $classes->lastPage() - 1 }}</a>
                        </li>
                    @endif
                    @if ($classes->lastPage() >= 4)
                        <li class="page-item"><a class="page-link text-turqouise fs-4"
                                href="{{ $classes->url($classes->lastPage()) }}">{{ $classes->lastPage() }}</a>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
@endsection
