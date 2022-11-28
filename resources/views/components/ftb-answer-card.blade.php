<form action="{{$path}}" method='POST' class='d-flex border border-2 border-dark rounded mb-2 mx-3'>
    @csrf
    <input type="text" name="answer" placeholder="Tell us your answer!" class='p-2' value="{{$old}}">
    <input type="submit" class='border-0 bg-orange text-white p-2'>
</form>
