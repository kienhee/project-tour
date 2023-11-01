@extends('layouts.client.index')
@section('title', 'Trang chủ')
@section('content')
    <div class="hero-wrap js-fullheight"
        style="background-image: url('https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&q=80&w=2074&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <span class="subheading">Welcome to Pacific</span>
                    <h1 class="mb-4">Khám phá địa điểm yêu thích của bạn với chúng tôi</h1>
                    <p class="caps">Du lịch đến mọi nơi trên thế giới mà không phải đi lòng vòng</p>
                </div>
                <a href="https://vimeo.com/45830194"
                    class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                    <span class="fa fa-play"></span>
                </a>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ftco-search d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-12 nav-link-wrap">
                                <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill"
                                        href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Tìm
                                        kiếm
                                        chuyến đi của bạn</a>

                                    <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2"
                                        role="tab" aria-controls="v-pills-2" aria-selected="false">Hotel</a>

                                </div>
                            </div>
                            <div class="col-md-12 tab-wrap">

                                <div class="tab-content" id="v-pills-tabContent">

                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                        aria-labelledby="v-pills-nextgen-tab">
                                        <form action="{{ route('client.tour') }}" class="search-property-1">
                                            <div class="row no-gutters">
                                                <div class="col-lg d-flex">
                                                    <div class="form-group p-4 border-0">
                                                        <label for="#">Tên chuyến đi</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-search"></span></div>
                                                            <input type="text" class="form-control" name="keywords"
                                                                placeholder="Tìm kiếm chuyến đi"
                                                                value="{{ Request()->keywords }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="date_of_department">Khởi hành</label>
                                                        <div class="form-field">
                                                            <input type="date" class="form-control pl-0"
                                                                id="date_of_department" name="date_of_department"
                                                                value="{{ Request()->date_of_department }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-lg d-flex">
                                                <div class="form-group p-4">
                                                    <label for="return_date">Quay về</label>
                                                    <div class="form-field">
                                                        <input type="date" class="form-control pl-0" id="return_date"
                                                            name="return_date" value="{{ Request()->return_date }}">
                                                    </div>
                                                </div>
                                            </div> --}}
                                                <div class="col-lg d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="price">Khoảng giá</label>
                                                        <div class="form-field">
                                                            <div class="select-wrap">
                                                                <div class="icon"><span class="fa fa-chevron-down"></span>
                                                                </div>
                                                                <select name="price" id="price" class="form-control">
                                                                    <option value="">Tất cả</option>
                                                                    <option value="100000"
                                                                        @if (Request()->price == '100000') @selected(true) @endif>
                                                                        100.000vnd</option>
                                                                    <option value="200000"
                                                                        @if (Request()->price == '200000') @selected(true) @endif>
                                                                        200.000vnd</option>
                                                                    <option value="300000"
                                                                        @if (Request()->price == '300000') @selected(true) @endif>
                                                                        300.000vnd</option>
                                                                    <option value="400000"
                                                                        @if (Request()->price == '400000') @selected(true) @endif>
                                                                        400.000vnd</option>
                                                                    <option value="500000"
                                                                        @if (Request()->price == '500000') @selected(true) @endif>
                                                                        500.000vnd</option>
                                                                    <option value="600000"
                                                                        @if (Request()->price == '600000') @selected(true) @endif>
                                                                        600.000vnd</option>
                                                                    <option value="700000"
                                                                        @if (Request()->price == '700000') @selected(true) @endif>
                                                                        700.000vnd</option>
                                                                    <option value="800000"
                                                                        @if (Request()->price == '800000') @selected(true) @endif>
                                                                        800.000vnd</option>
                                                                    <option value="900000"
                                                                        @if (Request()->price == '900000') @selected(true) @endif>
                                                                        900.000vnd</option>
                                                                    <option value="1000000"
                                                                        @if (Request()->price == '1000000') @selected(true) @endif>
                                                                        1.000.000vnd</option>
                                                                    <option value="2000000"
                                                                        @if (Request()->price == '2000000') @selected(true) @endif>
                                                                        2.000.000vnd</option>
                                                                    <option value="3000000"
                                                                        @if (Request()->price == '3000000') @selected(true) @endif>
                                                                        3.000.000vnd</option>
                                                                    <option value="4000000"
                                                                        @if (Request()->price == '4000000') @selected(true) @endif>
                                                                        4.000.000vnd</option>
                                                                    <option value="5000000"
                                                                        @if (Request()->price == '5000000') @selected(true) @endif>
                                                                        5.000.000vnd</option>
                                                                    <option value="6000000"
                                                                        @if (Request()->price == '6000000') @selected(true) @endif>
                                                                        6.000.000vnd</option>
                                                                    <option value="7000000"
                                                                        @if (Request()->price == '7000000') @selected(true) @endif>
                                                                        7.000.000vnd</option>
                                                                    <option value="8000000"
                                                                        @if (Request()->price == '8000000') @selected(true) @endif>
                                                                        8.000.000vnd</option>
                                                                    <option value="9000000"
                                                                        @if (Request()->price == '9000000') @selected(true) @endif>
                                                                        9.000.000vnd</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="destination">Địa điểm</label>
                                                        <div class="form-field">
                                                            <div class="select-wrap">
                                                                <div class="icon"><span
                                                                        class="fa fa-chevron-down"></span>
                                                                </div>
                                                                <select name="destination" id="destination"
                                                                    class="form-control">
                                                                    <option value="">Tất cả</option>
                                                                    @foreach (getAllDestination() as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ Request()->destination == $item->id ? 'selected' : '' }}>
                                                                            {{ $item->name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg d-flex">
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

                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel"
                                        aria-labelledby="v-pills-performance-tab">
                                        <form action="#" class="search-property-1">
                                            <div class="row no-gutters">
                                                <div class="col-lg d-flex">
                                                    <div class="form-group p-4 border-0">
                                                        <label for="#">Destination</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-search"></span></div>
                                                            <input type="text" class="form-control"
                                                                placeholder="Search place">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="#">Check-in date</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-calendar"></span></div>
                                                            <input type="text" class="form-control checkin_date"
                                                                placeholder="Check In Date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="#">Check-out date</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-calendar"></span></div>
                                                            <input type="text" class="form-control checkout_date"
                                                                placeholder="Check Out Date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="#">Price Limit</label>
                                                        <div class="form-field">
                                                            <div class="select-wrap">
                                                                <div class="icon"><span
                                                                        class="fa fa-chevron-down"></span>
                                                                </div>
                                                                <select name="" id=""
                                                                    class="form-control">
                                                                    <option value="">$100</option>
                                                                    <option value="">$10,000</option>
                                                                    <option value="">$50,000</option>
                                                                    <option value="">$100,000</option>
                                                                    <option value="">$200,000</option>
                                                                    <option value="">$300,000</option>
                                                                    <option value="">$400,000</option>
                                                                    <option value="">$500,000</option>
                                                                    <option value="">$600,000</option>
                                                                    <option value="">$700,000</option>
                                                                    <option value="">$800,000</option>
                                                                    <option value="">$900,000</option>
                                                                    <option value="">$1,000,000</option>
                                                                    <option value="">$2,000,000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg d-flex">
                                                    <div class="form-group d-flex w-100 border-0">
                                                        <div class="form-field w-100 align-items-center d-flex">
                                                            <input type="submit" value="Search"
                                                                class="align-self-stretch form-control btn btn-primary p-0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    {{-- <section class="ftco-section services-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
                <div class="w-100">
                    <span class="subheading">Welcome to Pacific</span>
                    <h2 class="mb-4">Đã đến lúc bắt đầu cuộc phiêu lưu của bạn</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                        is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
                        a large language ocean.
                        A small river named Duden flows by their place and supplies it with the necessary regelialia.
                    </p>
                    <p><a href="#" class="btn btn-primary py-3 px-4">Search Destination</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services services-1 color-1 d-block img"
                            style="background-image: url({{ asset('client') }}/images/services-1.jpg);">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-paragliding"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Activities</h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services services-1 color-2 d-block img"
                            style="background-image: url({{ asset('client') }}/images/services-2.jpg);">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-route"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Travel Arrangements</h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services services-1 color-3 d-block img"
                            style="background-image: url({{ asset('client') }}/images/services-3.jpg);">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-tour-guide"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Private Guide</h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services services-1 color-4 d-block img"
                            style="background-image: url({{ asset('client') }}/images/services-4.jpg);">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-map"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Location Manager</h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

    <section class="ftco-section img ftco-select-destination"
        style="background-image: url({{ asset('client') }}/images/bg_3.jpg);">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Pacific Provide Places</span>
                    <h2 class="mb-4">Chọn điểm đến của bạn</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-destination owl-carousel ftco-animate">
                        @foreach (getAllDestination() as $destination)
                            <div class="item">
                                <x-card-destination id="{{ $destination->id }}" name="{{ $destination->name }}"
                                    slug="{{ $destination->slug }}" cover="{{ $destination->cover }}"
                                    totalTours="{{ $destination->tour->count() }}" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Destination</span>
                    <h2 class="mb-4">Điểm đến du lịch</h2>
                </div>
            </div>
            <div class="row">
                @foreach (getAllTour() as $item)
                    <div class="col-md-4 ftco-animate">
                        <x-card-tour slug="{{ $item->slug }}"
                            sale="{{$item->sale}}"
                            nightOfDay="{{ nightOfDay($item->date_of_department, $item->return_date) }}"
                            title="{{ $item->title }}" price="{{ number_format($item->price_large) }}"
                            cover="{{ $item->cover }}" startingPoint="{{ $item->starting_point }}"
                            dateOfDepartment="{{ $item->date_of_department->format('d/m/Y h:m A') }}"
                            amountOfPeople="{{ $item->amount_of_people }}" avaiable="{{ $item->avaiable }}" />
                    </div>
                @endforeach


            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about img" style="background-image: url({{ asset('client') }}/images/bg_4.jpg);">
        <div class="overlay"></div>
        <div class="container py-md-5">
            <div class="row py-md-5">
                <div class="col-md d-flex align-items-center justify-content-center">
                    <a href="https://vimeo.com/45830194"
                        class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                        <span class="fa fa-play"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about ftco-no-pt img">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 about-intro">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="img d-flex w-100 align-items-center justify-content-center"
                                style="background-image:url({{ asset('client') }}/images/about-1.jpg);">
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-5 py-5">
                            <div class="row justify-content-start pb-3">
                                <div class="col-md-12 heading-section ftco-animate">
                                    <span class="subheading">About Us</span>
                                    <h2 class="mb-4">Make Your Tour Memorable and Safe With Us</h2>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                                        at the coast of the Semantics, a large language ocean.</p>
                                    <p><a href="#" class="btn btn-primary">Book Your Destination</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section bg-bottom"
        style="background-image: url({{ asset('client') }}/images/bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <span class="subheading">Testimonial</span>
                    <h2 class="mb-4">Tourist Feedback</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url({{ asset('client') }}/images/person_1.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url({{ asset('client') }}/images/person_2.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url({{ asset('client') }}/images/person_3.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url({{ asset('client') }}/images/person_1.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img"
                                            style="background-image: url({{ asset('client') }}/images/person_2.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Our Blog</span>
                    <h2 class="mb-4">Bài đăng gần đây</h2>
                </div>
            </div>
            <div class="row d-flex">

                @foreach (getAllBlogs() as $item)
                    <div class="col-md-4 d-flex ftco-animate">
                        <x-card-post title="{{ $item->title }} " description="{{ $item->description }} "
                            slug="{{ $item->slug }}" day="{{ $item->created_at->format('d') }}"
                            years="{{ $item->created_at->format('Y') }}" month="{{ $item->created_at->format('M') }}"
                            cover="{{ $item->cover }}" />
                    </div>
                @endforeach


            </div>
        </div>
    </section>


@endsection
