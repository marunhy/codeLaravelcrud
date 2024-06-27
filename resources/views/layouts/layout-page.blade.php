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
    {{-- link fon lato --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    {{-- link font Noto --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    {{-- link font montserrat --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('js/user.js') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts.css') }}">
    <title>Document</title>
</head>

<body class="reduce-width">
    <header>
        <div class="container-fluid">
            <div class="row title-header align-items-center"> <!-- Added align-items-center class -->
                <div class="col-6 col-md-2 header-logo">
                    <a href="{{ route('indexpost') }}">
                        <p class="text-myblog">MY BLOG</p>
                    </a>
                </div>
                <div class="col-md-8 header-menu">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse custom-banner justify-content-center" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Hotel Experiences</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Best travel places</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Cheap traveling ideas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Wildlife Safari</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Best Street food</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-6 col-md-2 header-button">
                    @if (Auth::check())
                        @if (Auth::user()->isReader() || Auth::user()->isWriter())
                            <div class="dropdown">
                                <button class="btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <div>
                                        <img src="{{ asset(Auth::user()->profile_image) }}" class="rounded-circle"
                                            alt="Circular Image" width="50" height="50"> <br>
                                    </div>
                                    <div>
                                        <span class="text-name-user"> {{ Auth::user()->name }}</span>
                                    </div>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="">My Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Manage</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </div>
                        @elseif (Auth::user()->isSuperAdmin() || Auth::user()->isSubAdmin())
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">Admin</a>
                            <a href="{{ route('logout') }}" class="btn btn-primary">logout</a>

                        @endif
                    @else
                        <div class="button-login">
                            <a href="{{ route('login') }}">Login</a>
                        </div>
                        <div class="button-signup">
                            <a href="{{ route('signUp') }}">Sign up</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <div class="custome-hr-header">
        <hr>
    </div>

    <main class="flex-grow-1">
        @yield('pagepost')
    </main>
    <footer>
        <div class="container-fluid title-footer">
            <div class="search-footer">
                <div class="title-sub-footer">
                    <p class="text-sub-footer">Subscribe and join thousands like you!</p>
                    <div class="item-search-footer">
                        <div class="item-search-sub-footer d-flex justify-content-center">
                            <input class="text-sub" type="text" placeholder="Vinay@business.com">
                        </div>
                        <div class="item-button-search-footer" onclick="subscribe()">
                            <p class="text-but-sub">Subscribe</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row contacts-title-footer">
                    <div class="col-12 col-md-4 footer-title-contact">
                        <p class="title-text-contact">CONTACTS</p>
                        <p class="text-adress-contact">25 Rayna Park, <br> Don Bausch Road, India</p>
                        <div class="contact-phone-number">
                            <i class="bi bi-telephone-fill"></i>
                            <p class="text-contact">9080000000</p>
                        </div>
                        <div class="contact-phone-number">
                            <i class="bi bi-envelope-fill"></i>
                            <p class="text-contact">info@myblog.com</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 footer-title-popular">
                        <p class="title-text-contact">Popular</p>
                        <p class="item-text-Popular">Free Travel videos</p>
                        <p class="item-text-Popular">Maps</p>
                        <p class="item-text-Popular">Hotel contact book</p>
                    </div>
                    <div class="col-12 col-md-4 footer-right">
                        <div class="title-contact-us">
                            Contact Us
                        </div>
                        <div class="title-follow-us">
                            <p class="text-follow">Follow Us</p>
                            <div class="title-block"></div>
                            <div class="title-block"></div>
                            <div class="title-block"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
