@extends('layout')

@section('title', 'Make Quiz (' . Str::upper($type) . ')')

@section('body')
    <div class='text-center'>
        <form action="@isset($problem){{ route('quiz-problems.update', ['quiz_id' => $quiz_id, 'index' => $index]) }}@else{{ route('quiz-problems.store', ['quiz_id' => $quiz_id, 'index' => $index, 'question_type' => $type]) }}@endif" method="POST" class='py-3 px-0 px-md-5' enctype="multipart/form-data">
            @csrf
            @isset($problem)
            @method('PATCH')
            @else
            @method("POST")
            @endif
            <h2 class='text-pink mb-4'>
                @isset($problem) Edit @else Add New @endif @if ($type == 'mcq')Multiple Choice @else Fill in the Blanks @endif Question
            </h2>
            <div class="row g-3 bg-white align-items-center mt-1 mx-0 pb-3 px-0 px-md-2 border border-2 border-dark rounded">
                <div class="col-auto">
                    <label for="question" class="col-form-label text-pink fw-bold fs-4">Q: </label>
                </div>
                <div class="col-auto flex-grow-1">
                    <input type="text" id="question" name='question'
                        class="form-control border-0 border-bottom border-2 border-dark rounded-0"
                        aria-describedby="question" @isset($problem) value="{{ $problem->question }}" @endif>
                </div>
                @error('question')
                    <p class="row g-3 px-1 px-md-2 px-lg-4 text-pink fs-6 mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class='row g-3 bg-white pb-3 px-0 px-md-2 my-2 mx-0 border border-2 border-dark rounded'>
                @if ($type == 'ftb') <div class='col-auto'> @endif
                <label for="answer" class="col-form-label text-start text-pink fw-bold fs-4">A: </label>
                @if ($type == 'ftb') </div>
                    @isset($problem)
                        @includeIf("components.ftb-question-card", ['problem'=>$problem->answer])
                    @else
                        @includeIf("components.ftb-question-card")
                    @endif
                @else
                    @isset($problem)
                        @includeIf("components.mcq-question-card", ['index'=>'1', 'option'=>'a', 'problem'=>$problem->choice1, 'answer'=>$problem->problem->answer=="1"])
                        @includeIf("components.mcq-question-card", ['index'=>'2', 'option'=>'b', 'problem'=>$problem->choice2, 'answer'=>$problem->problem->answer=="2"])
                        @includeIf("components.mcq-question-card", ['index'=>'3', 'option'=>'c', 'problem'=>$problem->choice3, 'answer'=>$problem->problem->answer=="3"])
                        @includeIf("components.mcq-question-card", ['index'=>'4', 'option'=>'d', 'problem'=>$problem->choice4, 'answer'=>$problem->problem->answer=="4"])
                    @else
                        @includeIf("components.mcq-question-card", ['index'=>'1', 'option'=>'a'])
                        @includeIf("components.mcq-question-card", ['index'=>'2', 'option'=>'b'])
                        @includeIf("components.mcq-question-card", ['index'=>'3', 'option'=>'c'])
                        @includeIf("components.mcq-question-card", ['index'=>'4', 'option'=>'d'])
                    @endif
                @endif
            </div>
            @error('answer')
            <p class="row g-3 px-1 text-pink fs-6 mt-1">
                {{ $message }}
            </p>
            @enderror
            <div class="row g-3 mt-1 mx-0 px-0 px-md-2 justify-content-between">
                <input type='file' class='col-auto btn btn-outline-danger text-pink border-dark' name='image'>
                <button class='col-auto btn bg-turqouise text-white hover-bg-pink justify-content-center align-items-center'>Submit</button>
            </div>
            @error('image')
            <p class="row g-3 px-2 justify-content-end text-pink fs-6 mt-1">
                {{ $message }}
            </p>
            @enderror
        </form>
    </div>
@endsection
