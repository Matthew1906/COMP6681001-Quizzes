@extends('layout')

@section('title', 'Simulation - Quizzes')

@section('body')
    <div class='px-2 text-center'>
        <h3 class='fs-2 fw-lighter mb-3'>54:12</h3>
        <h2 class='p-3 bg-white border border-dark border-2 rounded'>1. What is the Capital City of Indonesia?</h2>
        <img src="https://picsum.photos/300/200" class='mt-2 mb-4 border border-4 border-dark rounded'>
        <div class='d-flex justify-content-center align-items-center'>
            <a href="" class='text-black'>
                <ion-icon name="arrow-back-circle-outline" class='fs-1'></ion-icon>
            </a>
            @if($type=='mcq')
            <div class="container">
                <div class="row">
                    <div class="col">
                        @includeIf('components.mcq-answer-card', [
                            'number' => 'A',
                            'answer' => 'Jakarta',
                            'color' => 'danger',
                        ])
                    </div>
                    <div class="col">
                        @includeIf('components.mcq-answer-card', [
                            'number' => 'C',
                            'answer' => 'Palopo',
                            'color' => 'warning',
                        ])
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @includeIf('components.mcq-answer-card', [
                            'number' => 'B',
                            'answer' => 'Bandung',
                            'color' => 'success',
                        ])
                    </div>
                    <div class="col">
                        @includeIf('components.mcq-answer-card', [
                            'number' => 'D',
                            'answer' => 'Banda Aceh',
                            'color' => 'info',
                        ])
                    </div>
                </div>
            </div>
            @else
                @includeIf('components.ftb-answer-card')
            @endif
            <a href="" class='text-black'>
                <ion-icon name="arrow-forward-circle-outline" class='fs-1'></ion-icon>
            </a>
        </div>
        <ul class="mt-2 pagination d-flex justify-content-center border border-2 border-turqouise">
            <li class="page-item"><a class="page-link text-turqouise fs-4" href="#">1</a></li>
            <li class="page-item"><a class="page-link text-turqouise fs-4" href="#">2</a></li>
            <li class="page-item">
                <span class="page-link text-turqouise fs-4">
                    <ion-icon name="ellipsis-horizontal" class="align-middle"></ion-icon>
                </span>
            </li>
            <li class="page-item"><a class="page-link text-turqouise fs-4" href="#">5</a></li>
            <li class="page-item"><a class="page-link text-turqouise fs-4" href="#">6</a></li>
        </ul>
    </div>
@endsection
