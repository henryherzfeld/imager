@extends('layouts/app')
@php
    $step =1;





@endphp
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">New Post</div>

                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="options" id="option1" onclick="" autocomplete="off" checked> Active
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" id="option2" autocomplete="off"> Radio
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" id="option3" autocomplete="off"> Radio
                        </label>
                    </div>
                    <div class="card-body">
                        <form action="/posts" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <input type="textarea" class="form-control" id="body" placeholder="">
                            </div>
                            <div class="form-group d-flex">
                                <div class="col-6">
                                    <button type="" class="btn btn-secondary" id="upload">
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-primary" type="submit">Post Now</button>
                                </div>
                            </div>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection