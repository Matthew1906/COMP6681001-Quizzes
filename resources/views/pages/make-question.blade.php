@extends('layout')

@section('title', 'Make Quiz ('.Str::upper($type).') - Quizzes')

@section('body')
    <div class='px-2 text-center'>
        <form action="" class='bg-white py-3 px-5'>
            <h2 class='text-pink mb-4'>
                Add New @if($type=='mcq')Multiple Choice @else Fill in the Blanks @endif Question</h2>
            <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded">
                <div class="col-auto">
                    <label for="question" class="col-form-label text-pink fw-bold fs-4">Q: </label>
                </div>
                <div class="col-auto flex-grow-1">
                    <input type="text" id="question"
                        class="form-control border-0 border-bottom border-2 border-dark rounded-0"
                        aria-describedby="question">
                </div>
                {{-- For error message, use form text!! --}}
            </div>
            <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded'>
                @if($type=='ftb') <div class='col-auto'> @endif
                <label for="answer" class="col-form-label text-start text-pink fw-bold fs-4">A: </label>
                @if($type=='ftb') </div>
                    @includeIf("components.ftb-question-card")
                @else
                    @includeIf("components.mcq-question-card", ['index'=>'1', 'option'=>'a'])
                    @includeIf("components.mcq-question-card", ['index'=>'2', 'option'=>'b'])
                    @includeIf("components.mcq-question-card", ['index'=>'3', 'option'=>'c'])
                    @includeIf("components.mcq-question-card", ['index'=>'4', 'option'=>'d'])
                @endif
            </div>
            <div class="row g-3 mt-1 px-1 justify-content-between">
                <input type='file' class='col-auto btn btn-outline-danger text-pink border-dark' name='image'>
                <a href="" class='col-auto btn bg-turqouise text-white hover-bg-pink justify-content-center align-items-center'>Submit</a>
            </div>
        </form>
    </div>
@endsection
