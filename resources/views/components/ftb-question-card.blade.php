<div class="col-auto flex-grow-1">
    @isset($solved)
        <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0">
            {{ $answer }}
        </span>
    @else
        <input type="text" id="answer" name='answer'
            class="form-control border-0 border-bottom border-2 border-dark rounded-0" aria-describedby="answer"
            @isset($problem)value="{{ $problem }}"@endif>
    @endif
</div>
