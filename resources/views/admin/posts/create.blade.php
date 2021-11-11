@extends('layouts.dashboard')

@section('content')

    {{-- Error Messagges --}}
    @include('layouts.messages')

<div class="row">
    <div class="col-12">
        <h1>Write a New Post</h1>
        <form action="{{ route('admin.posts.store') }}" method="post">
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
            {{-- CATEGORY --}}
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id">
                    <option value="">--  Select category --</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : null }}>{{ $category->name }}
                    </option>

                    @endforeach
                </select>
            </div>
            {{-- TAGS --}}
            <div class="form-group">
                <p>Select tags: </p>

                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ 'tag' . $tag->id }}" class="form-check-input"

                        {{ in_array($tags->id, old('tags', [])) ? 'checked' : null) }}>
                        {{-- label --}}
                        <label for="{{ 'tag' . $tag->id }}" class="form-check-label">{{ $tag->name }}</label>
                    </div>
                @endforeach

            {{--
                name = tag[] because it is an array containing more than one
                id = 'tag' . $tag->id so i can concatenate the id from $tag
            --}}
            </div>
            <br>
            <div class="row">
                <div class="col-12 form-group">
                    <button class="btn btn-success" href="{{ route('admin.posts.index') }}">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection

