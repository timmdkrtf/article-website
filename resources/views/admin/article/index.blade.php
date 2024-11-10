@extends('admin.layout')
@section('content')
    @php
        $pagenumber = request()->has('page') ? request()->page : 1;
        $itemperpage = 5;
        $count = ($pagenumber - 1) * $itemperpage;
    @endphp

    <link rel="stylesheet" href="../../../assets/css/article.css">

    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <nav aria-label="breadcrumb" class="pt-3 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Article</li>
                        </ol>
                    </nav>
                </ul>
            </nav>
        </header>
        <!--  Header End -->
        <div class="container-fluid">
            <!--  Row 1 -->
            <div class="row">
                <div class="judul d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><b>Data Article</b></h4>
                    <div class="d-flex">
                        <form action="/article" method="GET" class="d-flex mx-2 search">
                            <a href="/article" class="btn">
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
                        <a href="/create-article" class="btn btn-primary">Add Article</a>
                    </div>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/create-article"><i class="ti ti-plus fs-5 mx-2"></i>Add
                                Article</a></li>
                    </ul>
                </div>
                <div style="overflow-x:auto;">
                <table class="table table-hover w-100">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Article Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Article Name</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <th scope="row">{{ $count + $loop->iteration }}</th>
                                <td>{{ $article->main->title }}</td>
                                <td>{{ $article->category->category }}</td>
                                <td class="text-break" style="max-width: 35%">{{ $article->title }}</td>
                                <td><img src="{{ asset('cover/' . $article->cover) }}" style="object-fit: cover" alt="{{ $article->title }}"
                                        width="100px" height="100px"></td>
                                <td>
                                    <a href="show-article/{{ $article->id }}" class="btn btn-primary button-see"><i
                                            class="ti ti-eye fs-5"></i></a>
                                    <a href="{{ route('edit-article', $article->id) }}"
                                        class="btn btn-secondary button-edit"><i class="ti ti-pencil fs-5"></i></a>
                                    <a href="{{ route('delete-article', $article->id) }}"
                                        class="btn btn-danger button-delete"><i class="ti ti-trash fs-5"></i></a>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ti ti-dots fs-5"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="show-article/{{ $article->id }}"><i
                                                        class="ti ti-eye fs-5 mx-2"></i>See</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('edit-article', $article->id) }}"><i
                                                        class="ti ti-pencil fs-5 mx-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item"
                                                    href="{{ route('delete-article', $article->id) }}"><i
                                                        class="ti ti-trash fs-5 mx-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @if ($articles->isEmpty())
                            <tr class="condition text-center">
                                <td colspan="8">No article data was found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
                {{ $articles->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endsection
