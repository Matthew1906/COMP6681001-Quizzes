<div class="row g-3 align-items-center mt-1 pb-3 px-1">
    <div class="col-auto">
        <input type="radio" name="@isset($solved){{"answer-".$prompt.'-'.$solved}}@else{{"answer"}}@endif" value={{$index}}  @isset($solved) disabled @endif @isset($answer) @if($answer) checked @endif @endif>
    </div>
    <div class="col-auto">
        @isset($solved)
            <span class="col-form-label text-pink fw-bold">{{$option}}. </span>
        @else
            <label for="answer-{{$option}}" class="col-form-label text-pink fw-bold">{{$option}}. </label>
        @endif
    </div>
    <div class="col-auto flex-grow-1">
        @isset($solved)
            <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0">
                {{$prompt}}
            </span>
        @else
            <input type="text" id="answer-{{$option}}" name="answer-{{$option}}"
            class="form-control border-0 border-bottom border-2 border-dark rounded-0"
            aria-describedby="answer-{{$option}}" @isset($problem)value="{{$problem}}" @endif>
        @endif
    </div>
    {{-- For error message, use form text!! --}}
</div>
