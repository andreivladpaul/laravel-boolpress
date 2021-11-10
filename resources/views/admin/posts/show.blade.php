@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>{{ $post['title'] }}</h1>
        <p>{{ $post['content'] }}</p>
    </div>
</div>

@endsection

