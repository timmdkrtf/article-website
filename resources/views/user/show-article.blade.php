<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $article->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
</head>

<body style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <div class="container p-4">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-end mb-4 mt-4">
                    <a href="{{ route('landing.user', $article->main->title) }}" class="btn btn-danger ">Back</a>
                    <div class="w-75 text-center">
                        <h4 class="text-break">{{ $article->title }}</h4>
                    </div>
                    <p class="mb-0 text-secondary fst-italic" style="font-size: 13px;">Article No.
                        {{ $article->id }}...</p>
                </div>
                <div class="rounded p-2 border border" style="height: 100%">
                    {!! $article->desc !!}
                </div>


            </div>
        </div>
    </div>
</body>

</html>
