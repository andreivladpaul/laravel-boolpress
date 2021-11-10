@extends('layouts.dashboard')

@section('content')
    @include('layouts.status')
    @include('layouts.messages')
<div class="row">
    <div class="col-12">
        <h1>Modify post</h1>
        <form action="{{ route('admin.posts.update',$post->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ ($post->title) }}">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control" name="content" id="content" >{{ ($post->content) }}</textarea>
            </div>
            <br>
            <div class="row">
                <div class="col-12 form-group">
                    <button class="btn btn-success" href="{{ route('admin.posts.create') }}">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
