@extends('layouts.client.index')
@section('title', 'Đặt tour')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ $tour->cover }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Trang chủ <i
                                    class="fa fa-chevron-right"></i></a></span> <span> Đặt Tour <i
                                class="fa fa-chevron-right"></i> {{ $tour->title }}</span></p>
                    <h1 class="mb-0 bread">Đặt Tour</h1>
                </div>
            </div>
        </div>
    </section>

    <x-about-contact />
    <section class="ftco-section contact-section ftco-no-pt">
        <div class="container">
            @if (session('msgSuccess'))
                <div class=" mt-3 alert alert-success alert-dismissible" role="alert">
                    {{ session('msgSuccess') }}

                </div>
            @endif
            @if (session('msgError'))
                <div class="mt-3  alert alert-danger alert-dismissible" role="alert">
                    {{ session('msgError') }}

                </div>
            @endif
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">

                    <form action="{{ route('client.handle-book-tour', $tour->slug) }}" method="POST"
                        class="bg-light p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <label for="full_name">Họ và tên: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                value="{{ old('full_name') ?? Auth::user()->full_name }}" placeholder="Họ và tên">
                            @error('full_name')
                                <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                value="{{ old('email') ?? Auth::user()->email }}">
                            @error('email')
                                <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Số điện thoại: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                value="{{ old('phone_number') ?? Auth::user()->phone_number }}" placeholder="Số điện thoại">
                            @error('phone_number')
                                <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ"
                                value="{{ old('address') ?? Auth::user()->address }}">
                            @error('address')
                                <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="adult">Số lượng người lớn: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" oninput="calculatorTotal()" id="adult"
                                name="adult" value="{{ old('adult') }}" placeholder="Số lượng người lớn">
                            @error('adult')
                                <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="children">Số lượng trẻ con: </label>
                            <input type="text" class="form-control" id="children" name="children"
                                value="{{ old('children') }}" oninput="calculatorTotal()" placeholder="Số lượng trẻ em">

                        </div>
                        <div class="form-group">
                            <label for="notes">Ghi chú:</label>
                            <textarea type="text" class="form-control" id="notes" name="notes" value="{{ old('notes') }}"
                                placeholder="Ghi chú của bạn"></textarea>

                        </div>
                        <hr>
                        <input type="hidden" id="price_large" name="price_large" value="{{ $tour->price_large }}">
                        <input type="hidden" id="price_small" name="price_small" value="{{ $tour->price_small }}">
                        <p class="text-right mb-4">
                            <strong class="mr-3">Tổng tiền: </strong> <span class="text-success" id="total-text">0
                            </span>
                        </p>
                        <div class="form-group">
                            <input type="submit" value="Đặt ngay" class="btn btn-primary py-3 px-5 w-100">
                        </div>
                    </form>

                </div>

                <div class="col-md-6 ">
                    <h4 class="text-primary mb-4 font-weight-bold pt-3"> {{ $tour->title }}</h4>
                    <p class="mb-3"><i class="fa-solid fa-map-location-dot text-primary"></i> <strong> Lộ
                            trình:</strong> {{ $tour->road_map }}</p>
                    <p class="mb-3"><i class="fa-solid fa-map-location-dot text-primary"></i><strong> Từ:</strong>
                        {{ $tour->starting_point }}</p>
                    <p class="mb-3"><i class="fa-regular fa-calendar-days text-primary"></i> <strong>Ngày khởi
                            hành:</strong> {{ $tour->date_of_department->format('d/m/Y h:m A') }}</p>
                    <p class="mb-3"><i class="fa-regular fa-calendar-days text-primary"></i> <strong>Ngày trở
                            về:</strong> {{ $tour->return_date->format('d/m/Y h:m A') }}</p>
                    <p class="mb-3"><i class="fa-solid fa-users text-primary"></i> <strong>Số người tham gia:</strong>
                        {{ $tour->amount_of_people }}</p>
                    <p class="mb-3"><i class="fa-solid fa-users text-primary"></i> <strong>Còn trống:</strong>
                        {{ $tour->avaiable }}</p>
                    <p class="mb-3"><i class="fa-solid fa-car text-primary"></i><strong> Vận chuyển:</strong>
                        {{ $tour->vehicle->name }}
                    </p>
                    <p class="mb-3"><i class="fa-solid fa-money-bill-1-wave text-primary"></i> <strong>Giá người
                            lớn:</strong> {{ number_format($tour->price_large) }}VND </p>
                    <p class="mb-3"><i class="fa-solid fa-money-bill-1-wave text-primary"></i> <strong>Giá trẻ
                            con:</strong> {{ number_format($tour->price_small) }}VND</p>

                </div>

            </div>
        </div>
    </section>
    <script>
        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function calculatorTotal() {
            let price_large = document.getElementById("price_large").value;
            let price_small = document.getElementById("price_small").value;
            let adult = document.getElementById("adult").value;
            let children = document.getElementById("children").value;
            let totalText = document.getElementById("total-text");
            let total = (adult * price_large) + (children * price_small);
            totalText.innerHTML = formatNumber(total) + " vnd";
        }
        calculatorTotal()
    </script>
@endsection
