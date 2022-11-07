<div class="row g-3 align-items-center mt-1 pb-3 px-1">
    <div class="col-auto">
        @isset ($answer)
        <input type="radio" name="answer" value={{$index}} checked>
        @else
        <input type="radio" name="answer" value={{$index}}>
        @endif
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
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, iusto. Perspiciatis, officia?
            </span>
        @else
            <input type="text" id="answer-{{$option}}"
            class="form-control border-0 border-bottom border-2 border-dark rounded-0"
            aria-describedby="answer-{{$option}}">
        @endif
    </div>
    {{-- For error message, use form text!! --}}
</div>
