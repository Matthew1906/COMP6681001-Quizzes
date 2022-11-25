@extends('layout')
{{-- @section('css')

@endsection --}}
@section('body')
<div class="container-fluid">
<h1 class = 'text-primary text-black text-center font-weight-bold'>Explore available quizes</h1>

<div class="input-group">
    <input type="search" class="form-control rounded" placeholder="Search Quiz" aria-label="Search Quiz" aria-describedby="search-addon" />
    <button type="button" class="btn btn-primary btn-sm bg-turqouise text-primary text-white hover-bg-pink align-items-center">Search Quiz</button>
</div>

<div class="container">
    <div class="row ">
      <div class="col border border-2 border-dark m-4 bg-white rounded">
        <h2 class="text-primary text-black">Statistic Quiz</h2>

        <h2 class="text-primary text-black">Class: A</h2>

        <h2 class="text-primary text-black">Deadline: 10/12/2022</h2>

        <h2 class="text-primary text-black">Average Score: 9.5/10</h2>
        <p class="fs-6"> 10/32 students have done this quiz</p>
        <div class="text-center">
        <button type="button" class="btn btn-primary btn-lg btn-block bg-orange text-primary text-white hover-bg-turqouise justify-content-center ">Attend Quiz</button>
        </div>
        <br>
      </div>
      <div class="col border border-2 border-dark m-4 bg-white rounded">
        <h2 class="text-primary text-black">Statistic Quiz</h2>

        <h2 class="text-primary text-black">Class: A</h2>

        <h2 class="text-primary text-black">Deadline: 10/12/2022</h2>

        <h2 class="text-primary text-black">Average Score: 9.5/10</h2>
        <p class="fs-6"> 10/32 students have done this quiz</p>
        <div class="text-center">
        <button type="button" class="btn btn-primary btn-lg btn-block bg-orange text-primary text-white hover-bg-turqouise justify-content-center ">Attend Quiz</button>
        </div>
        <br>
      </div>
    </div>
    <div class="row">
        <div class="col border border-2 border-dark m-4 bg-white rounded">
            <h2 class="text-primary text-black">Statistic Quiz</h2>

            <h2 class="text-primary text-black">Class: A</h2>

            <h2 class="text-primary text-black">Deadline: 10/12/2022</h2>

            <h2 class="text-primary text-black">Average Score: 9.5/10</h2>
            <p class="fs-6"> 10/32 students have done this quiz</p>
            <div class="text-center">
            <button type="button" class="btn btn-primary btn-lg btn-block bg-orange text-primary text-white hover-bg-turqouise justify-content-center ">Attend Quiz</button>
            </div>
            <br>
          </div>
          <div class="col border border-2 border-dark m-4 bg-white rounded">
            <h2 class="text-primary text-black">Statistic Quiz</h2>

            <h2 class="text-primary text-black">Class: A</h2>

            <h2 class="text-primary text-black">Deadline: 10/12/2022</h2>

            <h2 class="text-primary text-black">Average Score: 9.5/10</h2>
            <p class="fs-6"> 10/32 students have done this quiz</p>
            <div class="text-center">
            <button type="button" class="btn btn-primary btn-lg btn-block bg-orange text-primary text-white hover-bg-turqouise justify-content-center ">Attend Quiz</button>
            </div>
            <br>
          </div>
        </div>
</div>
<br>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center ">
      <li class="page-item"><a class="page-link text-turqouise font-weight-bold" href="#">Previous</a></li>
      <li class="page-item"><a class="page-link bg-turqouise text-white font-weight-bold" href="#">1</a></li>
      <li class="page-item"><a class="page-link text-turqouise font-weight-bold" href="#">2</a></li>
      <li class="page-item"><a class="page-link text-turqouise font-weight-bold" href="#">3</a></li>
      <li class="page-item"><a class="page-link text-turqouise font-weight-bold" href="#">Next</a></li>
    </ul>
  </nav>
@endsection
