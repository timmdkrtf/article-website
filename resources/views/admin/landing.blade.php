<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Artikel</title>
    <link rel="icon" href="../../../assets/images/artikel-logo.png">
    <link rel="stylesheet" href="../../../assets/css/landing.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="font-family: 'Plus Jakarta Sans', sans-serif;">
    <style>
        #loading {
            display: flex;
            position: fixed;
            z-index: 100;
            width: 100%;
            height: 100%;
            color: white;
            background-image: url("../../../assets/images/background-loading.jpg");
            background-position: center;
            backdrop-filter: brightness(0.5);
            -webkit-backdrop-filter: brightness(0.5);
            margin: auto 0;
        }

        .screen-loading {
            display: none;
        }

        #loading .text-center {
            margin: 180px 0;
        }

        #loading .text-center .loading-bar {
            width: 200px;
        }

        #loading .text-center p {
            margin: 10px 0;
        }
    </style>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Contact Us</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Email: </li>
                        <li>No Hp: </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="loading">
        <div class="text-center">
            <img src="../../../assets/images/kelompok1.png" alt="" width="150px" height="150px"
                style="object-fit:cover">
            <p>Nama Main</p>
            <img class="loading-bar" src="../../../assets/images/loading.gif" alt="">
        </div>
    </div>
    <div class="screen-loading">
        <nav class="navbar navbar-expand-lg bg-body-light shadow-sm p-3 mb-2">
            <div class="container">
                <div class="d-flex">
                    <img src="../../../assets/images/artikel-logo.png" class="me-2" alt="logo-artikel" width="30px">
                    <a class="navbar-brand fst-italic fw-semibold m-0 p-0 d-block align-self-center"
                        style="font-size: 16px; margin-top: 10px;" href="#">Article-an Yuk!</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-size: 15px; margin-left: 20px;">
                        <li class="nav-item">
                            <a class="nav-link" href="https://dicoding.com" target="_blank">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Contact Us</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        @if (Auth::check())
                            <a href="/dashboard" class="btn btn-primary mx-2">Dashboard</a>
                            <a href="{{ route('logout') }}" class="btn btn-outline-primary">Logout</a>
                        @else
                            <a href="/login" class="btn btn-outline-primary">Login</a>
                        @endif
                    </form>
                </div>
            </div>
        </nav>

        <div class="shape-blue"></div>
        <div class="container">
            <div class="head-content d-flex justify-content-between mt-4 align-items-center">
                <h5 class="fw-bold mb-0">List Article</h5>
                <form action="/landing" method="GET" class="d-flex">
                    <a href="/landing" class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z" />
                            <path
                                d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466" />
                        </svg>
                    </a>
                    <input type="search" name="search" class="form-control search" placeholder="Search...">
                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="body-content row mt-3 w-100 gap-3 m-0">
                @foreach ($mains as $main)
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ $main->title }}
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($articlesDropdown[$main->title] as $article)
                                <li><a class="dropdown-item"
                                        href="show-landing/{{ $article->id }}">{{ $article->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                @if ($mains->isEmpty())
                    <div class="condition">
                        <p colspan="6">No article data was found.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        const wait = (delay = 0) =>
            new Promise(resolve => setTimeout(resolve, delay));

        const setVisible = (elementOrSelector, visible) =>
            (typeof elementOrSelector === 'string' ?
                document.querySelector(elementOrSelector) :
                elementOrSelector
            ).style.display = visible ? 'block' : 'none';

        setVisible('.screen-loading', false);
        setVisible('#loading', true);

        document.addEventListener('DOMContentLoaded', () =>
            wait(1000).then(() => {
                setVisible('.screen-loading', true);
                setVisible('#loading', false);
            }));
    </script>
</body>

</html>
