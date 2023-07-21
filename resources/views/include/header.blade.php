{{-- Header --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Demo Project</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('Images/Vector.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/u86ko7vyz355hmsu76jqehfauz9bynke5cxjhqyvg2qd77uj/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

</head>

<body>
    {{-- NavBar --}}

    <div class="container-fluid" style="background-color: #16222d; color:white ">
        <div>
            <div class="row pt-4 pb-2">

                <div class="col-lg-3 ps-5">
                    <a href="{{ route('home') }}" style="text-decoration: none; color: inherit;">
                        <img class="float-left" src="{{ asset('Images/logo.png') }}" alt="Logo" />
                    </a>
                </div>

                <div class="col-lg-9  pe-4">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="mx-auto">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><img height="40" width="40"
                                        src="Images/3306559.png" alt="Toggle" /></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse justify-content-center " id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                                </li>
                            </ul>
                        </div>
                        <div class="collapse navbar-collapse justify-content-end pt-3" id="navbarNav">
                            <ul class="navbar-nav">
                                @auth
                                    {{-- Show these links when the user is logged in --}}
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('userProfile') }}">
                                            <i class="fa fa-user" aria-hidden="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                </svg>
                                            </i> Profile
                                        </a>
                                    </li>
                                    {{-- Add other authenticated user-specific links here --}}
                                @else
                                    {{-- Show these links when the user is not logged in --}}
                                    <li class="nav-item pb-3">
                                        <a class="nav-link" href="{{ route('login') }}"
                                            style="background-color: #01baf9; color: #fff">{{ __('Login') }}</a>
                                    </li>
                                    <li class="nav-item pb-3">
                                        <a class="nav-link" href="{{ route('register') }}"
                                            style="background-color: #015feb; color: #fff">{{ __('Register') }}</a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
