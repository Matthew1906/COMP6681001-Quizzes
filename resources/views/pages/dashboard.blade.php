@extends('layout')

@section("title", "Dashboard")

<style>
    .item1 {
        grid-area: menu;
        padding: 30px 30px 30px 30px;
        text-align: center;
    }
    .item2 {
        grid-area: main;
        background-image: url(https://media.istockphoto.com/vectors/abstract-financial-background-vector-id1284772036?k=20&m=1284772036&s=612x612&w=0&h=346n0lOHpObW4Kro9aE2n0AcR588m16vFiKQ8yrhENo=);
        width: 100%;
    }
    .item3 {
        grid-area: footer;
        background-image: url(https://t4.ftcdn.net/jpg/04/39/13/37/360_F_439133763_FrLdhZsd5aGC23r9ATARuKJBr8ifZjIe.jpg);
        width: 100%;
        text-align: left;
    }

    .grid-container {
      display: grid;
      grid-template-areas:
        'menu main main main main main'
        'menu footer footer footer footer footer';
      gap: 10px;
      background-color: white;
      padding: 30px;
      border-radius: 2%;
      align-content: stretch;
    }

    .grid-container > div {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px 90px 30px 90px;
      font-size: 30px;
      border-radius: 5%;
      border-style: outset;
    }
</style>

@section('body')
<div class="grid-container">
    <div class="item1">
        <img src="https://i.ibb.co/JqGF3dY/pngwing-com.png"  width="200px" height="200px" alt="">
        <br>
        <br>
        @auth
        <h3 class= "text-primary text-black text-center font-weight-bold">Hello {{ Auth::user()->full_name }}</h3>
        @endauth
        <br>
        <a href ="#">
        <button type="button" class='w-100 btn btn-primary btn-lg btn-block bg-turqouise text-primary text-white hover-bg-pink justify-content-center align-items-center'>SEE PROFILE DETAILS</button>
        </a>
        <br>
        <br>
        <a href ="#">
        <button type="button" class='w-100 btn btn-primary btn-lg btn-block bg-turqouise text-primary text-white hover-bg-pink justify-content-center align-items-center'>LOGOUT</button>
        </a>
     </div>
    <div class="item2">
        <h1 class = 'text-primary text-white text-left font-weight-bold'> Your Total Average Score</h1>
        <h1 class = 'text-primary text-white text-left font-weight-bold'> 9.34/10</h1>
        <br>
    </div>
    <div class="item3">
        <h1 class = 'text-primary text-white text-left font-weight-bold'> Upcoming Statistic quiz</h1>
        <h1 class = 'text-primary text-white text-left font-weight-bold'> 03/05/2023</h1>
        <br>
        <h1 class = 'text-primary text-white text-left font-weight-bold'> Deadline Quiz for</h1>
        <h1 class = 'text-primary text-white text-left font-weight-bold'> Statistics: 03/05/2023</h1>

    </div>
  </div>
@endsection
