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
                    <form action="/posts/{{ Auth::user()->postID }}/caption" method="POST">
                        {{ csrf_field() }}
                        <div class="btn-toolbar mb-3" role="toolbar">
                            <div class="btn-group mr-2" role="group">
                                <button type="submit" class="btn btn-secondary">Upload</button>
                                <button type="submit" class="btn btn-secondary">Filter</button>
                                <button type="submit" class="btn btn-secondary active">Caption</button>
                            </div>
                        </div>
                        <div class="card mb-3" style="width: 30rem;">
                            <img class="card-img-top" src="{{ url('storage/'.App\Post::find(Auth::user()->postID)->IMAGE_NAME) }}">
                            <div class="card-header">Caption & Verify</div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Status Title: </label>
                                        <input type="text" class="form-control w-75" id="title" name="title" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="body">More:</label>
                                        <textarea class="form-control" id="body" name="body"></textarea>
                                    </div>
                                    <div class="form-group d-flex">
                                        <div class="col-9">
                                        </div>
                                        <div class="col-3">
                                            <button type="submit" class="btn btn-primary">Post Now!</button>
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