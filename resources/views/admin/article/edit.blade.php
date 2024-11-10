@extends('admin.layout')
@section('content')
    <link rel="stylesheet" href="../../../assets/css/article.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <style>
        .modal-header{
            justify-content: start;
            gap: 10px;
        }
    </style>

    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header" style="top: 0; padding: 0 0 0 10px;">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <nav aria-label="breadcrumb" class="nav-edit">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/article">Article</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
                        </ol>
                    </nav>
                </ul>
            </nav>
        </header>
        <!--  Header End -->
        <div class="container-fluid mt-4">
            <!--  Row 1 -->
            <div class="row">
                {{-- <div class="container p-4 "> --}}
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <form action="{{ route('edit-article.put', $article->id) }}" method="post" class="mt-3"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Article name:</label>
                                <input type="text" class="form-control" name="title" value="{{ $article->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Article Title:</label>
                                <select class="form-select" name="main_id" style="font-size:15px;">
                                    <option selected>--</option>
                                    @foreach ($mains as $main)
                                        <option value="{{ $main->id }}"
                                            {{ $main->id == $article->main_id ? 'selected' : '' }}>{{ $main->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Category:</label>
                                <select class="form-select" name="category_id" style="font-size:15px;">
                                    <option selected>--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $article->category_id ? 'selected' : '' }}>
                                            {{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Cover Title:</label>
                                <input type="file" class="form-control" name="cover">
                                <input type="hidden" name="current_cover" value="{{ $article->cover }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description:</label>
                                <textarea name="desc" id="description" cols="30" rows="10">{{ $article->desc }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
                {{-- </div> --}}


                <script>
                    $('#description').summernote({
                        placeholder: 'description...',
                        tabsize: 2,
                        height: 300
                    });
                </script>
                <script>
                    // Set the value of input file with the current cover name
                    document.getElementById("cover").addEventListener("change", function() {
                        var currentCover = "{{ $article->cover }}";
                        if (currentCover) {
                            var input = this;
                            input.setAttribute("data-default", input.value);
                            input.value = currentCover;
                        }
                    });
                </script>
            </div>
        </div>
    @endsection
