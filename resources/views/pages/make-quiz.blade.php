@extends('layout')

@section('title', 'Make Quiz - Quizzes')

@section('body')
    <div class='px-2 text-center'>
        <form action="">
            <div class="d-flex align-items-start bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <div class='mx-3 flex-grow-1'>
                    <div class="row g-3 align-items-center mt-1 pb-3 px-2">
                        <div class="col-auto">
                            <label for='title' class="col-form-label text-pink fw-bold fs-4">Quiz Title: </label>
                        </div>
                        <div class="col-auto flex-grow-1">
                            <input type="text" id="title"
                                class="form-control border-0 border-bottom border-2 border-dark rounded-0"
                                aria-describedby="title">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-start bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <h2 class='mt-4 me-2'>1. </h2>
                <div class='mx-3'>
                    <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded">
                        <div class="col-auto">
                            <span class="col-form-label text-pink fw-bold fs-4">Q: </span>
                        </div>
                        <div class="col-auto flex-grow-1">
                            <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, iusto. Perspiciatis,
                                officia?
                            </span>
                        </div>
                    </div>
                    <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded'>
                        <label for="answer" class="col-form-label text-start text-pink fw-bold fs-4">A: </label>
                        @includeIf('components.mcq-question-card', [
                            'index' => '1',
                            'option' => 'a',
                            'solved' => true,
                            'answer' => true,
                        ])
                        @includeIf('components.mcq-question-card', [
                            'index' => '2',
                            'option' => 'b',
                            'solved' => true,
                        ])
                        @includeIf('components.mcq-question-card', [
                            'index' => '3',
                            'option' => 'c',
                            'solved' => true,
                        ])
                        @includeIf('components.mcq-question-card', [
                            'index' => '4',
                            'option' => 'd',
                            'solved' => true,
                        ])
                    </div>
                </div>
                <div class='mt-4 d-flex flex-column'>
                    <a href="">
                        <ion-icon name="pencil" class='text-black fs-2'></ion-icon>
                    </a>
                    <a href="">
                        <ion-icon name="trash" class='text-pink fs-2'></ion-icon>
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-start bg-white mb-3 py-3 px-5 border border-2 border-dark roundedt">
                <h2 class='mt-4 me-2'>2. </h2>
                <div class='mx-3 flex-grow-1'>
                    <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded">
                        <div class="col-auto">
                            <span class="col-form-label text-pink fw-bold fs-4">Q: </span>
                        </div>
                        <div class="col-auto flex-grow-1">
                            <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, iusto. Perspiciatis,
                                officia?
                            </span>
                        </div>
                    </div>
                    <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded'>
                        <div class="col-auto">
                            <span class="col-form-label text-start text-pink fw-bold fs-4">A: </span>
                        </div>
                        @includeIf('components.ftb-question-card', ['solved' => true])
                    </div>
                </div>
                <div class='mt-4 d-flex flex-column'>
                    <a href="">
                        <ion-icon name="pencil" class='text-black fs-2'></ion-icon>
                    </a>
                    <a href="">
                        <ion-icon name="trash" class='text-pink fs-2'></ion-icon>
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-start bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <h2 class='mt-4 me-2'>3. </h2>
                <div class='mx-3 flex-grow-1'>
                    <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded">
                        <div class="col-auto">
                            <span class="col-form-label text-pink fw-bold fs-4">Q: </span>
                        </div>
                        <div class="col-auto flex-grow-1">
                            <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, iusto. Perspiciatis,
                                officia?
                            </span>
                        </div>
                    </div>
                    <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded'>
                        <div class="col-auto">
                            <span class="col-form-label text-start text-pink fw-bold fs-4">A: </span>
                        </div>
                        @includeIf('components.ftb-question-card', ['solved' => true])
                    </div>
                </div>
                <div class='mt-4 d-flex flex-column'>
                    <a href="">
                        <ion-icon name="pencil" class='text-black fs-2'></ion-icon>
                    </a>
                    <a href="">
                        <ion-icon name="trash" class='text-pink fs-2'></ion-icon>
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-start bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <h2 class='mt-4 me-2'>4. </h2>
                <div class='mx-3'>
                    <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded">
                        <div class="col-auto">
                            <span class="col-form-label text-pink fw-bold fs-4">Q: </span>
                        </div>
                        <div class="col-auto flex-grow-1">
                            <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, iusto. Perspiciatis,
                                officia?
                            </span>
                        </div>
                    </div>
                    <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded'>
                        <label for="answer" class="col-form-label text-start text-pink fw-bold fs-4">A: </label>
                        @includeIf('components.mcq-question-card', [
                            'index' => '1',
                            'option' => 'a',
                            'solved' => true,
                        ])
                        @includeIf('components.mcq-question-card', [
                            'index' => '2',
                            'option' => 'b',
                            'solved' => true,
                        ])
                        @includeIf('components.mcq-question-card', [
                            'index' => '3',
                            'option' => 'c',
                            'solved' => true,
                            'answer' => true,
                        ])
                        @includeIf('components.mcq-question-card', [
                            'index' => '4',
                            'option' => 'd',
                            'solved' => true,
                        ])
                    </div>
                </div>
                <div class='mt-4 d-flex flex-column'>
                    <a href="">
                        <ion-icon name="pencil" class='text-black fs-2'></ion-icon>
                    </a>
                    <a href="">
                        <ion-icon name="trash" class='text-pink fs-2'></ion-icon>
                    </a>
                </div>
            </div>
            <div class="row g-3 mt-1 px-1 justify-content-between">
                <div class="col-auto">
                    <a href=""
                        class='btn bg-orange text-white hover-bg-pink justify-content-center align-items-center fs-5 me-2'>+
                        MCQ</a>
                    <a href=""
                        class='btn bg-pink text-white hover-bg-orange justify-content-center align-items-center fs-5'>+ Fill
                        in the Blanks</a>
                </div>
                <a href=""
                    class='col-auto btn bg-turqouise text-white hover-bg-pink justify-content-center align-items-center fs-5'>Finish</a>
            </div>
        </form>
    </div>
@endsection
