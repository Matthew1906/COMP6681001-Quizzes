<div class="col-auto flex-grow-1">
    @isset($solved)
        <span class="form-control text-start border-0 border-bottom border-2 border-dark rounded-0">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, iusto. Perspiciatis, officia?
        </span>
    @else
        <input type="text" id="answer" class="form-control border-0 border-bottom border-2 border-dark rounded-0"
            aria-describedby="answer">
        @endif
    </div>
