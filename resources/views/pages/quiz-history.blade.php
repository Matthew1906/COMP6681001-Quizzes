@extends('layout')

@section('body')
    <div class='px-2 text-center'>
            <div class="d-flex flex-column align-items-center bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                <div class='mx-3 flex-grow-1'>
                    <div class="row g-3 align-items-center mt-1 pb-3 px-2">
                        <div class="col-auto">
                            <h2 class="text-pink fw-bold">Class A - Bahasa Indonesia 1</h2>
                            <h4 class="text-pink fw-bold">Monday, 1 November 2022</h4>
                            <h3 class="text-pink fw-bold opacity-50">Charles Boyle - 10/10</h4>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-start bg-orange mb-3 py-3 px-5 border border-2 border-dark rounded">
                    <div class="d-flex flex-row">
                        <h2 class='mt-4 me-2'>1. </h2>
                        <h2 class='mt-4 me-2'>False </h2>
                    </div>
                    <div class='mx-3'>
                        <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded bg-white">
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
                        <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded bg-white'>
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
                </div>
                <div class="d-flex flex-column bg-orange mb-3 py-3 px-5 border border-2 border-dark rounded w-100">
                    <div class="d-flex flex-row">
                        <h2 class='mt-4 me-2'>2. </h2>
                        <h2 class='mt-4 me-2'>False </h2>
                    </div>
                    <div class='mx-3 flex-grow-1'>
                        <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded bg-white">
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
                        <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded bg-white'>
                            <div class="col-auto">
                                <span class="col-form-label text-start text-pink fw-bold fs-4">A: </span>
                            </div>
                            @includeIf('components.ftb-question-card', ['solved' => true])
                        </div>
                        <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded bg-white'>
                            <div class="col-auto">
                                <span class="col-form-label text-start text-success fw-bold fs-4">A: </span>
                            </div>
                            @includeIf('components.ftb-question-card', ['solved' => true])
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column bg-orange mb-3 py-3 px-5 border border-2 border-dark rounded w-100">
                    <div class="d-flex flex-row">
                        <h2 class='mt-4 me-2'>3. </h2>
                        <h2 class='mt-4 me-2'>True </h2>
                    </div>
                    <div class='mx-3 flex-grow-1'>
                        <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded bg-white">
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
                        <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded bg-white'>
                            <div class="col-auto">
                                <span class="col-form-label text-start text-success fw-bold fs-4">A: </span>
                            </div>
                            @includeIf('components.ftb-question-card', ['solved' => true])
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-start bg-orange mb-3 py-3 px-5 border border-2 border-dark rounded">
                    <div class="d-flex flex-row">
                        <h2 class='mt-4 me-2'>4. </h2>
                        <h2 class='mt-4 me-2'>True </h2>
                    </div>
                    <div class='mx-3'>
                        <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded bg-white">
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
                        <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded bg-white'>
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
                </div>
            </div>

    </div>
@endsection
