<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href={{asset('css/base.css')}}>
    @yield('css')
</head>
<body class='w-100 vh-100 d-flex flex-column'>
    <header class="navbar navbar-dark navbar-expand-lg bg-turqouise text-primary px-3">
        <div class="container-fluid">
            <a class="navbar-brand text-white fs-1" href="#">Quizzes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarNav">
                <ul class="navbar-nav fs-5">
                    @if($signedIn)
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="#">
                            <ion-icon name="people" size='medium'></ion-icon> MY CLASS
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <ion-icon name="rocket"></ion-icon> EXPLORE
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="contact.blade.php">
                            <ion-icon name="mail"></ion-icon> CONTACT US
                        </a>
                    </li>
                </ul>
                @if($signedIn)
                    <h2 class='text-white fs-5 fw-lighter mt-2 lg:mt-0'>
                        Welcome Back
                        <span class='fw-bold'>
                            <a href='#' class='text-decoration-none text-white'>Johnny</a>
                        </span>
                        !
                    </h2>
                @else
                    <div class='d-flex justify-content-start lg:justify-content-center text-secondary'>
                        <a href="login.blade.php" class='btn bg-white text-turqouise hover-pink fw-bold me-2 '>
                            Login
                        </a>
                        <a href="register.blade.php" class='btn bg-white text-turqouise hover-pink fw-bold'>
                            Register
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </header>
    <main class='p-3 p-lg-4 d-flex flex-grow-1 justify-content-center align-items-start bg-green'>
        @yield('body')
    </main>
    <footer class='container-fluid bg-turqouise p-3 d-flex justify-content-center align-items-center'>
        <h3 class='text-white fs-6 fw-lighter'>Copyright &copy; 2022 Quizzes</h3>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>
