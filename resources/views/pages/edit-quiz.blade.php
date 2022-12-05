@extends('layout')

@section('title', 'Edit Quiz - Quizzes')

@section('body')
    <div class='w-100 px-2 text-center'>
        <div class="bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
            <form action={{ route('update-quiz', ['quiz_id' => $quiz->id]) }} method="POST">
                @method('PATCH')
                @csrf
                <div class="d-flex align-items-start bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                    <div class='container-fluid mx-3 flex-grow-1'>
                        <h1 class='row text-orange pb-1'>Create New Quiz</h1>
                        <div class="row g-3 align-items-center mt-1 pb-3 px-2">
                            <div class="col-3 text-start">
                                <label for='name' name='name' class="col-form-label text-pink fw-bold fs-4">Quiz Title:
                                </label>
                            </div>
                            <div class="col-9">
                                <input type="text" id="name" name='name'
                                    class="form-control border border-1 border-dark rounded-2" aria-describedby="title"
                                    value="{{ $quiz->name }}">
                            </div>
                        </div>
                        <div class="row g-3 align-items-start mt-1 pb-3 px-2">
                            <div class="col-3 text-start">
                                <label for='description' class="col-form-label text-pink fw-bold fs-4">Quiz Description:
                                </label>
                            </div>
                            <div class="col-9">
                                <textarea id="description" name='description' class="form-control border border-1 border-dark rounded-2"
                                    aria-describedby="description" rows=5>{{ $quiz->description }}</textarea>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mt-1 pb-3 px-2">
                            <div class="col-3 text-start">
                                <label for='deadline' name='deadline' class="col-form-label text-pink fw-bold fs-4">Quiz
                                    Deadline: </label>
                            </div>
                            <div class="col-9">
                                <input type="datetime-local" id="deadline" name='deadline' value="{{ $quiz->deadline }}"
                                    class="form-control border border-1 border-dark rounded-2" aria-describedby="deadline">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center justify-content-end mt-1 pb-3">
                            <div class="col-3 d-flex justify-content-end align-items-center">
                                <input type="checkbox" id="repeat" name='repeat' class="form-check-input" value="true"
                                    aria-describedby="repeat" @if ($quiz->repeat == 1) checked @endif>
                                <label for='repeat' class="form-check-label text-pink fw-bold fs-4 ms-2">Redoable?
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-1 px-1 justify-content-end">
                    <button
                        class='col-2 btn bg-turqouise text-white hover-bg-pink justify-content-center align-items-center fs-5'>
                        Update
                    </button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
        @foreach ($quiz->problems as $problem)
            @if ($problem->problem_type == 'App\Models\MCProblem')
                <div class="d-flex align-items-center bg-white mb-3 py-3 px-5 border border-2 border-dark rounded">
                    @isset($problem->image)<img src="{{ asset('storage/quizzes/' . $problem->image) }}" class='w-25 h-auto me-auto'>@endisset
                    <div class='mx-3 flex-grow-1'>
                        <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded">
                            <div class="col-auto">
                                <span class="col-form-label text-pink fw-bold fs-4">Q: </span>
                            </div>
                            <div class="col-auto flex-grow-1">
                                <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0">
                                    {{ $problem->problem->question }}
                                </span>
                            </div>
                        </div>
                        <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded'>
                            <label for="answer" class="col-form-label text-start text-pink fw-bold fs-4">A: </label>
                            @includeIf('components.mcq-question-card', [
                                'index' => '1',
                                'option' => 'a',
                                'solved' => $problem->index,
                                'prompt' => $problem->problem->choice1,
                                'answer' => $problem->problem->answer == '1',
                            ])
                            @includeIf('components.mcq-question-card', [
                                'index' => '2',
                                'option' => 'b',
                                'solved' => $problem->index,
                                'prompt' => $problem->problem->choice2,
                                'answer' => $problem->problem->answer == '2',
                            ])
                            @includeIf('components.mcq-question-card', [
                                'index' => '3',
                                'option' => 'c',
                                'solved' => $problem->index,
                                'prompt' => $problem->problem->choice3,
                                'answer' => $problem->problem->answer == '3',
                            ])
                            @includeIf('components.mcq-question-card', [
                                'index' => '4',
                                'option' => 'd',
                                'solved' => $problem->index,
                                'prompt' => $problem->problem->choice4,
                                'answer' => $problem->problem->answer == '4',
                            ])
                        </div>
                    </div>
                    <div class='mt-4 d-flex flex-column'>
                        <a href="{{route('edit-quiz-problem', ['quiz_id'=>$quiz->id, 'index'=>$problem->index])}}">
                            <ion-icon name="pencil" class='text-black fs-2'></ion-icon>
                        </a>
                        <form
                            action="{{ route('destroy-quiz-problem', ['quiz_id' => $quiz->id, 'index' => $problem->index]) }}"
                            method='POST'>
                            @csrf
                            @method('DELETE')
                            <button class='bg-transparent border-0 outline-0'>
                                <ion-icon name="trash" class='text-pink fs-2'></ion-icon>
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="d-flex align-items-center bg-white mb-3 py-3 px-5 border border-2 border-dark roundedt">
                    @isset($problem->image)<img src="{{ asset('storage/quizzes/' . $problem->image) }}" class='w-25 h-auto me-auto'>@endisset
                    <div class='mx-3 flex-grow-1'>
                        <div class="row g-3 align-items-center mt-1 pb-3 px-2 border border-2 border-dark rounded">
                            <div class="col-auto">
                                <span class="col-form-label text-pink fw-bold fs-4">Q: </span>
                            </div>
                            <div class="col-auto flex-grow-1">
                                <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0">
                                    {{ $problem->problem->question }}
                                </span>
                            </div>
                        </div>
                        <div class='row g-3 pb-3 px-2 my-2 border border-2 border-dark rounded'>
                            <div class="col-auto">
                                <span class="col-form-label text-start text-pink fw-bold fs-4">A: </span>
                            </div>
                            @includeIf('components.ftb-question-card', [
                                'solved' => $problem->index,
                                'answer' => $problem->problem->answer,
                            ])
                        </div>
                    </div>
                    <div class='mt-4 d-flex flex-column'>
                        <a href="{{route('edit-quiz-problem', ['quiz_id'=>$quiz->id, 'index'=>$problem->index])}}">
                            <ion-icon name="pencil" class='text-black fs-2'></ion-icon>
                        </a>
                        <form
                            action="{{ route('destroy-quiz-problem', ['quiz_id' => $quiz->id, 'index' => $problem->index]) }}"
                            method='POST'>
                            @csrf
                            @method('DELETE')
                            <button class='bg-transparent border-0 outline-0'>
                                <ion-icon name="trash" class='text-pink fs-2'></ion-icon>
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="row g-3 mt-1 px-1 justify-content-between">
            <div class="col-auto">
                <a href="{{ route('create-quiz-problem', ['quiz_id' => $quiz->id, 'index' => count($quiz->problems)>=1?$quiz->problems->last()->index + 1:1, 'question_type' => 'mcq']) }}"
                    class='btn bg-orange text-white hover-bg-pink justify-content-center align-items-center fs-5 me-2'>+
                    MCQ</a>
                <a href="{{ route('create-quiz-problem', ['quiz_id' => $quiz->id, 'index' => count($quiz->problems)>=1?$quiz->problems->last()->index + 1:1, 'question_type' => 'ftb']) }}"
                    class='btn bg-pink text-white hover-bg-orange justify-content-center align-items-center fs-5'>+ Fill
                    in the Blanks</a>
            </div>
            <form
                action="{{ route('save-quiz', ['quiz_id' => $quiz->id]) }}"
                method='POST'
                class='col-auto'>
                @csrf
                <button class='btn bg-turqouise text-white hover-bg-pink justify-content-center align-items-center fs-5'>
                    Finish
                </button>
            </form>
        </div>
    </div>
@endsection
