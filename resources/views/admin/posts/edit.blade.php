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
            {{-- TAGS --}}
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    <option value="">--  Select category --</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $category->id) == $category->id ? 'selected' : null }}> {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- TAGS --}}
            <div class="form-group">
                <p>Select tags: </p>

                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        @if ($errors->any())
                        <input
                            {{ in_array($tags->id, old('tags', [])) ? 'checked' : null }}

                            type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ 'tag' .  $tag->id }}" class="form-check-input">
                        @else

                        <input
                            {{  ($post->tags->contains($tag) ? 'checked' : null) }}
                            type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ 'tag' . $tag->id }}" class="form-check-input">

                        @endif


                        <label for="{{ 'tag' . $tag->id }}" class="form-check-label">{{ $tag->name }}</label>
                    </div>
                @endforeach

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
