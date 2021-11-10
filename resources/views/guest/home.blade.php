@extends('layouts.app')

@section('bg-img',asset('img/home-bg.jpg'))

@section('title', 'Boolpress Posts')


@section('content')
    @foreach ($posts as $post)

            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <!-- Post preview-->
                        @foreach ($posts as $post)
                            <div class="post-preview">
                                <a href="{{route('posts.show', $post->slug) }}">
                                    <h1 class="post-title">{{ $post['title'] }}</h1>
                                </a>
                                <h6 class="post-meta">
                                    Posted by on {{ $post['created_at'] }}
                                </h6>
                            </div>
                            <!-- Divider-->
                            <hr class="my-4" />
                        @endforeach


                    </div>
                </div>
            </div>

    @endforeach

@endsection
