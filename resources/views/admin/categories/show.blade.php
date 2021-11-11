@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>
            {{ $category['name'] }}</h1>
        <p>{{ $category['slug'] }}</p>
    </div>
    <br>
    <div class="col-12">
       <h2>Linked Posts</h2>

       @foreach ($category->posts as $post)
          <li>
            <a href="{{ route('admin.posts.show', $post->slug) }}">
                {{ $post->title }}
            </a>
        </li>
       @endforeach
    </div>
</div>

@endsection
