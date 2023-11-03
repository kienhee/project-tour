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

                    @if (session('msgSuccess'))
                        <div class="alert alert-info" role="alert">
                            {{ session('msgSuccess') }}
                        </div>
                    @endif
                    @if (session('msgError'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('msgError') }}
                        </div>
                    @endif

                    {!! $tour->content !!}
                    <hr>
                    <div class="">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 style="font-size: 20px; font-weight: bold;">{{ $rated->count() }} lượt đánh giá
                            </h3>
                            <div>
                                @if ($rated->count() > 0)
                                <strong>{{ $rated->sum('rating') / $rated->count() }}/5</strong>

                                {{rating($rated->sum('rating'),$rated->count()  )}}

                                @endif


                            </div>
                        </div>

                        <hr>
                        <ul class="comment-list">
                            @foreach ($rated as $item)
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="{{ $item->user->avatar ?? '/images/avatar-default.png' }}"
                                            alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>{{ $item->user->full_name }}</h3>
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $item->rating)
                                                <span class="fa fa-star checked"></span>
                                            @else
                                                <span class="fa fa-star"></span>
                                            @endif
                                        @endfor


                                        <div class="meta"> {{ $item->created_at->format('d/m/Y h:m A') }}</div>
                                        <p>{{ $item->message }}</p>
                                    </div>
                                </li>
                            @endforeach


                        </ul>

                        @if ($checkRate && !$checkUserRate)
                            <div class="comment-form-wrap pt-5">

                                <form action="{{ route('client.rating-tour', $tour->slug) }}" method="POST"
                                    class="p-5 bg-light">
                                    @csrf
                                    <div id="full-stars-example-two" class="d-flex justify-content-center">
                                        <div class="rating-group">
                                            <label aria-label="1 star" class="rating__label" for="rating-1"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating" id="rating-1" value="1"
                                                type="radio" checked>
                                            <label aria-label="2 stars" class="rating__label" for="rating-2"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating" id="rating-2" value="2"
                                                type="radio">
                                            <label aria-label="3 stars" class="rating__label" for="rating-3"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating" id="rating-3" value="3"
                                                type="radio">
                                            <label aria-label="4 stars" class="rating__label" for="rating-4"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating" id="rating-4" value="4"
                                                type="radio">
                                            <label aria-label="5 stars" class="rating__label" for="rating-5"><i
                                                    class="rating__icon rating__icon--star fa fa-star"></i></label>
                                            <input class="rating__input" name="rating" id="rating-5" value="5"
                                                type="radio">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="full_name">Họ và tên<span class="text-danger">*</span>: </label>
                                        <input type="text" class="form-control disabled" id="full_name" disabled
                                            value="{{ Auth::user()->full_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email<span class="text-danger">*</span>:</label>
                                        <input type="email" class="form-control disabled" id="email" disabled
                                            value="{{ Auth::user()->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Đánh giá<span class="text-danger">*</span>:</label>
                                        <textarea id="message" name="message" cols="30" rows="10" class="form-control" autofocus></textarea>
                                        @error('message')
                                            <p class="text-danger my-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Đánh giá" class="btn py-3 px-4 btn-primary">
                                    </div>

                                </form>
                            </div>
                        @endif

                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate bg-light py-md-5">
                    <div class="sidebar-box pt-md-5">
                        <h3 class="text-center">Giá từ:
                            @if ($tour->sale)
                                <span class="badge  text-danger border border-danger">Giảm giá
                                    {{ $tour->sale }}%</span>
                            @endif

                            <p class="text-primary">{{ number_format($tour->price_small) }} -
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
                                    <x-card-tour slug="{{ $item->slug }}" sale="{{ $item->sale }}"
                                        nightOfDay="{{ nightOfDay($item->date_of_department, $item->return_date) }}"
                                        title="{{ $item->title }}" price="{{ $item->price_large }}"
                                        cover="{{ $item->cover }}" startingPoint="{{ $item->starting_point }}"
                                        dateOfDepartment="{{ $item->date_of_department->format('d/m/Y h:m A') }}"
                                        amountOfPeople="{{ $item->amount_of_people }}"
                                        avaiable="{{ $item->avaiable }}" />
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> <!-- .section -->

@endsection
