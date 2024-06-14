<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    @vite('resources/js/user.js')

    <title></title>
</head>

<body>
    <div class=" d-flex flex-column min-vh-100">
        <header>
            <nav class="navbar navbar-light bg-dark">
                <div class="row justify-content-between w-100">
                    <div class="col-3">
                        <a class="navbar-brand size">
                            <img src="{{ URL::asset('storage/images/logo.jpg') }}" alt="profile Pic">
                        </a>
                    </div>
                    <div class="col-5">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <a href="{{ route('home') }}" class="navbar-brand text-home">Home</a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link text-nav-item" aria-current="page"
                                                href="#">About</a>
                                        </li>
                                        @if (Auth::check())
                                            <li class="nav-item">
                                                <a class="nav-link text-nav-item" href="#">List user</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-4">
                        <div class="row header-right">
                            <div class="col-5"></div>
                            <div class="col-7 ">
                                @if (Auth::check())
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle no-arrow" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <div>
                                                <img src="{{ asset(Auth::user()->profile_image) }}"
                                                    class="rounded-circle" alt="Circular Image" width="50"
                                                    height="50"> <br>
                                            </div>
                                            <div>
                                                <span class="text-white"> {{ Auth::user()->name }}</span>
                                            </div>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#">My Profile</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                        </ul>
                                    </div>
                                @else
                                    <a href="{{ route('signUp') }}" class="navbar-brand icon-size-signup">
                                        <div class="icon">
                                            <i class="bi bi-pencil-square icon-size"></i>
                                        </div>
                                        <span class="tex-icon-signup">Sign up</span>
                                    </a>
                                    <a href="{{ route('login') }}" class="navbar-brand icon-size-login">
                                        <div class="icon2">
                                            <i class="bi bi-box-arrow-in-right icon-size"></i>
                                        </div>
                                        <div>
                                            <span class="tex-icon-Login">Log in</span>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main class="flex-grow-1">
            @yield('content')
        </main>

        <footer>
            <nav class="navbar navbar-light bg-dark">
                <div class="row justify-content-between w-100">
                    <div class="col-4">
                        <a class="navbar-brand size-footer">
                            <img src="{{ URL::asset('storage/images/logo.jpg') }}" alt="profile Pic" height="140"
                                width="160">
                        </a>
                    </div>
                    <div class="col-8">
                        <div class="text-footer">
                            © COPYRIGHT ALL RIGHTS RESERVED.
                        </div>
                    </div>
                </div>
            </nav>
        </footer>
    </div>
</body>

</html>
