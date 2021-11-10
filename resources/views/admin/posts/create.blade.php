@extends('layouts.dashboard')

@section('content')

    @include('layouts.status')
    @include('layouts.messages')
<div class="row">
    <div class="col-12">
        <h1>Write a New Post</h1>
        <form action="{{ route('posts.store') }}" method="post">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="{{ old('title') }}" class="form-control" name="title" id="title">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control" value="{{ old('content') }}" name="content" id="content"></textarea>
            </div>
            <br>
            <div class="row">
                <div class="col-12 form-group">
                    <button class="btn btn-success" href="{{ route('posts.create') }}">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection

