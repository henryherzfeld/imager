@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                <a href="{{route('wall')}}"><input type="button" class="btn-lg btn-primary" value="Wall"></a>

            </div>

            <div class="col-2">

                <a href="{{route('posts/create')}}"><input type="button" class="btn-lg btn-primary" value="New Post"></a>

            </div>
        </div>
    </div>
@endsection
