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
<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-wrap-1 ftco-animate">
                    <form action="#" class="search-property-1">
                        <div class="row no-gutters">
                            <div class="col-lg-10 d-flex">
                                <div class="form-group p-4 border-0">
                                    <label for="keywords">Tìm kiếm tên bài viết</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="fa fa-search"></span></div>
                                        <input type="text" class="form-control" id="keywords" name="keywords"
                                            placeholder="Tìm kiếm tên bài viết" value="{{ Request()->keywords }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-2 d-flex">
                                <div class="form-group d-flex w-100 border-0">
                                    <div class="form-field w-100 align-items-center d-flex">
                                        <input type="submit" value="Tìm kiếm"
                                            class="pl-0 align-self-stretch form-control btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
                    {{ $posts->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection