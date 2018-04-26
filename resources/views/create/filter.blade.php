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

    <style>
        .blur {
            filter: blur(4px);
        }

        .sepia{
        filter: sepia(50%);
        }

        .saturate{
          filter: saturate(20%);
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav>
                    <form action="/{{env('APP_PATH')}}/posts/{{ Auth::user()->postID }}/filter" method="POST">
                        {{ csrf_field() }}
                        <div class="btn-toolbar mb-3" role="toolbar">
                            <div class="btn-group mr-2" role="group">
                                <button type="submit" class="btn btn-secondary">Upload</button>
                                <button type="submit" class="btn btn-secondary active">Filter</button>
                                <button type="submit" class="btn btn-secondary @if(!isset($post->STATUS_TITLE)) disabled @endif">Caption</button>
                            </div>
                        </div>
                <div class="card mb-3" style="width: 30rem;">
                    <img class="card-img-top sepia blur saturate" src="/~hherzfeld2014/p7/public/storage/{{ $post->IMAGE_NAME }}">
                    <div class="card-header">Choose Filter(s)</div>
                    <div class="card-body">
                        <div class="form-group d-flex">
                            <div class="col-9">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary">
                                        <input onclick="$('img').toggleClass('sepia')" type="checkbox" checked autocomplete="off"> Sepia
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input onclick="$('img').toggleClass('blur')" type="checkbox" checked autocomplete="off"> Blur
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input onclick="$('img').toggleClass('saturate')" type="checkbox" checked autocomplete="off"> Saturate
                                    </label>
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