@extends('layouts.dashboard')

@section('content')

        @include('layouts.status')
        @include('layouts.messages')

        <div class="row">
            <div class="col-12">
                <a class="btn btn-secondary" href="{{-- {{ route('admin.categories.create') }} --}}">Add New</a>
            </div>
        </div>
        <br>
 <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Slug</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category['id'] }}</th>
                <td><a href="{{ route('admin.categories.show', $category['slug']) }}">
                    {{ $category['name'] }}
                </a>

                    </td>
                <td>{!! $category['slug'] !!}</td>

                <td id="buttons">
                    <a href="{{-- {{ route('admin.categories.edit', $category->id) }} --}}"
                    class="btn btn-warning">
                        Modify
                    </a>
                    <form class="d-inline-block delete-category" method="category" action="{{-- {{ route('admin.posts.destroy', $post->id) }} --}}">
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
