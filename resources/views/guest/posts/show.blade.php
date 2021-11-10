@extends('layouts.app')

@section('bg-img',asset('img/post-bg.jpg'))

@section('title', 'Boolpress Posts')


@section('content')


            <div class=" px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">


                            <div class="post-preview">

                                    <h1 class="post-title">{{ $post['title'] }}</h1>

                                    <p>{{ $post['content'] }}</p>


                                <small class="post-meta">
                                    Posted by on {{ $post['created_at'] }}
                                </small>
                            </div>
                            <!-- Divider-->
                            <hr class="my-4" />

                    </div>
                </div>
            </div>
@endsection
