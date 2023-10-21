@extends('layouts.client.index')
@section('title', 'Bài viết')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url('{{ asset('client') }}/images/bg_2.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Trang chủ <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Tin tức </span></p>
                    <h1 class="mb-0 bread">Tin tức</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex">
                @foreach ($posts as $item)
                    <div class="col-md-4 d-flex ftco-animate">
                        <x-card-post title="{{ $item->title }} " description="{{ $item->description }} "
                            slug="{{ $item->slug }}" day="{{ $item->created_at->format('d') }}"
                            years="{{ $item->created_at->format('Y') }}" month="{{ $item->created_at->format('M') }}"
                            cover="{{ $item->cover }}" />
                    </div>
                @endforeach

            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
