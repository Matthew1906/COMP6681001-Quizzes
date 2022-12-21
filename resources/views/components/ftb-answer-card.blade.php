<form action="{{$path}}" method='POST' class='d-flex border border-2 border-dark rounded mb-2 mx-0 mx-lg-3'>
    @csrf
    <input type="text" name="answer" placeholder="Tell us your answer!" class='py-2' value="{{$old}}">
    <input type="submit" class='border-0 bg-orange text-white py-2 px-1'>
</form>
