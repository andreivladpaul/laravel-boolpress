
@extends('layouts.dashboard')

@section('content')

    {{-- @foreach ($posts as $post)
        {{-- <p>
           <a href="{{ route('posts.show', $post['slug']) }}">{{ $post['title'] }}</a>
        </p> --}}

        @include('layouts.status')
        @include('layouts.messages')

        <div class="row">
            <div class="col-12">
                <a class="btn btn-secondary" href="{{ route('admin.posts.create') }}">Add New</a>
            </div>
        </div>
        <br>
 <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Category</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <th scope="row">{{ $post['id'] }}</th>
                <td><a href="{{ route('admin.posts.show', $post['slug']) }}">{{ $post['title'] }}</a></td>
                <td>{!! $post['slug'] !!}</td>

                <td>
                    @if ($post->category)
                    {{ $post->category->name }}
                    @endif
                </td>


                <td id="buttons">
                    <a href="{{ route('admin.posts.edit', $post->id) }}"
                        class="btn btn-warning">
                        Modify
                    </a>
                    <form class="d-inline-block delete-post" method="post" action="{{ route('admin.posts.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
