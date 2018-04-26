@extends('layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">

                @foreach ($posts as $post)

                    <div class="card mb-3" style="width: 30rem; height: 40rem;">
                        <img class="card-img-top border border-light border-bottom-0 rounded" src="~hherzfeld2014/p7/public/storage/{{ $post->IMAGE_NAME }}">
                        <div class="align-top">
                            <div class="card-header text-info bg-light border border-top-0 border-bottom-0 border-light rounded">{{ $post->STATUS_TITLE }} <div class="text-muted text-right"> @
                                    {{ $post->USER_USERNAME}}</div></div>
                        </div>
                        <div class="card-body border border-top-0 border-bottom-0 border-light rounded">
                            <div class="text-dark"> {{ $post->STATUS_TEXT }}</div>
                        </div>

                        <div class="card-footer">
                            <div class="text-dark text-center"> <i class="fas fa-clock"></i> {{$post->updated_at}}</div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
@endsection
