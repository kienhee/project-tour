@extends('layouts.client.index')
@section('title', $blog->title)
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ $blog->cover }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="/">Blog
                                <i class="fa fa-chevron-right"></i></a></span>
                        <span>{{ $blog->title }}</span>
                    </p>
                    <h1 class="mb-0 bread">{{ $blog->title }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate py-md-5 mt-md-5">
                    {!! $blog->content !!}
                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            @foreach (explode(',', $blog->tags) as $tag)
                                <a href="{{ $tag }}" class="tag-cloud-link">#{{ $tag }}</a>
                            @endforeach

                        </div>
                    </div>



                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate bg-light py-md-5">
                    <div class="sidebar-box pt-md-5">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon fa fa-search"></span>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                    </div>


                    <div class="sidebar-box ftco-animate">
                        <h3>Bài viết gần đây</h3>
                        @foreach ($recentBlog as $item)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url('{{ $item->cover }}');"></a>
                                <div class="text">
                                    <h3 class="heading"><a
                                            href="{{ route('client.blog-detail', $item->slug) }}">{{ $item->title }}</a>
                                    </h3>
                                    <div class="meta">
                                        <div><a href="{{ route('client.blog-detail', $item->slug) }}"><span
                                                    class="fa fa-calendar"></span>
                                                {{ $item->created_at }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Tag Cloud</h3>
                        <div class="tagcloud">
                            @foreach ($tags as $tag)
                                <a href="{{ $tag->name }}" class="tag-cloud-link">#{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section> <!-- .section -->



@endsection
