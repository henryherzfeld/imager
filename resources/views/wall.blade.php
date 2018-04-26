@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @foreach ($posts as $post)

                    <div class="card mb-3" style="width: 30rem; height: 40rem;">
                        <img class="card-img-top" src="{{ url('storage/'.App\Post::find(Auth::user()->postID)->IMAGE_NAME) }}">
                        <div class="card-header">{{ $post->STATUS_TITLE }} > <div class="text-faded"> @ {{ $post->USER_USERNAME}}</div></div>
                        <div class="card-body">
                            <div class="lead-4"> {{ $post->STATUS_TEXT }}</div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
@endsection
