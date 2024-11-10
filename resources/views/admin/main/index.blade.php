@extends('admin.layout')
@section('content')
    @php
        $pagenumber = request()->has('page') ? request()->page : 1;
        $itemperpage = 5;
        $count = ($pagenumber - 1) * $itemperpage;
    @endphp

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('create-main.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Logo Title</label>
                            <input type="file" name="logo" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                            <li class="breadcrumb-item active" aria-current="page">Title</li>
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
                    <h4 class="mb-0"><b>Data Title</b></h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Title
                    </button>
                </div>
                <div style="overflow-x:auto;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mains as $main)
                            <tr>
                                <th scope="row">{{ $count + $loop->iteration }}</th>
                                <td>{{ str_replace('-', ' ', $main->title) }}</td>
                                <td><img src="{{ asset('logo-main/' . $main->logo) }}" alt="{{ $main->title }}"
                                        width="100px" height="100px"></td>
                                <td>
                                    <a href="{{ route('landing.user', $main->title) }}" class="btn btn-secondary"><i
                                            class="ti ti-eye fs-5"></i></a>
                                    <a href="{{ route('delete-main', $main->id) }}" class="btn btn-danger"><i
                                            class="ti ti-trash fs-5"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @if ($mains->isEmpty())
                            <tr class="condition text-center">
                                <td colspan="4">No title data was found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
                {{ $mains->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endsection
