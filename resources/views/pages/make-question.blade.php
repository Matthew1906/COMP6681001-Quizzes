@extends('layout')

@section('title', 'Make Quiz (' . Str::upper($type) . ') - Quizzes')

@section('body')
    <div class='px-2 text-center'>
        <form action="@isset($problem){{ route('update-quiz-problem', ['quiz_id' => $quiz_id, 'index' => $index]) }}@else{{ route('store-quiz-problem', ['quiz_id' => $quiz_id, 'index' => $index, 'question_type' => $type]) }}@endif" method="POST" class='bg-white py-3 px-5' enctype="multipart/form-data">
            @csrf
            @isset($problem)
            @method('PATCH')
            @else
            @method("POST")
            @endif
            <h2 class='text-pink mb-4'>
                @isset($problem) Edit @else Add New @endif @if ($type == 'mcq')Multiple Choice @else Fill in the Blanks @endif Question</h2>
            <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded">
                <div class="col-auto">
                    <label for="question" class="col-form-label text-pink fw-bold fs-4">Q: </label>
                </div>
                <div class="col-auto flex-grow-1">
                    <input type="text" id="question" name='question'
                        class="form-control border-0 border-bottom border-2 border-dark rounded-0"
                        aria-describedby="question" @isset($problem) value="{{ $problem->question }}" @endif>
                </div>
                {{-- For error message, use form text!! --}}
            </div>
            <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded'>
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
            <div class="row g-3 mt-1 px-1 justify-content-between">
                <input type='file' class='col-auto btn btn-outline-danger text-pink border-dark' name='image'>
                <button class='col-auto btn bg-turqouise text-white hover-bg-pink justify-content-center align-items-center'>Submit</button>
            </div>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            </div>
@endsection
