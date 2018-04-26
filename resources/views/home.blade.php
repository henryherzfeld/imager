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

                <button type="button" href="{{route('posts/create')}}" class="btn btn-primary">Post Now!</button>

            </div>

            <div class="col-2">

                <button type="button" href="{{route('wall')}}" class="btn btn-primary">Wall</button>

            </div>
        </div>
    </div>
@endsection
