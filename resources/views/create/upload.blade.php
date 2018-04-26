@extends('layouts/app')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error</strong>:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav>
                    {{--<form action="/posts/show" method="POST" enctype="multipart/form-data">--}}
                    <form action="/posts/{{ Auth::user()->postID }}/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="btn-toolbar mb-3" role="toolbar">
                            <div class="btn-group mr-2" role="group">
                                <button type="button" class="btn btn-secondary active">Upload</button>
                                <button type="submit" class="btn btn-secondary @if(!isset($post->IMAGE_FILTER)) disabled @endif">Filter</button>
                                <button type="submit" class="btn btn-secondary @if(!isset($post->STATUS_TITLE)) disabled @endif">Caption</button>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">Upload Image</div>
                            <div class="card-body">
                                <div class="form-group d-flex">
                                    <div class="col-9">
                                        <div class="input">
                                            <input type="file" name="filename" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-primary">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </nav>
            </div>
        </div>
    </div>

@endsection