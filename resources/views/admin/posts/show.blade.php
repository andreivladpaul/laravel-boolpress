@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>{{ $post['title'] }}</h1>
        <p>{{ $post['content'] }}</p>
    </div>

    <div class="col-12">
            @if ($post->category)
                <small>This post belongs to: {{ $post->category->name }}
                </small>
            @endif
     </div>
</div>

@endsection

