<input type="hidden" name="answer" value='{{$index}}'>
<button class='w-100 p-0 d-flex justify-content-center align-items-center border border-2 border-dark rounded mb-2'>
    <div class='bg-{{$color}} p-4'>
        <span class='fw-bold fs-1'>{{$number}}</span>
    </div>
    <div class='flex-grow-1 p-3'>
        <span class='fs-4'>{{$answer}}</span>
    </div>
</button>
