<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $main->title }}</title>
    <link rel="icon" href="{{ asset('logo-main/' . $main->logo) }}">
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

<body
    style="font-family: 'Plus Jakarta Sans', sans-serif; background-image: url(../../../assets/images/akrilik-back.png)">
    <style>
        #loading {
            display: flex;
            position: fixed;
            z-index: 5 !important;
            width: 100%;
            height: 100%;
            color: white;
            background-image: url("../../../assets/images/background-loading.jpg");
            background-position: center;
            backdrop-filter: brightness(0.5);
            -webkit-backdrop-filter: brightness(0.5);
            margin: auto 0;
        }

        #loading2{
            display: none;
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
        <div class="alert alert-danger m-3" style="width: fit-content; margin:auto; left: 0;" role="alert">
            Please check your connection...
          </div>
        <div class="text-center">
            <img id="img" src="{{ asset('logo-main/' . $main->logo) }}" alt="" width="150px" height="150px"
                style="object-fit:cover">
            <p id="text">{{ str_replace('-', ' ', $main->title) }}</p>
            <img class="loading-bar" src="../../../assets/images/loading.gif" alt="">
        </div>
    </div>
    <div id="loading2" class="bg-light" style="display: block;"></div>
    <div class="screen-loading">
        <nav class="navbar navbar-expand-lg bg-body-light shadow-sm p-3 mb-2"
            style="backdrop-filter: blur(5px); -webkit-backdrop-filter: blur(5px); ">
            <div class="container">
                <div class="d-flex">
                    <img src="{{ asset('logo-main/' . $main->logo) }}" class="me-2" alt="logo-artikel" width="30px">
                    <a class="navbar-brand fst-italic fw-semibold m-0 p-0 d-block align-self-center"
                        style="font-size: 16px; margin-top: 10px;"
                        href="#">{{ str_replace('-', ' ', $main->title) }}</a>
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
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="head-content d-flex justify-content-between mt-4 align-items-center">
                <h5 class="fw-bold mb-0">List Article</h5>
                <form action="{{ route('landing.user', $main->title) }}" method="GET" class="d-flex">
                    <a href="{{ route('landing.user', $main->title) }}" class="btn">
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
            <div class="body-content row mt-3 w-100 gap-2 m-0 d-flex">
                @if ($articles)
                    @foreach ($articles as $article)
                    <a class="col-12 col-sm-5 col-lg-4 text-decoration-none text-dark" href="{{ route('show.article.user', $article->id) }}" style="height: 100px;">
                        <div class="text-light rounded border-bottom border-2" style="background-image: url('{{ asset('cover/' . $article->cover) }}'); background-repeat: no-repeat; background-position: top; background-size: cover;">
                            <div class="p-2" style="background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(56,56,77,0.05646008403361347) 64%, rgba(74,74,74,0.05646008403361347) 100%);">
                                <h5 style="text-shadow: 0px 0px 50px rgba(0,0,0,1); width: 100%; text-overflow:ellipsis; overflow: hidden;">{{ $article->title }}</h5>
                                <small>Kategori: {{ $article->category->category }}</small>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    @if ($articles->isEmpty())
                        <div class="condition">
                            <p colspan="6">No article data was found.</p>
                        </div>
                    @endif
                @else
                    <div class="condition">
                        <p>No article data was found.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
<script>
    // Function to wait for a specified duration
    const wait = (delay = 0) =>
        new Promise(resolve => setTimeout(resolve, delay));

    // Function to set visibility of an element
    const setVisible = (elementOrSelector, visible) =>
        (typeof elementOrSelector === 'string' ?
            document.querySelector(elementOrSelector) :
            elementOrSelector
        ).style.display = visible ? 'block' : 'none';

    // Function to check internet connection
    const checkInternetConnection = () => {
        const isOnline = navigator.onLine;
        return isOnline;
    };

    // Function to reload the page
    const reloadPage = () => {
        document.location.reload(true);
    };

    // When the DOM content is loaded
    document.addEventListener('DOMContentLoaded', async () => {
        const isOnline = checkInternetConnection();

        setVisible('.alert-danger', false); // Initially hide alert

        if (!isOnline) {
            setVisible('.screen-loading', true);
            setVisible('#loading', true);
            setVisible('#loading2', false);
            setVisible('.alert-danger', true); // Display alert if offline
        } else {
            // Check if the page has already been loaded
            const isPageLoaded = sessionStorage.getItem('pageLoaded');

            if (!isPageLoaded) {
                setVisible('.screen-loading', false);
                setVisible('#loading', true);
                setVisible('#loading2', false);

                await wait(2000);

                setVisible('.screen-loading', true);
                setVisible('#loading', false);
                setVisible('#loading2', false);

                // Mark the page as loaded
                sessionStorage.setItem('pageLoaded', true);
            } else {
                setVisible('#loading', false);
                setVisible('#loading2', true);
                setVisible('.alert', false);
                setVisible('#img', false);
                setVisible('#text', false);
                setVisible('.loading-bar', false);

                await wait(800);

                setVisible('.screen-loading', true);
            }
        }
    });

    // Periodically check for internet connection
    setInterval(() => {
        const isOnline = checkInternetConnection();
        if (!isOnline) {
            reloadPage(); // Reload the page if connection lost
        }
    }, 100000); // Check every 5 seconds

    // Add event listener for online/offline status change
    window.addEventListener('online', () => {
        reloadPage();
    });

    window.addEventListener('offline', () => {
        reloadPage();
    });
</script>




</body>

</html>
