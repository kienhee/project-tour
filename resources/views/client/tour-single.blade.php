@extends('layouts.client.index')
@section('title', $tour->title)
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ $tour->cover }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Trang chủ <i
                                    class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="/">Chuyến
                                đi
                                <i class="fa fa-chevron-right"></i></a></span> <span>{{ $tour->title }}</p>
                    <h1 class="mb-0 bread"> {{ $tour->title }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate py-md-5 mt-md-5">
                    {!! $tour->content !!}
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate bg-light py-md-5">
                    <div class="sidebar-box pt-md-5">
                        <h3 class="text-center">Giá từ: <p class="text-primary">{{ number_format($tour->price_small) }} -
                                {{ number_format($tour->price_large) }}VND / Người
                            </p>
                        </h3>
                        <a href="{{ route('client.book-tour', $tour->slug) }}" class="btn btn-primary w-100 btn-lg">Đặt
                            tour</a>
                    </div>
                    <hr>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="mb-4">Danh sách liên quan</h3>
                        <div class="row">
                            @foreach ($related as $item)
                                <div class="col-md-12 mb-5 ftco-animate">
                                    <x-card-tour slug="{{ $item->slug }}"
                                        nightOfDay="{{ nightOfDay($item->date_of_department, $item->return_date) }}"
                                        title="{{ $item->title }}" price="{{ $item->price_large }}"
                                        cover="{{ $item->cover }}" startingPoint="{{ $item->starting_point }}"
                                        dateOfDepartment="{{ $item->date_of_department->format('d/m/Y h:m A') }}"
                                        amountOfPeople="{{ $item->amount_of_people }}" avaiable="{{ $item->avaiable }}" />
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> <!-- .section -->

@endsection
